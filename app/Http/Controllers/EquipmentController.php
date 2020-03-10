<?php

namespace App\Http\Controllers;


use App\Center;
use App\Equipment;
use App\FuelMeter;
use App\Generator;
use App\LoadingArm;
use App\Pump;
use App\Tank;
use Illuminate\Http\Request;

class EquipmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pumps = Pump::all();
        $tanks = Tank::all();
        $loadingArms = LoadingArm::all();
        $generators = Generator::all();
        $fuelMeters = FuelMeter::all();

        return view('equipments.index', compact('pumps', 'tanks', 'loadingArms', 'generators', 'fuelMeters'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $centers=Center::all()->pluck('code','id');
        return view('equipments.create', compact('centers'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $center = Center::findOrFail($request->center_id);
        $equipment = new Equipment();
        $equipment->code = $request->code;
        $equipment->type = $request->type;
        $equipment->mark = $request->mark;
        $equipment->model = $request->model;
        $equipment->state = $request->state;

        $center->equipments()->save($equipment);
        $temp = Equipment::latest()->first();

        switch($_COOKIE['equip']){
            case 'Pumps':
                $secEq = new Pump();
                $secEq->rate = $request->rate;
                $secEq->product = $request->product;
                $temp->pump()->save($secEq);
                break;
            case 'Loading Arms':
                $secEq = new LoadingArm();
                $secEq->rate = $request->rate;
                $secEq->product = $request->product;
                $temp->loading_arm()->save($secEq);
                break;
            case 'Tanks':
                $secEq = new Tank();
                $secEq->product = $request->product;
                $secEq->height = $request->height;
                $secEq->diameter = $request->diameter;
                $secEq->capacity = $request->capacity;
                $temp->tank()->save($secEq);
                break;
            case 'Generators':
                $secEq = new Generator();
                $temp->generator()->save($secEq);
                break;
            case 'Fuel Meters':
                $secEq = new FuelMeter();
                $secEq->category = $request->category;
                $temp->fuel_meter()->save($secEq);
                break;
        }
        return redirect('/equipment/'.$temp->id.'/components');
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
        switch($_COOKIE['equip']){
            case 'Pumps':
                $equipment = Equipment::with('pump')->find($id);
                break;
            case 'Tanks':
                $equipment = Equipment::with('tank')->find($id);
                break;
            case 'Loading Arms':
                $equipment = Equipment::with('loading_arm')->find($id);
                break;
            case 'Generators':
                $equipment = Equipment::with('generator')->find($id);
                break;
            case 'Fuel Meters':
                $equipment = Equipment::with('fuel_meter')->find($id);
                break;
        }
        return view('equipments.edit', compact('equipment', 'x'));
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

        //return $request;
        Equipment::findOrFail($id)->update($request->all());
        if($request->has('pump')) Pump::where('equipment_id', $id)->update($request->pump);
        else if($request->has('tank')) Tank::where('equipment_id', $id)->update($request->tank);
        else if($request->has('loading_arm')) LoadingArm::where('equipment_id', $id)->update($request->loading_arm);
        else if($request->has('generator')) Generator::where('equipment_id', $id)->update($request->generator);
        else if($request->has('fuel_meter')) FuelMeter::where('equipment_id', $id)->update($request->fuel_meter);

        return redirect('/equipments');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Equipment::findOrFail($id)->delete();
        return redirect('/equipments');
    }

    public function addComponents($id)
    {
        $equipment = Equipment::findOrFail($id);
        return view('equipments.addComponents', compact('equipment'));
    }
}
