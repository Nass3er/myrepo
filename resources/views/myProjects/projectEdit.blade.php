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
            <form  method="POST" action="{{ route('projects.update',$project->id) }}" enctype="multipart/form-data">


            @csrf
            @method('PUT')
            <div class="form-group mb-2">

                <label class="text-primary" for="Product Name">Project Name</label>

                <input type="text" name="projName" class="form-control" placeholder="Project Name" value="{{$project->projName}}">

            </div>

            <div class="form-group mb-2">

                <label class="text-primary" for="Project photo">Project main photo</label>

                <input type="file" name="mainPhoto" class="form-control" placeholder="Project main photo" >

            </div>

            <div class="form-group mb-2">

            <label class="text-primary" for="Project design photos">Product design photos (can attach more than one):</label>

            <br />

            <input type="file" class="form-control" name="designPhotos[]"  multiple />
            </div>

            <div class="form-group mb-2">

                <label class="text-primary" for="Project zip file">  choose zip file </label>

                <br />

                <input type="file" class="form-control" name="zipFile" />
            </div>

            <div class="form-group mb-2">

                <label class="text-primary" for="code title">code title</label>

                <input type="text" name="codeTitle" class="form-control" placeholder="code title"    >

            </div>

            <div class="scode form-group mb-2">

                <label class="text-primary" for="source code">source code</label>

                <textarea type="text" name="sourceCode" class="form-control" placeholder="Source code">  </textarea>

            </div>


            <input type="submit" class="btn btn-primary" value="Upload">

            </form>


        </div>
        </div>
  </div>
@endsection

