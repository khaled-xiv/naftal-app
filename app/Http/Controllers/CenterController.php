<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Center;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class CenterController extends Controller
{

    protected function validator(array $data, $id)
    {
        return Validator::make($data, [
            'code' => ['required', 'string', 'max:255', Rule::unique('centers')->ignore($id)],
            'location' => ['required', 'string', 'max:255'],
            'storage_capacity' => ['required'],
            'phone' => ['required', Rule::unique('centers')->ignore($id)],
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $centers = Center::all();
        return view('centers.index', compact('centers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('centers.create');
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
        Center::create($request->all());
        return redirect('/centers');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $center = Center::findOrFail($id);
        return view('centers.edit', compact('center'));
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
                ->withErrors($validator)
                ->withInput();
        }
        Center::findOrFail($id)->update($request->all());
        return redirect('/centers');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Center::findOrFail($id)->delete();
        return redirect('/centers');
    }
}
