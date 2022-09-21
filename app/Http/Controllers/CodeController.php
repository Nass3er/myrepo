<?php

namespace App\Http\Controllers;

use App\Models\Code;
use Illuminate\Http\Request;

class CodeController extends Controller
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {

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
            'project_id' => 'required',
            'codeTitle' => 'required',
            'sourceCode' => 'required',

         ]);
        Code::create([
            'project_id' =>$request->project_id,
           'codeTitle' =>$request->codeTitle,
           'sourceCode' =>$request->sourceCode,
        ]);

        return redirect()->back()->with('msg','added succesfullu');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Code  $code
     * @return \Illuminate\Http\Response
     */
    public function show(Code $code)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Code  $code
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $code=Code::find($id);
         return view('myProjects.codeEdit',compact('code'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Code  $code
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request ,$id)
    {
         $code=Code::find($id);
        $this->validate($request,[
            'codeTitle' => 'required',
            'sourceCode' => 'required',

         ]);

         $code->update([

           'codeTitle' =>$request->codeTitle,
           'sourceCode' =>$request->sourceCode,
        ]);
        return redirect()->back()->with('msg','code updated');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Code  $code
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $c= Code::find($id) ;
      $c->delete($id);
       return redirect()->back()  ;
    }

    public function addCode($id)
    {
        return view('myProjects.createCode')->with('project_id',$id);
    }
}
