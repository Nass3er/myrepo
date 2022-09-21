@extends('layouts.myapp')

@section('content')
<div class="container">

        @if ($message=Session::get('msg'))
        <div class="alert alert-primary" role="alert">
            {{$message}}
        </div>
        @endif

        @if (count($errors)>0)
            @foreach ($errors as $item)
            <div class="alert alert-danger">
                {{$item}}
            </div>

            @endforeach

            @endif
        <div class="row">
        <div class="col-md-8 col-lg-10 mt-3">
            <form  method="POST" action="{{ route('codes.update',$code->id) }}" enctype="multipart/form-data">


            @csrf
             @method('PUT')
            <input type="hidden" name="project_id" value="">
            <div class="form-group mb-2">

                <label class="text-primary" for="code title">code title</label>

                <input type="text" name="codeTitle" class="form-control" placeholder="code title" value="{{$code->codeTitle}}">

            </div>

            <div class="scode form-group mb-2">

                <label class="text-primary" for="source code">source code</label>

                <textarea type="text" name="sourceCode" class="form-control" placeholder="Source code" value=""> {{$code->sourceCode}}  </textarea>

            </div>


            <input type="submit" class="btn btn-primary" value="Upload">

            </form>


        </div>
        </div>
  </div>
@endsection

