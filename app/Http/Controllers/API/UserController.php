<?php

namespace App\Http\Controllers\API;

use Exception;
use App\Models\User;
use Illuminate\Http\Request;
use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class UserController extends Controller
{
    public function login(Request $request)
    {
        try {
            $request->validate([
                'nrp' => 'required',
                'password' => 'required',
            ]);

            $user = User::where('nrp', $request->nrp)->first();

            if (!Hash::check($request->password, $user->password, [])) {
                throw new \Exception('Invalid credentials');
            }

            if (!$token = auth()->attempt($request->all())) {
                return ResponseFormatter::error([
                    'message' => 'Unauthorized',
                ], 'Authentication failed', 401);
            }

            return ResponseFormatter::success([
                'access_token' => $token,
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

    public function fetch()
    {
        return ResponseFormatter::success(auth()->user(), 'Voter fetched successfully');
    }

    public function updateProfile(Request $request)
    {
        $data = $request->all();

        $user = Auth::user();

        if ($request->file('photo')) {
            if ($user->photo) {
                Cloudinary::destroy($user->public_id);
            }

            $data['photo'] = Cloudinary::upload($request->file('photo')->getRealPath(), [
                'folder' => 'prm-hmtif-unpas/voters',
                'crop' => 'scale',
                'width' => '512',
                'gravity' => 'center',
            ])->getSecurePath();
            $publicId = Cloudinary::getPublicId();
            $data['public_id'] = $publicId;
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
            ], 'Old password is incorrect', 401);
        }

        $user->update([
            'password' => Hash::make($request->password),
        ]);

        return ResponseFormatter::success($user, 'Password changed successfully');
    }

    public function logout()
    {
        auth()->logout();

        return ResponseFormatter::success([
            'message' => 'Logged out successfully',
        ], 'Logged out successfully');
    }
}
