<?php

namespace App\Http\Controllers\API;

use Exception;
use App\Models\Candidate;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Helpers\ResponseFormatter;
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
        $data = Candidate::get();

        return ResponseFormatter::success($data, 'Candidates fetched!');
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

        $candidate = Candidate::create($validatedData);

        return ResponseFormatter::success($candidate, 'Candidate created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Candidate  $candidate
     * @return \Illuminate\Http\Response
     */
    public function show(Candidate $candidate)
    {
        try {
            return ResponseFormatter::success($candidate, 'Detail candidate showed!', compact('candidate'));
        } catch (Exception $error) {
            return ResponseFormatter::error([
                'message' => 'Data not found!',
                'error' => $error,
            ], 'Detail candidate not found!', 404);
        }
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

        return ResponseFormatter::success($candidate, 'Candidate updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Candidate  $candidate
     * @return \Illuminate\Http\Response
     */
    public function destroy(Candidate $candidate)
    {
        $candidate->delete();

        return ResponseFormatter::success($candidate, 'Candidate deleted successfully!');
    }
}
