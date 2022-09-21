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
        <div class="header mt-5 mb-5">  UPDATE BOOKE: <span class="text-danger">{{$book->book_name}}</span> </div>

          <div class="body">
            <form method="POST"  action="{{ route('books.update',$book->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group mb-3">
                    <label for="exampleinputemail"> Writter</label>
                    <input type="text" class="form-control" name="writer" value="{{$book->writer}}" required>
                </div>

                <div class="form-group mb-3">
                    <label for=""> photo</label>
                    <input type="file" class="form-control" name="book_photo"  >
                </div>
                <div class="form-group mb-3">
                    <label for="exampleinputemail"> book </label>
                    <input type="file" class="form-control" name="book_source"  >
                </div>
                <button type="submit" class="btn btn-primary" value="">Send</button>

            </form>
            <span> </span>
          </div>
     </div>
    </div>
</div>



@endsection
