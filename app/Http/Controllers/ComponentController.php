<?php

namespace App\Http\Controllers;

use App\Component;
use App\Equipment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Illuminate\Support\Facades\DB;

class ComponentController extends Controller
{
    
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }
    
    protected function validator(array $data, $id)
    {
        return Validator::make($data, [
            'designation' => ['required', 'string', 'max:255'],
            'mark' => ['required', 'string', 'max:255'],
			'commissioned_on' => ['required'],
            'reference' => ['required', 'string', 'max:255', Rule::unique('components')->where(function ($query) {
                return $query->where('deleted_at', null);
            })->ignore($id)],
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

        $equipment = Equipment::findOrFail($request->equipment);

        $component = new Component();
        $component->designation = $request->designation;
        $component->mark = $request->mark;
        $component->reference = $request->reference;
        $component->commissioned_on = $request->commissioned_on;
		
		$names = DB::table('components')
            ->select('generic_name')
            ->groupBy('generic_name')
            ->get()->toArray();
		sort($names);
		$tempComp = Component::where(['designation' => $component->designation, 'mark' => $component->mark])->first();
		if($tempComp === null){
			$index = sizeof($names) + 1;
			$component->generic_name = 'comp'.$index;
		}else {
			$component->generic_name = $tempComp->generic_name;
		}
		$equipment->components()->save($component);

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
        $component = Component::findOrFail($id);
        return view('components.edit', compact('component'));
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

        $component = Component::findOrFail($id);
        $component->update($request->all());
        $equip = $component->equipment->id;
        return redirect(str_replace('{id}', $equip, LaravelLocalization::getUrlFromRouteNameTranslated(LaravelLocalization::getCurrentLocale(), 'routes.equipment-edit')));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Component::findOrFail($id)->delete();
        return redirect()->back();
    }
}
