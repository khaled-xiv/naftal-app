<?php

namespace App\Http\Controllers;

use App\Center;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware(['auth','verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $centers=Center::all();
        return view('home',compact('centers'));
    }

    public function sendEmail(Request $request)
    {
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
        return redirect('/#contact')->with('status',__('Your request has been submitted and is being processed'));
    }
}
