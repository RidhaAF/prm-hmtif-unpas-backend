<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;

class CandidateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.candidate.index', [
            'title' => 'Kandidat',
            'candidates' => Candidate::get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.candidate.create', [
            'title' => 'Tambah Kandidat',
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
            'nrp' => 'required|string|min:9|max:9|unique:candidates',
            'name' => 'required|string|max:255',
            'vision' => 'required|string',
            'mission' => 'required|string',
            'photo' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        if ($request->file('photo')) {
            $validatedData['photo'] = $request->file('photo')->store('candidate');
        }

        Candidate::create($validatedData);

        return redirect()->route('candidate.index')
            ->with('success', 'Kandidat berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Candidate  $candidate
     * @return \Illuminate\Http\Response
     */
    public function show(Candidate $candidate)
    {
        return view('admin.candidate.show', [
            'title' => 'Detail Kandidat',
        ], compact('candidate'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Candidate  $candidate
     * @return \Illuminate\Http\Response
     */
    public function edit(Candidate $candidate)
    {
        return view('admin.candidate.edit', [
            'title' => 'Ubah Kandidat',
        ], compact('candidate'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Candidate  $candidate
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Candidate $candidate)
    {
        $validatedData = $request->validate([
            'nrp' => ['required', 'string', 'min:9', 'max:9', Rule::unique('candidates')->ignore($candidate->id)],
            'name' => 'required|string|max:255',
            'vision' => 'required|string',
            'mission' => 'required|string',
            'photo' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        if ($request->file('photo')) {
            if ($candidate->photo) {
                unlink(storage_path('app/public/' . $candidate->photo));
            }

            $validatedData['photo'] = $request->file('photo')->store('candidate');
        }

        $candidate->update($validatedData);

        return redirect()->route('candidate.index')
            ->with('success', 'Kandidat berhasil diubah.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Candidate  $candidate
     * @return \Illuminate\Http\Response
     */
    public function destroy(Candidate $candidate)
    {
        if ($candidate->photo) {
            unlink(storage_path('app/public/' . $candidate->photo));
        }

        $candidate->delete();

        return redirect()->route('candidate.index')
            ->with('success', 'Kandidat berhasil dihapus.');
    }
}
