<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Image;
class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $books=Book::all();
         return view('books.index',compact('books') ) ;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('books.create');
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

             'writer'=>'required',
             'book_photo'=>'Image',
             'book_source'=>'required',

         ]);
         $photo=$request->book_photo;
         $pdfFile=$request->book_source;
         $newp1=time().$photo->getClientOriginalName();

         $img=Image::make($photo->getRealPath()); //($photo->path())
         $img->resize(350,302,function($con){
             $con->aspectRatio();
         })->save( 'uploads/books_image/'.$newp1);

         $newp2=time().$pdfFile->getClientOriginalName();
        //  $photo->move('uploads/books_image',$newp1);
         $pdfFile->move('uploads/books_source',$newp2);



          $books=Book::create([
              'book_name'=>$pdfFile->getClientOriginalName(),
              'writer' =>$request->writer,
              'book_photo' => 'uploads/books_image/'.$newp1,
              'book_source' => 'uploads/books_source/'.$newp2,

          ]);

          return redirect()->route('books.index')->with('msg','add successfully') ;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $book=Book::find($id);

        return view('books.bookEdit',compact('book'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([

            'writer'=>'required',

        ]);
       $book=Book::find($id);
if($request->has('book_photo')){

        $photo=$request->book_photo;
        $newp1=time().$photo->getClientOriginalName();
        $img=Image::make($photo->getRealPath()); //($photo->path())
        $img->resize(350,302,function($con){
            $con->aspectRatio();
        })->save( 'uploads/books_image/'.$newp1);

        // $photo->move('uploads/books_image',$newp1);
       $book->book_photo ='uploads/books_image/'.$newp1;
}

if($request->has('book_source')){

    $pdfFile=$request->book_source;
    $newp2=time().$pdfFile->getClientOriginalName();
    $pdfFile->move('uploads/books_source',$newp2);

    $book->book_source='uploads/books_source/'.$newp2;
    $book->book_name=$pdfFile->getClientOriginalName();
}
if($request->has('writer')){
   $book->writer =$request->writer;
  }
   $book->save();
    return redirect()->route('books.index')->with('msg','updated successfully') ;

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $book=Book::find($id);
        $book->delete($id);
        return redirect()->back();
}
}
