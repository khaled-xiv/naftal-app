<?php

namespace App\Http\Controllers;

use App\Equipment;
use App\FuelMeter;
use App\Generator;
use App\LoadingArm;
use App\Pump;
use App\Req_inter;
use App\Tank;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
        $openned_req=Req_inter::where('intervention_date', null)->get();
        $openned_req=Req_inter::where('id', 1)->get();
        return $openned_req->equipment;

        return view('req_inter.index',compact('openned_req'));
    }

    public function getEquipment(Request $request)
    {
        $pumps = DB::table('equipments')
            ->leftJoin('pumps', 'equipments.id', '=', 'pumps.equipment_id')
            ->whereNotNull('pumps.equipment_id')
            ->select('equipments.code', 'pumps.equipment_id')
            ->get();

        $tanks = DB::table('equipments')
            ->join('tanks', 'equipments.id', '=', 'tanks.equipment_id')
            ->whereNotNull('tanks.equipment_id')
            ->select('equipments.code', 'tanks.equipment_id')
            ->get();

        $loadingArms = DB::table('equipments')
            ->join('loading_Arms', 'equipments.id', '=', 'loading_Arms.equipment_id')
            ->whereNotNull('loading_Arms.equipment_id')
            ->select('equipments.code', 'loading_Arms.equipment_id')
            ->get();

        $generators = DB::table('equipments')
            ->join('generators', 'equipments.id', '=', 'generators.equipment_id')
            ->whereNotNull('generators.equipment_id')
            ->select('equipments.code', 'generators.equipment_id')
            ->get();

        $fuelMeters =  DB::table('equipments')
            ->join('fuel_Meters', 'equipments.id', '=', 'fuel_Meters.equipment_id')
            ->whereNotNull('fuel_Meters.equipment_id')
            ->select('equipments.code', 'fuel_Meters.equipment_id')
            ->get();
        switch ($request['name']){
            case "Pumps": return response()->json($pumps,200)  ;
            case "Generators": return  response()->json($generators,200) ;
            case "Tanks": return  response()->json($tanks,200);
            case "Loding arms": return  response()->json($loadingArms,200) ;
            case "Fuel meters": return   response()->json($fuelMeters,200);
        }
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $equips=['Pumps'=>'Pumps','Tanks'=>'Tanks','Loding arms'=>'Loding arms','Generators'=>'Generators','Fuel meters'=>'Fuel meters'];

        return view('req_inter.create', compact('equips'));
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
            'degree_urgency' => ['required'],
            'equipment_id' => ['required'],
            'equipment' => ['required','string']
        ]);
    }

    public function store(Request $request)
    {
        $this->validator($request->all())->validate();
        Req_inter::create([
            'number' => $request['number'],
            'equipment_id' => $request['equipment_id'],
            'equipment_name' => $request['equipment'],
            'degree_urgency' => $request['degree_urgency'],
            'description' => $request['description'],
            'created_at' => $request['created_at']
        ]);
        $equips=['Pumps'=>'Pumps','Tanks'=>'Tanks','Loding arms'=>'Loding arms','Generators'=>'Generators','Fuel meters'=>'Fuel meters'];
        return view('req_inter.create', compact('equips'));
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
        $equips=Equipment::all()->pluck('designation','id');
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
