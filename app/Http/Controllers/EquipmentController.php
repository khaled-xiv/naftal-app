<?php

namespace App\Http\Controllers;


use App\FuelMeter;
use App\Generator;
use App\LoadingArm;
use App\Pump;
use App\Tank;
use Illuminate\Http\Request;
use Symfony\Component\Console\Input\Input;

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
        switch($_COOKIE['equip']){
            case "Pumps": return "a";
            case "Tanks": return "b";
            case "Loading Arms": return "c";
            case "Generators": return "d";
            case "Fuel Meters": return "e";
            default : return "abcde";
        };
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
