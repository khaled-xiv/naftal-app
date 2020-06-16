<?php

namespace App\Http\Controllers;

use App\Center;
use App\User;
use App\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
        $users=User::where('id', '!=', Auth::id())->paginate(3);
        return view('users.index',compact('users'));
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
        $user=User::findOrfail(decrypt($id));
        $centers=Center::all()->pluck('code','id');
        $roles=['1'=>__('admin'),'2'=>__('district chief'),'3'=>__('center chief'),'4'=>__('technician')];
        return view('users.edit',compact('user','centers','roles'));
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

    public function close(Request $request,$id)
    {
        $id =decrypt($id);
        $user=User::findOrfail($id);
        $user->is_active=0;
        $user->update();
        return redirect()->route('users.show');
    }

    public function removeAddress(Request $request,$id)
    {
        $id =decrypt($id);
        $user=User::findOrfail($id);
        $user->address=null;
        $user->update();
        return redirect()->route('users.edit',encrypt($user->id));
    }
    public function removePhone(Request $request,$id)
    {
        $id =decrypt($id);
        $user=User::findOrfail($id);
        $user->phone=null;
        $user->isVerified=0;
        $user->update();
        return redirect()->route('users.edit',encrypt($user->id));
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
        //
    }
}
