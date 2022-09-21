<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Code;
use App\Models\Project;
use App\Models\ProjectImageDesign;
class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
       $projects=Project::latest()->paginate(10);
       return view('myprojects.index',compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('myProjects.addProject');
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
            'projName' => 'required',
            'mainPhoto' => 'required',
            'designPhotos' => 'required',


         ]);

     $request->zipFile->move('uploads/project_zip_files',$request->zipFile->getClientOriginalName());
    $mphoto=$request->mainPhoto;
    $newp=time().$mphoto->getClientOriginalName();
    $mphoto->move('uploads/project_image',$newp);

    $title=$request->codeTitle;// for code title
    $code=$request->sourceCode;// for code source



      $project= Project::create([
        'projName' => $request->projName,
        'projMainPhoto' => 'uploads/project_image/'.$newp,
        'projFileZip' => 'uploads/project_zip_files/'.$request->zipFile->getClientOriginalName(),
        ]);


        Code::create([
            'project_id' =>$project->id,
           'codeTitle' =>$title,
           'sourceCode' =>$code,
        ]);

            function getImages($photos,$p_id){

                foreach ($photos as $key =>$val) {
                    $newpdes=time().$val->getClientOriginalName();
                    $val->move('uploads/project_image',$newpdes);


                    ProjectImageDesign::create([
                        'project_id' => $p_id,
                        'designPhotos' =>'uploads/project_image/'.$newpdes,
                    ]);

                }
            }
         // call the above function
         getImages($request->designPhotos,$project->id);

        return redirect()->back()->with('msg','added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $project=Project::find($id);
            // dd($project->projectCode());
             return view('myProjects.code',compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $project=Project::find($id);
        return view('myProjects.projectEdit',compact('project'));
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
        $project=Project::find($id);
        $this->validate($request,[
            'projName' => 'required',
            'mainPhoto' => 'required',
            'designPhotos' => 'required',


         ]);
if($request->has('zipFile')){
     $request->zipFile->move('uploads/project_zip_files',$request->zipFile->getClientOriginalName());
     $project->projFileZip='uploads/project_zip_files/'.$request->zipFile->getClientOriginalName();
}
if ($request->has('mainPhoto')) {
    $mphoto=$request->mainPhoto;
    $newp=time().$mphoto->getClientOriginalName();
    $mphoto->move('uploads/project_image',$newp);
    $request->projMainPhoto = 'uploads/project_image/'.$newp;
}

if ($request->has('codeTitle') || $request->has('sourceCode') ) {
   $project->projectCode->update([
    'codeTitle' =>$request->codeTitle,
    'sourceCode' =>$request->sourceCode,
   ]);
}

        function getImages($photos,$p_id){

                foreach ($photos as $key =>$val) {
                    $newpdes=time().$val->getClientOriginalName();
                    $val->move('uploads/project_image',$newpdes);


                   $project->projectImgDesign()->update([

                        'designPhotos' =>'uploads/project_image/'.$newpdes,
                    ]);

                }
            }
          if($request->has('designPhotos')){
             getImages($request->designPhotos,$project->id);
          }

          $project->save();

          return redirect()->back()->with('msg','project updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $p=Project::find($id);

        $p->delete($id);
        return redirect()->back();
    }

    public function downloadZip($id){
       $pro=Project::find($id);
       return  response()->download($pro->projFileZip );
    }
}
