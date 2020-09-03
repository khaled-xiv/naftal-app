<?php

namespace App\Http\Controllers;

use App\Answer;
use App\Forum;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Events\SendNotifications;
use App\Notification;

class AnswerController extends Controller
{


    protected function validator(array $data, $id)
    {
        return Validator::make($data, [
            'body' => ['required'],
        ]);
    }

    public function __construct()
    {
        $this->middleware(['auth','verified','role:admin,district chief,center chief,technician']);
    }

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
                ->withErrors($validator)
                ->withInput();
        }

        $answer = new Answer();
        $answer->body = $request->body;
        $answer->forum_id = $request->forum;
        $user = Auth::user();
        $user->forums()->save($answer);
		$forum = Forum::findOrFail($request->forum);
		if($forum->user_id !== $user->id){
			$notification=Notification::create([
				'user_id' => $forum->user_id,
				'sender' => $user->name,
				'user_photo' => $user->photo,
				'link' => "forum/".$forum->id,
				'is_read' => 0,
				'content' => "You have a new answer to your question \"".$forum->title."\"",
			]);
            if(!$user->photo) $notification->user_photo='profile-placeholder.jpg';
			event(new SendNotifications($notification));
		}
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
	
	public function chooseBestAnswer($id){
		
		$answer = Answer::findOrFail($id);
		$forum = $answer->forum;
		$currentBest = Answer::where([['forum_id', '=', $forum->id], ['best', '=', 1]])->first();
		if($currentBest){
			$currentBest->update(['best' => '0']);
		}
		$answer->update(['best' => '1']);
		return response()->noContent();
		
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
