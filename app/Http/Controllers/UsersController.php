<?php

namespace App\Http\Controllers;

use App\Center;
use App\User;
use App\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }


    public function index()
    {
        $users=User::where('id', '!=', Auth::id())->paginate(10);
        return view('users.index',compact('users'));
    }

    public function show($id)
    {
        $user=User::findOrfail(decrypt($id));
        $centers=Center::all()->pluck('code','id');
        $roles=['1'=>__('admin'),'2'=>__('district chief'),'3'=>__('center chief'),'4'=>__('technician')];
        return view('users.edit',compact('user','centers','roles'));
    }


    public function close(Request $request,$id)
    {
        $id =decrypt($id);
        $user=User::findOrfail($id);
        $user->is_active=0;
        $user->update();
        return redirect()->route('users.show');
    }


    public function update(Request $request, $id)
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
        return redirect()->route('users.edit',encrypt($user->id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            User::findOrfail(decrypt($id))->delete();
            return redirect()->route('users.show');
        }catch (\Exception $exception){
            return redirect()->route('users.show');
        }

    }
}
