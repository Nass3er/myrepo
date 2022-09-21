<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use Auth;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'blog_id' =>'required',
          'description'=>'required',

         ]);

        if ($request->has('user_name') && $request->has('user_email')) {
            $input=$request->all();
            Comment::create($input);

        }else{
            // if($request->has('parent_id')){

                Comment::create([
                    'blog_id' =>$request->blog_id,
                    'parent_id'=>($request->has('parent_id')) ? $request->parent_id : null,
                    'description' =>$request->description,
                    'user_name'=>Auth::user()->name ,
                    'user_email'=>Auth::user()->email,
                ]);

        //    }else{

                // Comment::create([
                //     'blog_id' =>$request->blog_id,
                //     'description' =>$request->description,
                //     'user_name'=>Auth::user()->name ,
                //     'user_email'=>Auth::user()->email,
                // ]);
            // }

        }



        // $input['user_id']=auth()->user()->id;


        return back();
    }
}
