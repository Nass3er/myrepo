
 @include('blogs.blogsPage')



 <div class="blog mt-5 mb-5">

    <div class="container">
        @if ($message=Session::get('msg'))
        <div class="alert alert-primary" role="alert">
            {{$message}}
        </div>
      @endif
      @if (Auth::check())
      @can('isAdmin')
        <a href="{{ route('books.create') }}" class="btn btn-primary ms-20 mt-5 mb-3 header"> add book</a>
      @endcan
      @endif
        <div class="row">
            @foreach ($books as $book)
          <div class="med col-md-4 col-lg-3 col-sm-6 mb-3">
            <div class="card overflow-hidden">
              <div class="card-title">
                <img class="image-top img-thumbnail" src="{{URL::asset($book->book_photo)}}" alt="book image">

                <h3 class="ms-2">{{ $book->book_name}}</h3>
              </div>
              <div class="card-text ms-2 d-flex justify-content-between">
                <p>author: <span class="text-danger"> {{ $book->writer}}</span></p>
                <span>pages: <span class="text-danger me-2"> 30</span></span>
              </div>

              @if (Auth::check())
              @can('isAdmin')
               <div class="">
                <a href="{{route('books.edit',$book->id)}}" class=" p-3"><i class="fas fa-edit text-primary"></i></a>
                <a href="{{route('book.destroy',['id'=>$book->id])}}" class="p-3"><i class="fas fa-trash-alt text-danger"></i></a>
              </div>
              @endcan
              @endif

               <div class="row align-items-center">
                <a href="#" class="col-6 text-center bg-primary p-2 text-white text-decoration-none">open</a>
                <a href="#" class="col-6 text-center bg-success p-2 text-white  text-decoration-none">download</a>
              </div>
            </div>
          </div>
           @endforeach
        </div>

      </div>
     {{-- <div class="container">
        <a href="{{ route('books.create') }}" class="btn btn-primary ms-20 mt-5 header"> add book</a>
         <div class="row jsutify-content-center">
             @foreach ($books as $book)
             <div class="col-md-4 col-lg-3 col-sm-6 col-xs-6 mb-3">
                 <div class="card pt-2">
                   <h2 class="card-title ps-3 text-primary"><a href="">{{ $book->book_name}}</a></h2>
                   <span class="text-black-50 ps-3"> <i class="fa-brands fa-n fa-lg"></i> {{ $book->writer}}</span>
                     <div class="card-body">
                       <img src="{{URL::asset($book->book_photo)}}" class="img-fluid mb-3"alt="">
                         <p class="card-text public-project-paragraph" >



                       </div>
                       <div  >
                           <ul class=" list-unstyled w-100 mb-0 mt-3" style="display: flex; flex-direction: row; justify-content: space-between; align-items: center;">
                               <li >
                                   <a href="#" class="d-block">
                                       <i class="fa-brands fa-facebook fa-lg rounded-circle p-2"> Open</i>
                                   </a>
                               </li>

                             <li >
                                 <a href="#" class="d-block">
                                     <i class="fa-brands fa-facebook fa-lg rounded-circle p-2 bg-success">Download</i>
                                 </a>
                             </li>
                           </ul>


                       </div>




                 </div>
         </div>

         @endforeach



         </div>

         {{-- <div class="d-flex justify-content-center">
             {!! $books>links()-> !!}
         </div> --}}
     {{-- </div> --}}
 </div>






















