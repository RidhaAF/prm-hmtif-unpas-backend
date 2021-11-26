<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use App\Models\Vote;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\VoteResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class VoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Vote::get();
        return response()->json([
            VoteResource::collection($data), 'Votes fetched.'
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
        $validator = Validator::make($request->all(), [
            'user_id' => 'unique:votes',
            'candidate_id' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors());
        }

        $vote = Vote::create([
            'user_id' => Auth::user()->id,
            'candidate_id' => $request->candidate_id
        ]);

        $user = User::where('id', Auth::user()->id)->update([
            'vote_status' => true,
        ]);

        return response()->json([
            'Vote created successfully.', new VoteResource($vote, $user)
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vote  $vote
     * @return \Illuminate\Http\Response
     */
    public function show(Vote $vote)
    {
        $vote = Vote::find($vote);
        if (is_null($vote)) {
            return response()->json('Data not found', 404);
        }
        return response()->json(
            [VoteResource::collection($vote)]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Vote  $vote
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vote $vote)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required',
            'candidate_id' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors());
        }

        $vote->user_id = $request->user_id;
        $vote->candidate_id = $request->candidate_id;
        $vote->save();

        return response()->json([
            'Vote updated successfully.', new VoteResource($vote)
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vote  $vote
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vote $vote)
    {
        $vote->delete();

        return response()->json('Vote deleted successfully');
    }
}
