<?php

namespace App\Http\Controllers;

use App\Models\Subscrip;
use Illuminate\Http\Request;
 
class SubscripController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function store(Request $request)
    {
         $this->validate($request,[
             'sub_user_email' =>   ['required', 'string', 'email', 'max:255', 'unique:subscrips'],
         ]);

         return back()->with('submsg','subscriped successfully ');

    }



}
