<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Twilio\Rest\Client;

class AccountController extends Controller
{

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'phone' => ['required', 'numeric','size:10' ,'unique:users'],
        ]);
    }


    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('account.index');
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

    public function removeAddress(Request $request)
    {
        $user=User::findOrfail(Auth::user()->id);
        $user->address=null;
        $user->update();
        return redirect('/account');
    }
    public function removePhone(Request $request)
    {
        $user=User::findOrfail(Auth::user()->id);
        $user->phone=null;
        $user->isVerified=0;
        $user->update();
        return redirect('/account');
    }

    public function close(Request $request)
    {
        $user=User::findOrfail(Auth::user()->id);
        $user->is_active=0;
        $user->update();
        return redirect('/logout');
    }


    public function update(Request $request, $id)
    {


        $input=$request->all();
        if ($input['name']!=null){
            $this->validate($request, [
                'name' => ['required', 'string', 'max:255']
            ]);
        }

        if ($input['email']!=null){
            $this->validate($request, [
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users']
            ]);
        }
        if ($input['password']!=null){
            $this->validate($request, [
                'password' => ['required', 'string', 'min:8', 'confirmed']
            ]);
            $input['password']=Hash::make($input['password']);
        }
        if ($input['phone']!=null){
            $this->validate($request, [
                'phone' => ['required', 'numeric','digits:10','unique:users']
            ]);

        }

        if ($input['address']!=null){
            $this->validate($request, [
                'address' => [ 'string','max:255' ]
            ]);
        }

        $user=User::findOrfail($id);
        if (! empty($input['email']))$user->unverify();
        $input=array_filter($input);
        $user->update($input);
        return redirect('/account');
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
