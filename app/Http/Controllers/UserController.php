<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.voter.index', [
            'title' => 'Pemilih',
            'voters' => User::get(),
            'i' => 1,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.voter.create', [
            'title' => 'Tambah Pemilih',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
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

        return redirect()->route('voter.index')
            ->with('success', 'Pemilih berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $voter)
    {
        return view('admin.voter.show', [
            'title' => 'Detail Pemilih',
        ], compact('voter'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $voter)
    {
        return view('admin.voter.edit', [
            'title' => 'Ubah Pemilih',
        ], compact('voter'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $voter)
    {
        $validatedData = $request->validate([
            'nrp' => ['required', 'string', 'min:9', 'max:9', Rule::unique('users')->ignore($voter->id)],
            'name' => 'required|string|max:255',
            'username' => ['required', 'string', 'max:255', Rule::unique('users')->ignore($voter->id)],
            'email' => ['required', 'string', 'email', Rule::unique('users')->ignore($voter->id)],
            'class_year' => 'required|integer|min:2017|max:2022',
            'photo' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        if ($request->file('photo')) {
            if ($voter->photo) {
                unlink(storage_path('app/public/' . $voter->photo));
            }

            $validatedData['photo'] = $request->file('photo')->store('user');
        }

        $voter->update($validatedData);

        return redirect()->route('voter.index')
            ->with('success', 'Pemilih berhasil diubah.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $voter)
    {
        $voter->delete();

        return redirect()->route('voter.index')
            ->with('success', 'Pemilih berhasil dihapus.');
    }
}
