@extends('layouts.myapp')

@section('content')
<div class="my-work text-center pt-5 pb-5">
   <div class="div container">

    @include('myProjects.projectHeader',$project)

            <h3 class="mb-3 mt-3">Project Name :<span class="text-danger"> {{$project->projName}}  </span>  </h3>
                <div class="row">
                    {{-- @dd($proj->projectImgDesign) --}}

                      @foreach ($project->projectImgDesign as $item)
                         <div class="col-xs-10 col-sm-10 col-md-6 col-lg-4 mb-3">
                            <img class="img-fluid" src="{{URL::asset($item->designPhotos)}}" alt="photo design">
                        </div>
                     @endforeach





                    </div>


    </div>
</div>


@endsection
