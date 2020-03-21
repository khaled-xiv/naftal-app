<?php

namespace App\Http\Controllers;

use App\Answer;
use App\Forum;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AnswerController extends Controller
{


    protected function validator(array $data, $id)
    {
        return Validator::make($data, [
            'body' => ['required'],
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = $this->validator($request->all(), -1);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator, 'components')
                ->withInput();
        }

        $answer = new Answer();
        $answer->body = $request->body;
        $answer->forum_id = $request->forum;
        $user = Auth::user();
        $user->forums()->save($answer);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = $this->validator($request->all(), $id);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator, 'update')
                ->withInput();
        }
        Answer::findOrFail($id)->update($request->all());
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function upvote($id){

        $answer = Answer::findOrFail($id);
        $votes = $answer->votes;
        $user = Auth::user();
        $likable = $user->liked_answers()->where('likable_id', $id)->first();
        if ($likable === null){
            $votes++;
            $answer->votes = $votes;
            $answer->save();
            $user->liked_answers()->attach($id, ['up' => 1]);
        }else if($likable->pivot->up === 0){
            $votes += 2;
            $answer->votes = $votes;
            $answer->save();
            $user->liked_answers()->sync([$id => ['up' => 1]]);
        }else{
            $votes--;
            $answer->votes = $votes;
            $answer->save();
            $user->liked_answers()->detach($id);
        }
        return response()->json(array('msg'=> $votes), 200);

    }

    public function downvote($id){

        $answer = Answer::findOrFail($id);
        $votes = $answer->votes;
        $user = Auth::user();
        $likable = $user->liked_answers()->where('likable_id', $id)->first();
        if ($likable === null){
            $votes--;
            $answer->votes = $votes;
            $answer->save();
            $user->liked_answers()->attach($id, ['up' => 0]);
        }else if($likable->pivot->up === 1){
            $votes -= 2;
            $answer->votes = $votes;
            $answer->save();
            $user->liked_answers()->sync([$id => ['up' => 0]]);
        }else{
            $votes++;
            $answer->votes = $votes;
            $answer->save();
            $user->liked_answers()->detach($id);
        }
        return response()->json(array('msg'=> $votes), 200);
    }

}
