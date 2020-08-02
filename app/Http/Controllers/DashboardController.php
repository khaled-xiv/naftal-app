<?php

namespace App\Http\Controllers;

use App\Answer;
use App\Center;
use App\Equipment;
use App\Error;
use App\Failure;
use App\Forum;
use App\Maintenance;
use App\Telemetry;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class DashboardController extends Controller
{
    public function index()
    {
        $count['centers']=Center::all()->count();
        $count['equipments']=Equipment::all()->count();
        $count['users']=User::all()->count();
        $count['posts']=Forum::all()->count();
        $count['comments']=Answer::all()->count();
        return view('dashboard.index',compact('count'));
    }
    public function getErrors()
    {
        $result = Error::
            select('error_code',DB::raw('count(*) as count'))
            ->groupBy('error_code')
            ->orderBy('count','desc')
            ->get();
        return response()->json($result);
    }

    public function getMaints()
    {
        $result = Maintenance::
        select('comp',DB::raw('count(*) as count'))
            ->groupBy('comp')
            ->orderBy('count','desc')
            ->get();
        return response()->json($result);
    }

    public function getFailures()
    {
        $result = Failure::
        select('comp',DB::raw('count(*) as count'))
            ->groupBy('comp')
            ->orderBy('count','desc')
            ->get();
        return response()->json($result);
    }

    public function uploadMachines(Request $request)
    {
        try {
            $items=$request->all();
            foreach ($items as $item){
                Equipment::create([
                    'model'=>$item['model'],
                    'center_id'=>1,
                    'age'=>$item['age'],
                ]);
            }
            return response()->json(['status'=>'success'],200);
        }catch (\Exception $e){
            Log::info($e->getMessage());
            return response()->json(['status'=>$e->getMessage()],400);
        }

    }

    public function uploadTelemety(Request $request)
    {
        $items=$request->all();
        foreach ($items as $item){
            Telemetry::create([
                'equipment_id'=>$item['id'],
                'volt'=>$item['volt'],
                'rotate'=>$item['rotate'],
                'pressure'=>$item['pressure'],
                'vibration'=>$item['vibration'],
                'dateTime'=>$item['dateTime'],
            ]);
        }
        return response()->json('salam');
    }

    public function uploadFailures(Request $request)
    {
        try {
            $items=$request->all();
            foreach ($items as $item){
                Failure::create([
                    'equipment_id'=>$item['id'],
                    'comp'=>$item['comp'],
                    'dateTime'=>$item['dateTime'],
                ]);
            }
            return response()->json(['status'=>'success'],200);
        }catch (\Exception $e){
            Log::info($e->getMessage());
            return response()->json(['status'=>$e->getMessage()],400);
        }
    }

    public function uploadErrors(Request $request)
    {
        try {
            $items=$request->all();
            foreach ($items as $item){
                Error::create([
                    'equipment_id'=>$item['id'],
                    'error_code'=>$item['error_code'],
                    'dateTime'=>$item['dateTime'],
                ]);
            }
            return response()->json(['status'=>'success'],200);
        }catch (\Exception $e){
            Log::info($e->getMessage());
            return response()->json(['status'=>$e->getMessage()],400);
        }
    }

    public function uploadMaint(Request $request)
    {
        try {
            $items=$request->all();
            foreach ($items as $item){
                Maintenance::create([
                    'equipment_id'=>$item['id'],
                    'comp'=>$item['comp'],
                    'dateTime'=>$item['dateTime'],
                ]);
            }
            return response()->json(['status'=>'success'],200);
        }catch (\Exception $e){
            Log::info($e->getMessage());
            return response()->json(['status'=>$e->getMessage()],400);
        }
    }
}
