<?php

namespace App\Http\Controllers;


use App\Center;
use App\Component;
use App\Equipment;
use App\FuelMeter;
use App\Generator;
use App\LoadingArm;
use App\Pump;
use App\Tank;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class EquipmentController extends Controller
{

    protected function validator(array $data, $id)
    {
        return Validator::make($data, [
            'code' => ['required', 'string', 'max:255', Rule::unique('equipments')->where(function ($query) {
                return $query->where('deleted_at', null);
            })->ignore($id)],
            'type' => ['required', 'string', 'max:255'],
            'mark' => ['required', 'string', 'max:255'],
            'model' => ['required', 'string', 'max:255'],
            'state' => ['required', 'string', 'max:255'],
        ]);
    }

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
        $validator = $this->validator($request->all(), -1);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $center = Center::findOrFail($request->centers);
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
            case 'Pompes':
                $secEq = new Pump();
                $secEq->rate = $request->rate;
                $secEq->product = $request->product;
                $temp->pump()->save($secEq);
                break;
            case 'Loading Arms':
            case 'Bras de Chargement':
                $secEq = new LoadingArm();
                $secEq->rate = $request->rate;
                $secEq->product = $request->product;
                $temp->loading_arm()->save($secEq);
                break;
            case 'Tanks':
            case 'Bacs':
                $secEq = new Tank();
                $secEq->product = $request->product;
                $secEq->height = $request->height;
                $secEq->diameter = $request->diameter;
                $secEq->capacity = $request->capacity;
                $temp->tank()->save($secEq);
                break;
            case 'Generators':
            case 'Groupes Electroniques':
                $secEq = new Generator();
                $temp->generator()->save($secEq);
                break;
            case 'Fuel Meters':
            case 'Compteurs':
                $secEq = new FuelMeter();
                $secEq->category = $request->category;
                $temp->fuel_meter()->save($secEq);
                break;
        }
        return redirect(LaravelLocalization::getUrlFromRouteNameTranslated(LaravelLocalization::getCurrentLocale(), 'routes.equipments'));
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
		if(!isset($_COOKIE['equip'])){
			$pumps = Pump::all();
			$tanks = Tank::all();
			$loadingArms = LoadingArm::all();
			$generators = Generator::all();
			$fuelMeters = FuelMeter::all();

			return view('equipments.index', compact('pumps', 'tanks', 'loadingArms', 'generators', 'fuelMeters'));
		}
        switch($_COOKIE['equip']){
            case 'Pumps':
            case 'Pompes':
                $equipment = Equipment::with('pump')->find($id);
                break;
            case 'Tanks':
            case 'Bacs':
                $equipment = Equipment::with('tank')->find($id);
                break;
            case 'Loading Arms':
            case 'Bras de Chargement':
                $equipment = Equipment::with('loading_arm')->find($id);
                break;
            case 'Generators':
            case 'Groupes Electroniques':
                $equipment = Equipment::with('generator')->find($id);
                break;
            case 'Fuel Meters':
            case 'Compteurs':
                $equipment = Equipment::with('fuel_meter')->find($id);
                break;
        }
        $components = Component::whereEquipmentId($id)->get();
        return view('equipments.edit', compact('equipment', 'components'));
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

        Equipment::findOrFail($id)->update($request->all());
        if($request->has('pump')) Pump::where('equipment_id', $id)->update($request->pump);
        else if($request->has('tank')) Tank::where('equipment_id', $id)->update($request->tank);
        else if($request->has('loading_arm')) LoadingArm::where('equipment_id', $id)->update($request->loading_arm);
        else if($request->has('generator')) Generator::where('equipment_id', $id)->update($request->generator);
        else if($request->has('fuel_meter')) FuelMeter::where('equipment_id', $id)->update($request->fuel_meter);

        return redirect(LaravelLocalization::getUrlFromRouteNameTranslated(LaravelLocalization::getCurrentLocale(), 'routes.equipments'));
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
        return redirect(LaravelLocalization::getUrlFromRouteNameTranslated(LaravelLocalization::getCurrentLocale(), 'routes.equipments'));
    }
}
