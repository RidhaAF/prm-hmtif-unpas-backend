<?php

namespace App\Http\Controllers\API;

use Exception;
use App\Models\User;
use Illuminate\Http\Request;
use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
            ], 'Voter created successfully');
        } catch (Exception $error) {
            return ResponseFormatter::error([
                'message' => 'Something went wrong',
                'error' => $error,
            ], 'Authentication failed', 500);
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
                ], 'Authentication failed', 500);
            }

            $user = User::where('nrp', $request->nrp)->first();

            if (!Hash::check($request->password, $user->password, [])) {
                throw new \Exception('Invalid credentials');
            }

            $tokenResult = $user->createToken('authToken')->plainTextToken;

            return ResponseFormatter::success([
                'access_token' => $tokenResult,
                'token_type' => 'Bearer',
                'user' => $user,
            ], 'Voter authenticated successfully');
        } catch (Exception $error) {
            return ResponseFormatter::error([
                'message' => 'Something went wrong',
                'error' => $error,
            ], 'Authentication failed', 500);
        }
    }

    public function fetch(Request $request)
    {
        return ResponseFormatter::success($request->user(), 'Voter fetched successfully');
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

        return ResponseFormatter::success($user, 'Voter updated successfully');
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'old_password' => 'required',
            'password' => 'required|string|min:8',
        ]);

        $user = Auth::user();

        if (!Hash::check($request->old_password, $user->password, [])) {
            return ResponseFormatter::error([
                'message' => 'Old password is incorrect',
            ], 'Old password is incorrect', 500);
        }

        $user->update([
            'password' => Hash::make($request->password),
        ]);

        return ResponseFormatter::success($user, 'Password changed successfully');
    }

    public function logout(Request $request)
    {
        $token = $request->user()->currentAccessToken()->delete();

        return ResponseFormatter::success($token, 'Token revoked successfully');
    }
}
