<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use Auth;
use User;
use Session;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return view('admin.users.profile')->with('user', Auth::User());
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
       $this->validate($request,[
           'name'       =>  'required',
           'email'      =>  'required|email'
       ]);
       $user = Auth::user();

       if($request->hasFile('avator')){
        $avator = $request->avator;
        $avator_new_name = time().$avator->getClientOriginalName();
        $avator->move('uploads/profile/',$avator_new_name);

        $user->profile->avator  =   'uploads/profile/'.$avator_new_name;
        $user->profile->save(); 
       }
       $user->name = $request->name;
       $user->email = $request->email;
       $user->profile->facebook = $request->facebook;
       $user->profile->youtube = $request->youtube;
       $user->profile->linkedin = $request->linkedin;
       $user->profile->about = $request->about;

       $user->save();
       $user->profile->save();

       if($request->has('password')){
        $user->password  =   bcrypt($request->password);
       }

       Session::flash('success','Profile Updated Succesfully!');

       return redirect()->back();

       
    }
}
