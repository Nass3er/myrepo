@extends('layouts.myapp')

 @section('content')
<div class="container mt-7 mb-5">
    @if ($message=Session::get('msg'))
           <div class="alert alert-primary" role="alert">
               {{$message}}
           </div>

    @endif
    <div class="row justify-content-center">
     <div class="card">
        <div class="header mt-5 mb-5 text-danger"> UPDATE BLOG <span class="text-danger">{{$blog->title}}</div>

          <div class="body">
            <form method="POST"  action="{{ route('blogs.update', $blog->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group mb-3">
                    <label for="exampleinputemail"> Title</label>
                    <input type="text" class="form-control" name="title" value="{{$blog->title}}" required>
                </div>
                <div class="form-group mb-3">
                    <label for="exampleinputemail text-success"> Content</label>
                    <textarea type="text" class="form-control" name="content" required> {{$blog->content}}</textarea>
                </div>
                <div class="form-group mb-3">
                    <label for="exampleinputemail"> image</label>
                    <input type="file" class="form-control" name="photo">
                </div>
                <button type="submit" class="btn btn-primary mt-3 mb-3" value="">Send</button>

            </form>
            <span> </span>
          </div>
     </div>
    </div>
</div>

@endsection

