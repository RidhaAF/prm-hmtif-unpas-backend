<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use App\Models\VoteResult;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

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
            'public_id' => 'nullable|string',
        ]);

        if ($request->file('photo')) {
            $validatedData['photo'] = Cloudinary::upload($request->file('photo')->getRealPath(), [
                'folder' => 'prm-hmtif-unpas/candidates',
                'crop' => 'scale',
                'width' => '512',
                'gravity' => 'center',
            ])->getSecurePath();
            $publicId = Cloudinary::getPublicId();
            $validatedData['public_id'] = $publicId;
        }

        Candidate::create($validatedData);

        // insert vote_results table when candidate is created
        $voteResult = new VoteResult();
        $voteResult->candidate_nrp = $validatedData['nrp'];
        $voteResult->candidate_name = $validatedData['name'];
        $voteResult->save();

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
            'public_id' => 'nullable|string',
        ]);

        if ($request->file('photo')) {
            if ($candidate->photo) {
                Cloudinary::destroy($candidate->public_id);
            }

            $validatedData['photo'] = Cloudinary::upload($request->file('photo')->getRealPath(), [
                'folder' => 'prm-hmtif-unpas/candidates',
                'crop' => 'scale',
                'width' => '512',
                'gravity' => 'center',
            ])->getSecurePath();
            $publicId = Cloudinary::getPublicId();
            $validatedData['public_id'] = $publicId;
        }

        // update vote_results table when candidate is updated
        $voteResult = VoteResult::where('candidate_nrp', $candidate->nrp)->first();
        $voteResult->candidate_nrp = $validatedData['nrp'];
        $voteResult->candidate_name = $validatedData['name'];
        $voteResult->save();

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
            Cloudinary::destroy($candidate->public_id);
        }

        $candidate->delete();

        return redirect()->route('candidate.index')
            ->with('success', 'Kandidat berhasil dihapus.');
    }

    public function deletePhoto(Candidate $candidate)
    {
        if ($candidate->photo) {
            Cloudinary::destroy($candidate->public_id);

            $candidate->update([
                'photo' => null,
                'public_id' => null,
            ]);
        }

        return redirect()->route('candidate.index')
            ->with('success', 'Foto profil kandidat berhasil dihapus.');
    }
}
