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

    public function index()
    {
        return view('account.index');
    }



    public function upladeImage(Request $request)
    {
        $rules = [
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
        $Validator = Validator::make($request->all() , $rules);
        if ($Validator->fails()) {
            return redirect()->route('account.show')
                ->withErrors($Validator)
                ->withInput();
        }
        $user=User::findOrfail(Auth::user()->id);
        if(!is_null($user->photo)){
            unlink(public_path().'/img/users/'. $user->photo);
        }
        $image = $request->file('photo');
        $ext = $image->getClientOriginalExtension();
        $name = $user->email.'.'.$ext ;
        $image->move('img/users',$name);

        $user->update(['photo'=>$name]);
        return redirect()->route('account.show');
    }

    public function removeImage()
    {

        $user=User::findOrfail(Auth::user()->id);
        if(!is_null($user->photo)){
            unlink(public_path().'/img/users/'. $user->photo);
        }
        $user->photo=null;
        $user->save();
        return redirect()->route('account.show');
    }

    public function removeAddress(Request $request)
    {
        $user=User::findOrfail(Auth::user()->id);
        $user->address=null;
        $user->update();
        return redirect()->route('account.show');
    }

    public function removeFbLink(Request $request)
    {
        $user=User::findOrfail(Auth::user()->id);
        $user->fb_link=null;
        $user->update();
        return redirect()->route('account.show');
    }
    public function removeGmailLink(Request $request)
    {
        $user=User::findOrfail(Auth::user()->id);
        $user->gmail_link=null;
        $user->update();
        return redirect()->route('account.show');
    }
    public function removeTwitterLink(Request $request)
    {
        $user=User::findOrfail(Auth::user()->id);
        $user->twitter_link=null;
        $user->update();
        return redirect()->route('account.show');
    }
    public function removePhone(Request $request)
    {
        $user=User::findOrfail(Auth::user()->id);
        $user->phone=null;
        $user->isVerified=0;
        $user->update();
        return redirect()->route('account.show');
    }

    public function close(Request $request)
    {
        $user=User::findOrfail(Auth::user()->id);
        $user->is_active=0;
        $user->update();
        return redirect()->route('logout');
    }


    public function update(Request $request,$id)
    {
        $id =decrypt($id);
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
        return redirect()->route('account.show');
    }

}
