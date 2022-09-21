@extends('layouts.myapp')

@section('content')
<div class="blog mt-5 mb-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-7">


                <div class="card pt-2">
                  <a class="card-title ps-3 text-primary" href="#"><h2>{{ $blog->title}}</h2></a>
                  <span class="text-black-50 ps-3"> <i class="fa-solid fa-user fa-lg"></i> {{ $blog->created_at->diffForhumans() }}</span>
                    <div class="card-body">
                      <img src="{{URL::asset($blog->photo)}}" class="img-fluid mb-3"alt="">
                        <p class="card-text">{{ $blog->content}}</p>



                      </div>
                      <div  >
                          <ul class=" list-unstyled w-100 mb-0 mt-3" style="display: flex; flex-direction: row; justify-content: space-between; align-items: center;">

                            <li >
                                  <a href="#" class="d-block">
                                    <i class="fa-solid fa-heart ms-3 " style="font-size:1.2em;color:blue; " onclick="this.style='color:red'"></i>
                                  </a>
                              </li>
                              <li >
                                <a  class="d-block border-0"
                                data-bs-toggle="collapse"
                                data-bs-target="#reply"
                                aria-controls="reply"
                                aria-expanded="false"
                                aria-label="Toggle navigation"
                                >
                                     <i class="fa-regular fa-comment-dots" style="font-size: 1.5em"></i>
                              </a>
                            </li>
                            <li >
                                <a href="#" class="d-block">
                                    <i class="fa-solid fa-share-from-square me-2" style="font-size: 1.5em"></i>
                                </a>
                            </li>
                          </ul>

                      </div>


                    <div id="reply" class="collapse">
                <form action="{{route('comments.store')}}" method="post">
                    @csrf
                    <div class="form-group  m-2">
                        <label for="exampleinputcomment"> comment :*</label>
                        <textarea type="text" class="form-control" name="description"> </textarea>
                        <input type="hidden" class="form-control" name="blog_id" value="{{ $blog->id }}">

                    </div>
                       @if (!Auth::check())
                        <div class="form-group  m-2">
                            <label for="exampleinputname"> Name :*</label>
                            <input type="text" class="form-control" name="user_name">

                        </div>
                         <div class="form-group  m-2">
                            <label for="exampleinputemail"> email:*</label>
                            <input type="email" class="form-control" name="user_email">

                        </div>
                       @endif

                       <div class="form-group  m-2">
                        <button type="submit" class="btn btn-primary  ">Rplay</button>
                       </div>
                </form>
            </div>
            <h4 class="text-primary ms-3">Comments <span class="text-black-50">{{$blog->comments->count()}}</span> </h4>
            <hr class="text-success">
            @include('blogs.comments',['comments'=>$blog->comments,'blog_id'=>$blog->id])




                </div>
            </div>

    </div>


</div>


        </div>
    </div>
</div>
@endsection


{{-- first design --}}

{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="header">
                    <div class="card-body">
                        <h2 class="text-center text-primary">Q & A system</h2>
                        <br>
                        <h2>{{ $blog->title}}</h2>
                        <p>{{$blog->content}}</p>

                        <hr>

                        <h4>Comments</h4>
                        @include('blogs.comments',['comments'=>$blog->comments,'blog_id'=>$blog->id])

                          <hr>

                          <form action="{{route('comments.store')}}" method="post">
                            @csrf
                            <div class="foom-group">
                                <textarea type="text" class="form-control" name="description"> </textarea>
                                <input type="hidden" class="form-control" name="blog_id" value="{{ $blog->id }}">

                            </div>
                            <button type="submit" class="btn btn-primary">Rplay</button>
                         </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> --}}


