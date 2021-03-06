<?php

namespace App\Http\Controllers;

use App\Forum;
use App\Likable;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\DB;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

// ini_set('max_execution_time', 100);

class ForumController extends Controller
{

    protected function validator(array $data, $id)
    {
        return Validator::make($data, [
            'title' => ['required', 'string', 'max:255'],
            'body' => ['required'],
        ]);
    }

    public function __construct()
    {
        $this->middleware(['auth','verified','role:admin,district chief,center chief,technician']);
    }
    public function index()
    {
        $forums = Forum::orderBy('votes', 'desc')->orderBy('created_at', 'desc')->paginate(5);
        return view('forums.index', compact('forums'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('forums.create');
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

        $tags = $request->tags;
        $tags = explode(",", $tags);

        $forum = new Forum();
        $forum->title = $request->title;
        $forum->body = $request->body;
        $user = Auth::user();
        $user->forums()->save($forum);
        foreach ($tags as $tag){
            if($tag !== "") {
				$tag = trim($tag);
				$tagObj = Tag::where('content', $tag)->first();
				if($tagObj === null){
					$forum->tags()->create(['content' => $tag]);
				}else {
					DB::table('forum_tag')->insert(
						array(
							'forum_id' => $forum->id,
							'tag_id' => $tagObj->id
						)
					);
				}
            }
        }
        $url = 'http://localhost:8000/sim/forums/'.$forum->id.'/embeddings/';
        $client = new Client();
		try {
			$client->request('POST', $url, [
				'timeout' => 7
			]);
		} catch (\Exception $e) {
			
        }
        return redirect(LaravelLocalization::getUrlFromRouteNameTranslated(LaravelLocalization::getCurrentLocale(), 'routes.forums'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $forum = Forum::findOrFail($id);
        return view('forums.show', compact('forum'));
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
        Forum::findOrFail($id)->update($request->all());
		$url = 'http://localhost:8000/sim/forums/'.$id.'/embeddings/';
        $client = new Client();
		try {
			$client->request('POST', $url, [
				'timeout' => 7
			]);
		} catch (\Exception $e) {
			
        }
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

    public function search(Request $request){
        $query = $request->search_query;
        $forums = Forum::query()
            ->where('title', 'like', '%'.$query.'%')
            ->orWhere('body', 'like', '%'.$query.'%')
            ->orderBy('votes', 'desc')
			->orderBy('created_at', 'desc')
			->paginate(8);
        return view('forums.search',compact('forums'));
    }

    public function upvote($id){

        $forum = Forum::findOrFail($id);
        $votes = $forum->votes;
        $user = Auth::user();
        $likable = $user->liked_forums()->where('likable_id', $id)->first();
        if ($likable === null){
            $votes++;
            $forum->votes = $votes;
            $forum->save();
            $user->liked_forums()->attach($id, ['up' => 1]);
        }else if($likable->pivot->up === 0){
                $votes += 2;
                $forum->votes = $votes;
                $forum->save();
                $user->liked_forums()->sync([$id => ['up' => 1]]);
        }else{
            $votes--;
            $forum->votes = $votes;
            $forum->save();
            $user->liked_forums()->detach($id);
        }
        return response()->json(array('msg'=> $votes), 200);

    }

    public function downvote($id){

        $forum = Forum::findOrFail($id);
        $votes = $forum->votes;
        $user = Auth::user();
        $likable = $user->liked_forums()->where('likable_id', $id)->first();
        if ($likable === null){
            $votes--;
            $forum->votes = $votes;
            $forum->save();
            $user->liked_forums()->attach($id, ['up' => 0]);
        }else if($likable->pivot->up === 1){
            $votes -= 2;
            $forum->votes = $votes;
            $forum->save();
            $user->liked_forums()->sync([$id => ['up' => 0]]);
        }else{
            $votes++;
            $forum->votes = $votes;
            $forum->save();
            $user->liked_forums()->detach($id);
        }
        return response()->json(array('msg'=> $votes), 200);
    }

}
