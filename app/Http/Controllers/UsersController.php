<?php

namespace App\Http\Controllers;

use App\User;
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
    public function index()
    {
        $users=User::where('id', '!=', Auth::id())->paginate(1);
//        $users=User::paginate(1);

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
        $user=User::findOrfail($id);
        return view('users.edit',compact('user'));
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

    public function removeAddress(Request $request,$id)
    {
        $user=User::findOrfail($id);
        $user->address=null;
        $user->update();
        return redirect('/users/'.$id);
    }
    public function removePhone(Request $request,$id)
    {
        $user=User::findOrfail($id);
        $user->phone=null;
        $user->isVerified=0;
        $user->update();
        return redirect('/users/'.$id);
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
        return redirect('/users/'.$id);
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
