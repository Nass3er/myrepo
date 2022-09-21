@foreach ($comments as $item)

<div class="container border"
           @if ($item->parent_id !=null)
              style="margin-left:10px; background-color:#80808021;margin-right:0;"
           @endif >
     <div style="display: flex; flex-direction: row; justify-content: left;
            align-items: baseline; ">


            <div class="me-2 rounded-pill p-1" style="border: 1px solid black;  ">
              {{-- <img class="mt-0 ps-0 rounded-circle" src="{{asset('imgs/myphoto.jpg')}}" alt="user" width="70" height="70"> --}}
              <i class="fa-solid fa-user mt-0 ps-0 rounded-circle " style="width: 25px; height:25px;"></i>
            </div>
            <div class="ms-2">

              <h5 class="header pt-3 pb-2">{{$item->user_name}}</h5>
              <p>{{$item->description}}</p>
            </div>
        </div>


          <div  style=" display: flex;justify-content:space-between; align-items:center;">
                    <p></p>
                    <a href=""  class="text-black-50 mt-3 mb-2"



                data-bs-toggle="collapse"
                data-bs-target="{{ '#n'.$item->id}}"
                aria-controls="{{'n'.$item->id}}"
                aria-expanded="false"
                aria-label="Toggle navigation"
                > Replay</a>

          </div>
    </div>

    <div id="{{'n'.$item->id}}" class="collapse">
        <form action="{{route('comments.store')}}" method="post">
            @csrf
            <div class="form-group m-2">
                <label for="exampleinputcomment"> comment :*</label>
                <input type="text" class="form-control" name="description">
                <input type="hidden" class="form-control" name="blog_id" value="{{ $blog_id }}">
                <input type="hidden" class="form-control" name="parent_id" value="{{ $item->id }}">


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

            <button type="submit" class="btn btn-primary">Rplay</button>
         </form>

    </div>
    @include('blogs.comments',['comments'=>$item->replies])


@endforeach


