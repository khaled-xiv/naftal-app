<?php

namespace App\Http\Controllers;

use App\Center;
use App\Component;
use App\Req_inter;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class Req_interController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware(['auth','verified','role:district chief,center chief']);
    }

    public function index()
    {
        $openned_reqs = DB::table('equipments')
            ->leftJoin('req_inters', 'equipments.id', '=', 'req_inters.equipment_id')
            ->where('valide', 0)
            ->where('equipments.center_id',Auth::user()->center->id)
            ->select('req_inters.*','equipments.code')
            ->get();

        $closed_reqs=DB::table('equipments')
            ->leftJoin('req_inters', 'equipments.id', '=', 'req_inters.equipment_id')
            ->where('valide', 1)
            ->where('equipments.center_id',Auth::user()->center->id)
            ->select('req_inters.*','equipments.code')
            ->get();
        $received_reqs=DB::table('equipments')
            ->leftJoin('req_inters', 'equipments.id', '=', 'req_inters.equipment_id')
            ->where('need_district', 1)
            ->select('req_inters.*','equipments.code','equipments.center_id')
            ->get();
        foreach ( $received_reqs as $received_req){
            $id=$received_req->center_id;
            $received_req->center  =Center::findOrFail($id)->code;
        }

        return view('req_inter.index',compact('openned_reqs','closed_reqs','received_reqs'));
    }

    public function getSelectedComps(Request $request)
    {
        $selected_comp=Req_inter::findOrFail(decrypt($request['id']))->components()->get();
        $temp=[];
        foreach ($selected_comp as $c){
            array_push($temp,  $c->pivot->component_id);
        }
        return   response()->json(array('msg'=> $temp),200);
    }

    public function getEquipment(Request $request)
    {
        switch ($request['name']){
            case "Pumps": {
                $pumps = DB::table('equipments')
                    ->leftJoin('pumps', 'equipments.id', '=', 'pumps.equipment_id')
                    ->whereNotNull('pumps.equipment_id')
                    ->where('equipments.center_id',Auth::user()->center->id)
                    ->select('equipments.code', 'pumps.equipment_id')
                    ->get();
                return response()->json(array('msg'=> $pumps),200);
            }
            case "Generators": {
                $generators = DB::table('equipments')
                    ->join('generators', 'equipments.id', '=', 'generators.equipment_id')
                    ->whereNotNull('generators.equipment_id')
                    ->where('equipments.center_id',Auth::user()->center->id)
                    ->select('equipments.code', 'generators.equipment_id')
                    ->get();
                return  response()->json(array('msg'=> $generators),200);
            }
            case "Tanks": {
                $tanks = DB::table('equipments')
                    ->join('tanks', 'equipments.id', '=', 'tanks.equipment_id')
                    ->whereNotNull('tanks.equipment_id')
                    ->where('equipments.center_id',Auth::user()->center->id)
                    ->select('equipments.code', 'tanks.equipment_id')
                    ->get();
                return  response()->json(array('msg'=> $tanks),200);
            }
            case "Loding arms": {
                $loadingArms = DB::table('equipments')
                    ->join('loading_Arms', 'equipments.id', '=', 'loading_Arms.equipment_id')
                    ->whereNotNull('loading_Arms.equipment_id')
                    ->where('equipments.center_id',Auth::user()->center->id)
                    ->select('equipments.code', 'loading_Arms.equipment_id')
                    ->get();
                return  response()->json(array('msg'=> $loadingArms),200);
            }
            case "Fuel meters": {
                $fuelMeters =  DB::table('equipments')
                    ->join('fuel_Meters', 'equipments.id', '=', 'fuel_Meters.equipment_id')
                    ->whereNotNull('fuel_Meters.equipment_id')
                    ->where('equipments.center_id',Auth::user()->center->id)
                    ->select('equipments.code', 'fuel_Meters.equipment_id')
                    ->get();
                return   response()->json(array('msg'=> $fuelMeters),200);
            }
        }
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $equips=['Pumps'=>__('Pumps'),'Tanks'=>__('Tanks'),'Loding arms'=>__('Loding arms'),'Generators'=>__('Generators'),'Fuel meters'=>__('Fuel meters')];

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
        return  redirect()->route('requests.show')->with('status',__('An item was successfully added'));
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
        $id=decrypt($id);
        $req_inter=Req_inter::findOrFail($id)->equipment_id;
        $comps=Component::where('equipment_id',$req_inter)
            ->pluck('designation','id');

        $pumps = DB::table('equipments')
            ->leftJoin('pumps', 'equipments.id', '=', 'pumps.equipment_id')
            ->whereNotNull('pumps.equipment_id')
            ->where('equipments.center_id',Auth::user()->center->id)
            ->select('equipments.code', 'pumps.equipment_id')->get()
            ->pluck('code','equipment_id');

        $tanks = DB::table('equipments')
            ->join('tanks', 'equipments.id', '=', 'tanks.equipment_id')
            ->whereNotNull('tanks.equipment_id')
            ->where('equipments.center_id',Auth::user()->center->id)
            ->select('equipments.code', 'tanks.equipment_id')
            ->get()->pluck('code','equipment_id');

        $loadingArms = DB::table('equipments')
            ->join('loading_Arms', 'equipments.id', '=', 'loading_Arms.equipment_id')
            ->whereNotNull('loading_Arms.equipment_id')
            ->where('equipments.center_id',Auth::user()->center->id)
            ->select('equipments.code', 'loading_Arms.equipment_id')
            ->get()->pluck('code','equipment_id');

        $generators = DB::table('equipments')
            ->join('generators', 'equipments.id', '=', 'generators.equipment_id')
            ->whereNotNull('generators.equipment_id')
            ->where('equipments.center_id',Auth::user()->center->id)
            ->select('equipments.code', 'generators.equipment_id')
            ->get()->pluck('code','equipment_id');

        $fuelMeters =  DB::table('equipments')
            ->join('fuel_Meters', 'equipments.id', '=', 'fuel_Meters.equipment_id')
            ->whereNotNull('fuel_Meters.equipment_id')
            ->where('equipments.center_id',Auth::user()->center->id)
            ->select('equipments.code', 'fuel_Meters.equipment_id')
            ->get()->pluck('code','equipment_id');

        $openned_req=Req_inter::findOrFail($id);
        $openned_req['created_at']=Carbon::parse($openned_req['created_at'])->format('Y-m-d\TH:i');
        if ($openned_req['intervention_date'])$openned_req['intervention_date']=Carbon::parse($openned_req['intervention_date'])->format('Y-m-d\TH:i');
        if ($openned_req['intervention_date_2'])$openned_req['intervention_date_2']=Carbon::parse($openned_req['intervention_date_2'])->format('Y-m-d\TH:i');
        $openned_req['equipment']=$openned_req['equipment_name'];
        $equips=['Pumps'=>__('Pumps'),'Tanks'=>__('Tanks'),'Loding arms'=>__('Loding arms'),'Generators'=>__('Generators'),'Fuel meters'=>__('Fuel meters')];
        return view('req_inter.edit',compact('openned_req','equips','comps','fuelMeters','pumps','loadingArms','tanks','generators'));
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
        $id=decrypt($id);
        $request->validate([
            'number' => [ 'required','string', 'max:255','unique:req_inters,number,'.$id],
            'degree_urgency' => ['required'],
            'equipment_id' => ['required'],
            'equipment' => ['required','string'],
            'description' => ['required','string']
        ]);
        $openned_req=Req_inter::findOrFail($id);
        $openned_req->update($request->all());
        return  redirect()->route('request.edit',encrypt($id));
    }

    public function update_after_inter(Request $request,$id)
    {
        $id=decrypt($id);
        $request->validate([
            'intervention_date' => ['required'],
            'description_2' => ['required'],
        ]);
        $openned_req=Req_inter::findOrFail($id);
        $data=$request->all();
        unset($data['component_id']);
        if(!$request['need_district']) $openned_req->valide=1;
        if($request['need_district']) $openned_req->valide=0;
        $comps=$request['component_id'];
        if($comps) $comps = array_map('intval', $comps);
        $openned_req->components()->sync($comps);
        $openned_req->update($data);
        return  redirect()->route('request.edit',encrypt($id));
    }

    public function update_discrict_inter(Request $request,$id)
    {
        return $request->all();
        $id=decrypt($id);
        $request->validate([
            'intervention_date_2' => ['required'],
            'description_3' => ['required'],
        ]);
        $openned_req=Req_inter::findOrFail($id);
        $data=$request->all();
        unset($data['component_id']);
        $comps=$request['component_id'];
        if($comps) $comps = array_map('intval', $comps);
        $openned_req->components()->sync($comps);
        $openned_req->update($data);
        return  redirect()->route('request.edit',encrypt($id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $id=decrypt($id);
        Req_inter::findOrFail($id)->delete();
        return  redirect()->route('requests.show')->with('status',__('An item was successfully deleted'));
    }
}
