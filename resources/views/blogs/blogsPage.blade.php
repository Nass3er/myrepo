@extends('layouts.myapp')

 @section('content')


           <div class="my-work text-center pt-5 pb-5">

                <div class="container">

                            <ul class="list-unstyled d-flex justify-content-center mt-5 mb-5">
                                <li class="active rounded-pill"> <a  class="nav-link" href="{{route('blogs.index')}}">main</a></li>
                                <li> <a  class="nav-link" href="{{route('books.index')}}">books</a></li>
                                <li> <a  class="nav-link" href=" ">favorite</a></li>
                                <li> <a  class="nav-link" href=" ">photo</a></li>
                                
                            </ul>
                </div>
            </div>

@endsection





