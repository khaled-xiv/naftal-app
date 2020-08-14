<?php

namespace App\Http\Controllers;

use App\Center;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    public function __construct()
    {
//        $this->middleware(['auth','verified']);
    }

    public function index()
    {
        $centers=Center::all();
        return view('home',compact('centers'));
    }

    public function sendEmail(Request $request)
    {
        try {
            $to_name = "hachemi abderrahmen";
            $to_email = "exemple@gmail.com";
            $data = array('name'=>$request['message'],'phone'=>$request['phone']);
            $subject=$request['subject'];
            $from_email=$request['email'];
            $from_name=$request['name'];
            Mail::send('emails.mail', $data, function($message) use ($from_email, $from_name, $subject, $to_name, $to_email) {
                $message->to($to_email, $to_name)
                    ->subject($subject);
                $message->from($from_email,$from_name);
            });
            return response()->json(['success'=>true,'status'=>__('Your request has been submitted and is being processed')],200);

        }   catch (\Exception $e){
            return response()->json(['success'=>false,'error'=>__('Please check your internet connection')],200);

        }
    }
}
