@extends('layouts.myapp')

@section('content')






<div class="my-work  pt-5 pb-5">
    <div class="container">



  @include('myProjects.projectHeader',$project)


                <div class="row">
                    @if ($message=Session::get('msg'))
                    <div class="alert alert-primary" role="alert">
                        {{$message}}
                    </div>
                    @endif



                    <div class="col-md-10 col-lg-10 d-flex justify-content-between align-items-center mt-5">
                        <h2 class="text-danger">Project Name :  {{$project->projName}}</h2>
                      @if (Auth::check())
                        @can('isAdmin')
                        <a class=" btn btn-primary mb-2"
                        href="{{route('codes.add',$project->id)}}"> add part of code</a>
                        @endcan
                      @endif

                    </div>

                    @foreach ($project->projectCode as $code)
                    <div class="col-md-10 col-lg-10 d-flex justify-content-between align-items-center mt-5">


                        <h6 class="ms-3">code title : {{$code->codeTitle}}</h6>
                        @if (Auth::check())
                        @can('isAdmin')
                        <div class="">
                        <a class="btn btn-primary mb-2"
                            href="{{route('codes.edit',$code->id)}}"><i class="fas fa-edit"></i></a>
                        <a class="btn btn-danger mb-2"
                            href="{{route('code.destroy',['id'=>$code->id])}}"><i  class="fas fa-trash-alt"></i></a>

                        </div>
                        @endcan
                        @endif
                    </div>

                    <div class="col-md-10 col-lg-10">
                        <pre class="pre-scrollable bg-dark" style="color:white; border-radius: 15px;">
                        <code class="hljs languge-xml">
                          {{-- {{ Str::of($code->sourceCode)->ltrim('  ')}} --}}
                          {{$code->sourceCode}}
                        </code>



                </pre>


                </div>

                <div>
                    <p>fmrngmg emrg  gergn</p>
                </div>

                @endforeach

                </div>


        </div>
</div>
@endsection


