
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
        <div class="header mt-5 mb-5"><h2 class="text-danger"> create bloge</h2>  </div>

          <div class="body">
            <form method="POST"  action="{{ route('blogs.store') }}" enctype="multipart/form-data">
                @csrf

                <div class="form-group  mb-3">
                    <label for="exampleinputemail"> Title</label>
                    <input type="text" class="form-control" name="title" required>
                </div>
                <div class="form-group mb-3">
                    <label for="exampleinputemail"> Content</label>
                    <textarea type="text" class="form-control" name="content" required> </textarea>
                </div>
                <div class="form-group  mb-3">
                    <label for="exampleinputemail"> image</label>
                    <input type="file" class="form-control" name="photo" >
                </div>
                <button type="submit" class="btn btn-primary  mb-3" value="">Send</button>

            </form>
            <span> </span>
          </div>
     </div>
    </div>
</div>



@endsection
