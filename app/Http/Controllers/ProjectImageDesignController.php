<?php

namespace App\Http\Controllers;

use App\Models\ProjectImageDesign;
use App\Models\Project;
use Illuminate\Http\Request;


class ProjectImageDesignController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

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
        // ProjectImageDesign::create([
        //     'project_id' =>$request->id
        //     'designPhotos' =>'uploads/project_image/'.$newpdes,
        // ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProjectImageDesign  $projectImageDesign
     * @return \Illuminate\Http\Response
     */
    public function show(ProjectImageDesign $projectImageDesign)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProjectImageDesign  $projectImageDesign
     * @return \Illuminate\Http\Response
     */
    public function edit(ProjectImageDesign $projectImageDesign)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProjectImageDesign  $projectImageDesign
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProjectImageDesign $projectImageDesign)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProjectImageDesign  $projectImageDesign
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProjectImageDesign $projectImageDesign)
    {
        //
    }
}
