<?php

namespace App\Http\Controllers;

use App\Equipement;
use App\Req_inter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class Req_interController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $req_inters=Req_inter::all();
        return view('req_inter.index',compact('req_inters'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $equips=Equipement::all()->pluck('designation','id');
        return  view('req_inter.create',compact('equips'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'number' => [ 'required','string', 'max:255','unique:req_inters'],
//            'created_at' => [ 'required','date'],
            'degree_urgency' => ['required'],
            'equipement_id' => ['required'],
        ]);
    }

    public function store(Request $request)
    {
        $this->validator($request->all())->validate();
        Req_inter::create([
            'number' => $request['number'],
            'equipement_id' => $request['equipement_id'],
            'degree_urgency' => $request['degree_urgency']+1,
            'description' => $request['description'],
            'created_at' => $request['created_at']
        ]);
        $equips=Equipement::all()->pluck('designation','id');
        return  view('req_inter.create',compact('equips'));
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
        $req_inter=Req_inter::findOrFail($id);
        $equips=Equipement::all()->pluck('designation','id');
        return view('req_inter.edit',compact('req_inter','equips'));
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
        //
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
}
