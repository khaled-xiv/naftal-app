<?php

namespace App\Http\Controllers;

use App\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function search($id){
        $tag = Tag::findOrFail($id);
        $forums = $tag->forums()->orderBy('votes', 'desc')->paginate(8);
        return view('forums.search' ,compact('forums', 'tag'));
    }
}
