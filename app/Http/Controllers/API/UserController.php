<?php

namespace App\Http\Controllers\API;

use Exception;
use App\Models\User;
use Illuminate\Http\Request;
use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;

class UserController extends Controller
{
    public function register(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'nrp' => 'required|string|min:9|max:9|unique:users',
                'name' => 'required|string|max:255',
                'username' => 'required|string|max:255|unique:users',
                'email' => 'required|string|email|unique:users',
                'major' => 'string|max:255',
                'class_year' => 'required|integer|min:2017|max:2022',
                'vote_status' => 'boolean',
                'photo' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            ]);

            $validatedData['major'] = 'Teknik Informatika';
            $validatedData['vote_status'] = false;

            if ($request->file('photo')) {
                $validatedData['photo'] = $request->file('photo')->store('user');
            }

            User::create($validatedData);

            $user = User::where('nrp', $request->nrp)->first();

            $tokenResult = $user->createToken('authToken')->plainTextToken;

            return ResponseFormatter::success([
                'access_token' => $tokenResult,
                'token_type' => 'Bearer',
                'user' => $user,
            ], 'Pemilih berhasil ditambahkan.');
        } catch (Exception $error) {
            return ResponseFormatter::error([
                'message' => 'Something went wrong',
                'error' => $error,
            ], 'Authentication Failed', 500);
        }
    }

    public function login(Request $request)
    {
        try {
            $request->validate([
                'nrp' => 'required',
                'password' => 'required',
            ]);

            $credentials = request(['nrp', 'password']);
            if (!Auth::attempt($credentials)) {
                return ResponseFormatter::error([
                    'message' => 'Unauthorized',
                ], 'Authentication Failed', 500);
            }

            $user = User::where('nrp', $request->nrp)->first();

            if (!Hash::check($request->password, $user->password, [])) {
                throw new \Exception('Invalid Credentials');
            }

            $tokenResult = $user->createToken('authToken')->plainTextToken;

            return ResponseFormatter::success([
                'access_token' => $tokenResult,
                'token_type' => 'Bearer',
                'user' => $user,
            ], 'Authenticated');
        } catch (Exception $error) {
            return ResponseFormatter::error([
                'message' => 'Something went wrong',
                'error' => $error,
            ], 'Authentication Failed', 500);
        }
    }

    public function fetch(Request $request)
    {
        return ResponseFormatter::success($request->user(), 'Pemilih berhasil diambil');
    }

    public function updateProfile(Request $request)
    {
        $data = $request->all();

        $user = Auth::user();

        if ($request->file('photo')) {
            if ($user->photo) {
                unlink(storage_path('app/public/' . $user->photo));
            }

            $data['photo'] = $request->file('photo')->store('user');
        }

        $user->update($data);

        return ResponseFormatter::success($user, 'Profil diperbarui');
    }

    public function logout(Request $request)
    {
        $token = $request->user()->currentAccessToken()->delete();

        return ResponseFormatter::success($token, 'Token Revoked');
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'old_password' => 'required',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = Auth::user();

        if (!Hash::check($request->old_password, $user->password, [])) {
            return ResponseFormatter::error([
                'message' => 'Password lama salah',
            ], 'Wrong old password', 500);
        }

        $user->update([
            'password' => Hash::make($request->password),
        ]);

        return ResponseFormatter::success($user, 'Password berhasil diubah');
    }
}
