<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index()
    {
        return view('/admin/dashboard', [
            'title' => 'Dashboard Admin',
            'name' => Auth::user()->name,
        ]);
    }

    public function login()
    {
        return view('admin.auth.login', [
            'title' => 'Admin Login',
        ]);
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/admin/dashboard');
        }

        return back()->with('failed', 'Login failed!');
    }

    public function register()
    {
        return view('admin.auth.register', [
            'title' => 'Admin Register',
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:admins',
            'email' => 'required|string|email:dns|max:255|unique:admins',
            'password' => 'required|string|min:8|max:255',
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);

        Admin::create($validatedData);

        return redirect('/admin/login')->with('success', 'Admin registration created successfully! Please login');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
