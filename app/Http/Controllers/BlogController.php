<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Image;
class BlogController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs=Blog::paginate(10);
        return view('blogs.index',compact('blogs'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('blogs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $request->validate([
          'title'=>'required',
          'content'=>'required',
         ]);

         $newPhoto=null;
         if ($request->has('photo')) {
            $photo=$request->photo;
            $newPhoto=time().$photo->getClientOriginalName(); // get absolute path
           //   $destthumb=public_path('/thumbnail');
            $img=Image::make($photo->getRealPath());//($photo->path())
            $img->resize(350,302,function($const){
                $const->aspectRatio();
            })->save( 'uploads/blogs_images/'.$newPhoto);

            $blogs=Blog::create([
                'title'=> $request->title,
                'content'=>$request->content,
                'photo'=>'uploads/blogs_images/'.$newPhoto,
                'slug'=>$request->title,
             ]);
         } else{

        //  $photo->move('uploads/blogs_images',$newPhoto);

         $blogs=Blog::create([
            'title'=> $request->title,
            'content'=>$request->content,
            'slug'=>$request->title,
         ]);
         }

         return redirect()->route('blogs.index')->with('msg','updated successfully') ;

     }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        // $blog=Blog::find($slug);
        return view('blogs.show', compact('blog')) ;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(  $id)
    {
       $blog=Blog::find($id);

        return view('blogs.blogEdit',compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

         $request->validate([
            'title'=>'required',

           ]);
         $blog=Blog::find($id);

           if($request->has('photo')){
                $photo=$request->photo;
                $newPhoto=time().$photo->getClientOriginalName(); // get absolute path
                // $destthumb=public_path('/thumbnail');
                $img=Image::make($photo->getRealPath());// or i think ($photo->path())

                $img->resize(350,302,function($const){
                    $const->aspectRatio();
                // })->save( $destthumb.'/'.$newPhoto);
            })->save( 'uploads/blogs_images/'.$newPhoto);

                // $photo->move('uploads/blogs_images',$newPhoto);

                $blog->update([
                    'title'=> $request->title,
                    'content'=>$request->content,
                    // 'photo'=>'thumbnail/'.$newPhoto,
                    'photo'=>'uploads/blogs_images/'.$newPhoto,
                    'slug'=>$request->title,
                 ]);

          } else{
                $blog->update([
                    'title'=> $request->title,
                    'content'=>$request->content,
                    'slug'=>$request->title,
                ]);
           }
             return redirect()->route('blogs.index')->with('msg','updated successfully') ;

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $blog=Blog::find($id);
         $blog->delete($id);
           return redirect()->back();
    }

    public function blogsPage(){
        return view('blogs.blogsPage');

    }
}
