@extends('layouts.myapp')

@section('content')
<div class="my-work pt-5 pb-5">
    <div class="container">
                <div class="main-title mt-5 mb-5 position-relative text-center">
                        <img class="" src="{{URL::asset('imgs/nlogo.jpg')}}" alt="" width="110px">
                        <h2 class="fw-bold"> My Projects</h2>
                        <P class="text-black-50 text-uppercase"  >Prepare to be amazed</P>

                </div>


                <div class="row">
                 @foreach ($allprojects as $project)


                    <div class="col-sm-6 col-md-4 col-lg-3 ">
                        <div class="box mb-3 bg-dark" data-work="{{$project->projName}}">
                            <div style="width:auto;height:200px;">
                                <img class="img-fluid  p-1" style="" src="{{URL::asset($project->projMainPhoto)}}" alt="">

                            </div>
                         <h1 class="text-center p-2 mt-2" style="color: white;"> {{$project->projName}}</h1>
                          <div class="text pb-3 text-center" >

                          </div>
                       <div class="text-center mb-2" >
                           @if (Auth::check())
                              @can('isAdmin')
                              <span>
                                <a href="{{route('project.destroy',['id'=> $project->id])}}">
                                  <i class="fas fa-trash-alt text-danger fa-2x " ></i></a>

                                <a href="{{route('projects.edit', $project->id)}}">
                                  <i class="fas fa-edit text-primary fa-2x " ></i></a>

                             </span>
                              @endcan
                           @endif
                            <span class="direct " style="border: 1px solid white;border-radius:25px;padding:15px;box-shadow: inset 0px 0px 4px 3px white;
                              cursor:pointer; ">
                                 <a href="{{route('projects.show',$project->id)}}">
                                     <i class="fa-duotone fa-greater-than text-white fa-2x mb-0 gr"  ></i></a>
                           </span>


                        </div>

                        </div>
                      </div>

                    @endforeach
<div>
    {!!$allprojects->links()!!}
</div>

@endsection
