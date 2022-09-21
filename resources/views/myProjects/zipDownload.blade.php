@extends('layouts.myapp')

@section('content')

<div class="my-work text-center pt-5 pb-5">
 <div class="container">

    @include('myProjects.projectHeader',$project)

    <h3>zip file for : <span class="text-danger mb-3"> {{$project->projName}}</span> </h3>
    <div class="row">
        <div class="col-md-10">
            <div class="w-auto p-1 d-flex justify-content-between" style="  border:2px solid black; border-radius:5px;" >
                {{-- <span class="me-0 p-2">{{end(explode($proj->projFileZip,'/'))}}</span> --}}
                <span class="me-0 p-2">
                   {{ basename($project->projFileZip )}}
                  </span>
                <a class="bg-success text-white text-decoration-none ms-0 p-2" href="{{route('download.zip',$project->id)}}">Dounload</a>

                {{-- {{URL::to('/')}}/file/example.png" --}}
            </div>

        </div>
    </div>
</div>
</div>

@endsection
