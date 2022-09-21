<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $users=User::all();
         return view('manageUsers.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('manageUsers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $this->validate($request,[
             'name' =>'required',
             'email'=>'required',
             'password'=>'required',
             'confirmPass'=>'required',
         ]);

         $input=$request->all();
         User::create($input);

         return  redirect()->route('manageUsers.index')->with('msg','created successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $user=User::find($id);
         return view('manageUsers.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user=User::find($id);
        return view('manageUsers.edit',compact('user'));
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
        $user=User::find($id);
        $this->validate($request,[
            'name' =>'required',
            'email'=>'required',

        ]);
        if($request->has('userRole')){
            $user->role = $request->userRole;
        }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();


        return redirect()->route('users.index')->with('msg','updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $user=User::find($id);
      $user->delete($id);
      return  redirect()->back();
    }
}
