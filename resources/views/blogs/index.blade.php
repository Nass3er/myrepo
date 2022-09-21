
 @include('blogs.blogsPage')



 <div class="blog pt-5 pb-5">
    <div class="container">

    <div class="main-title mt-5 mb-5 position-relative text-center" >
        <img class="" src="{{URL::asset('imgs/nlogo.jpg')}}" alt="" width="120px">
        <h2 class="fw-bold"> Read My Blogs</h2>
        <P class="text-black-50 text-uppercase"  >new blogs</P>

   </div>

   <div>
    @if (Auth::check())
    @can('isAdmin')
      <a href="{{ route('blogs.create') }}" class="btn btn-primary ms-20 mt-5 mb-3 header"> add blog</a>
    @endcan
    @endif
   </div>
    <div class="row jsutify-content-center">

        @foreach ($allblogs as $blo)
        <div class="col-md-6 col-lg-6 mb-3">
            <div class="card pt-2">
                <div class="d-flex justify-content-between">
                   <h2 class="card-title ps-3 text-primary "><a class="text-decoration-none" href="{{route('blogs.show',$blo->id)}}">{{ $blo->title}}</a></h2>
                   <div class="me-2">

                    @if (Auth::check())
                       @can('isAdmin')
                       <a class="btn btn-primary mb-2"
                       href="{{route('blogs.edit',$blo->id)}}"><i class="fas fa-edit"></i></a>

                       <a class="btn btn-danger mb-2"
                       href="{{route('blog.destroy',['id'=>$blo->id])}}"><i  class="fas fa-trash-alt"></i></a>

                       @endcan
                    @endif
                   </div>
                </div>
              <span class="text-black-50 ps-3"> <i class="fa-solid fa-user fa-lg"> </i><span class="text-danger ms-1">admin</span> {{ $blo->created_at->diffForhumans() }}</span>
                <div class="card-body">
                    @if ($blo->photo)
                    <img src="{{URL::asset($blo->photo)}}" class="img-thumbnail mb-3"alt="">
                    @endif

                    <p class="card-text public-project-paragraph" >
                       {{Str::limit($blo->content,10,'')}}
                       @if (strlen($blo->content >7))

                       <span id="more-{{$blo->id}}" style="display: none"> {{substr($blo->content,10)}}</span>
                       <span id="dots-{{$blo->id}}" style="color: rgb(35, 107, 202) ; cursor: pointer;" onclick="loadMore({{$blo->id}})">ReadMore...</span>


                       @endif
                         </p>
                         {{-- <button class="btn btn-primary btn-sm" id="myBtn" onclick="loadMore({{$blo->id}})">multi mai</button> --}}



                  </div>



                  <div  >
                      <ul class=" list-unstyled w-100 mb-0 mt-3" style="display: flex; flex-direction: row; justify-content: space-between; align-items: center;">
                         <li><a class="text-decoration-none" href="{{route('blogs.show',$blo->id)}}"><span class="ms-1"> comments {{$blo->comments->count()}}</span></a></li>
                        <li >
                              <span  class="d-block">
                                <i class="fa-solid fa-heart fa-2x rounded-pill" style="font-size:1.2em;color:blue " onclick="this.style='color:red'"></i>

                              </span>
                          </li>

                          <li >
                            <a  class="d-block border-0"
                            data-bs-toggle="collapse"
                            data-bs-target="{{ '#n'.$blo->id}}"
                            aria-controls="{{ 'n'.$blo->id}}"
                            aria-expanded="false"
                            aria-label="Toggle navigation"
                            >
                            <i class="fa-regular fa-comment-dots" style="font-size: 1.5em"></i>
                          </a>
                        </li>
                        <li >
                            <a href="#" class="d-block">
                                <i class="fa-solid fa-share-from-square me-2" style="font-size: 1.5em"></i>
                            </a>
                        </li>
                      </ul>

                      <div id="{{'n'.$blo->id}}" class="collapse">
                        <form action="{{route('comments.store')}}" method="post">
                            @csrf
                            <input type="hidden" name="blog_id" value="{{$blo->id}}">
                            <div class="form-group m-2">
                                <label for="exampleinputcomment"> comment :*</label>
                                <input type="text" class="form-control" name="description">

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
                  </div>



            </div>
    </div>
    @endforeach
</div>
    </div>






















