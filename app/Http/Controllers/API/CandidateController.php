<?php

namespace App\Http\Controllers\API;

use App\Models\Candidate;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use App\Http\Resources\CandidateResource;

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
        return response()->json([
            CandidateResource::collection($data), 'Candidates fetched.'
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

        $candidate = Candidate::create($validatedData);

        return response()->json([
            'Candidate created successfully.', new CandidateResource($candidate)
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Candidate  $candidate
     * @return \Illuminate\Http\Response
     */
    public function show(Candidate $candidate)
    {
        $candidate = Candidate::find($candidate);
        if (is_null($candidate)) {
            return response()->json('Data not found', 404);
        }
        return response()->json([
            CandidateResource::collection($candidate)
        ]);
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

        return response()->json([
            'Candidate updated successfully.', new CandidateResource($candidate)
        ]);
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

        return response()->json('Candidate deleted successfully');
    }
}
