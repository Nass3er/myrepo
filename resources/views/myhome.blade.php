
<!-- end navbar -->
@extends('layouts.myapp')
@section('content')
<!-- start landing -->

<div class="landing overflow-hidden">
<div class="row  d-flex justify-content-between align-items-center">


    <div class="col-md-5 col-lg-5 circle1">

        <img class="img-fluid bottom-0 mb-0 pb-0" src="{{URL::asset('imgs/myphoto3.png')}}" alt="">
    </div>
    <div class="col-md-5 col-lg-5 text-center text-light mt-5">
        <h1 class="fw-bold b-5">I enjoy solving problems</h1>
        <p class="text-white-50 mb-4  ">I am afull-stack developer,entrepreneur. I am a big fan of PHP ,Laravel ,javascript, jQuery and bootstrap</p>
        <a href="mailto:n716527766@gmail.com" class="btn rounded-pill main-btn pl-3">contact me</a>
    </div>
</div>
</div>
<!-- end landing -->

<!-- start features -->
<div class="features text-center pt-5 pb-5" id="exp">
    <div class="container">
        <div class="main-title mt-5 mb-5 position-relative">
            <img class="" src="../imgs/title.jpg" alt="" width="110px">
            <h2 class="fw-bold">I Am Good At</h2>
            <P class="text-black-50 text-uppercase" >some of these stuff Under</P>
        </div>
        <div class="row">

            <div class="col-md-6 col-lg-4">
                <div class="feat">
                    <div class="icon-holder position-relative">
                        <i class="fa-solid fa-1 position-absolute bottom-0 number "></i>
                        <i class="fa-solid fa-tv fa-4x position-absolute bottom-0 icon"></i>
                    </div>
                    <h4 class="mb-3 mt-3 text-uppercase">web design</h4>
                    <p class="text-black-50"> i am web front end devloper by html, css ,javascript and bootstrap</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="feat">
                    <div class="icon-holder position-relative">
                        <i class="fa-solid fa-2 position-absolute bottom-0 number "></i>
                        <i class="fa-solid fa-plug fa-4x position-absolute bottom-0 icon"></i>
                    </div>
                    <h4 class="mb-3 mt-3 text-uppercase">back end devloper</h4>
                    <p class="text-black-50">i am a middle back end devloper by php , laravel ,sql and mysql </p>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="feat">
                    <div class="icon-holder position-relative">
                        <i class="fa-solid fa-3 position-absolute bottom-0 number "></i>
                        <i class="fa-solid fa-pencil fa-4x position-absolute bottom-0 icon"></i>
                    </div>
                    <h4 class="mb-3 mt-3 text-uppercase">desktope application</h4>
                    <p class="text-black-50"> i am a devloper of desktope application by c# languge and java </p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end features -->

<!-- start my recent project -->




<div class="my-work pt-5 pb-5" id="portofo">
    <div class="container bg-white ">
                <div class="main-title mt-5 mb-5 position-relative text-center">
                        <img class="" src="{{URL::asset('imgs/nlogo.jpg')}}" alt="" width="110px">
                        <h2 class="fw-bold"> My Recent Project</h2>
                        <P class="text-black-50 text-uppercase"  >Prepare to be amazed</P>

                </div>


                <div class="row">
                 @foreach ($allprojects as $project)


                    <div class="col-sm-6 col-md-4 col-lg-3 ">
                        <div class="box mb-3 bg-dark" data-work="{{$project->projName}}">

                            <div style="width:auto;height:200px;">
                                <img class="img-fluid  p-1" style="" src="{{URL::asset($project->projMainPhoto)}}" alt="">

                            </div>
                         <h1 class="text-center p-2 mt-2" style="color: white;"> {{$project->projName}}</h1>
                          <div class="text pb-3 text-center" >
                            {{-- <i class="fa-solid fa-heart"></i> --}}
                            {{-- <i class="fa-solid fa-circle-user"></i> --}}
                            {{-- <i class="fa-solid fa-plus"></i> --}}
                            {{-- <i class="fa-solid fa-share-from-square"></i> --}}
                            {{-- <i class="fa-solid fa-comment-pen"></i> --}}
                            {{-- <i class="fa-solid fa-square-right"></i> --}}
                            {{-- <i class="fa-regular fa-heart"></i> --}}
                            {{-- <i class="fa-solid fa-folder-open"></i> --}}

                          </div>
                       <div class="text-center mb-2" >
                           @if (Auth::check())
                             (@can('isAdmin')
                              <span>
                                <a href="{{route('project.destroy',['id'=> $project->id])}}">
                                  <i class="fas fa-trash-alt text-danger fa-2x " ></i></a>

                                <a href="{{route('projects.edit', $project->id)}}">
                                  <i class="fas fa-edit text-primary fa-2x " ></i></a>

                             </span>
                              @endcan
                           @endif
                            <span class="direct " style="border: 1px solid white;border-radius:25px;padding:15px;box-shadow: inset 0px 0px 4px 3px white;
                              cursor:pointer; ">
                                 <a href="{{route('projects.show',$project->id)}}">
                                     <i class="fa-duotone fa-greater-than text-white fa-2x mb-0 gr"  ></i></a>
                           </span>


                        </div>

                        </div>
                      </div>

                    @endforeach
                    <div class="d-flex justify-content-center mt-5">
                        <a href="{{route('projects.index')}}" class="btn rounded-pill main-btn pt-3 text-uppercase">i want more</a>
                    </div>
        </div>
</div>
</div>

<!-- end my recent project -->

<!-- start plogs -->
<div class="blog pt-5 pb-5">
    <div class="container">

    <div class="main-title mt-5 mb-5 position-relative text-center" >
        <img class="" src="{{URL::asset('imgs/nlogo.jpg')}}" alt="" width="120px">
        <h2 class="fw-bold"> Read My Blogs</h2>
        <P class="text-black-50 text-uppercase"  >new blogs</P>

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
                                <i class="fa-solid fa-heart fa-2x rounded-pill" style="font-size:1.2em;color:blue "
                                       @if (Auth::check())
                                       onclick="this.style='color:red'"
                                       @endif

                                ></i>

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

<!-- end plogs -->

<!-- subscrip start -->
<div class="subscribe pt-5 pb-5 text-center text-md-start">
    <div class="container">
        <form action="{{route('subscrips.store')}}" method="POST" class="row align-items-center">
            @csrf
          <div class="col-md-6 col-lg-3">
              <div class="fw-bold fs-5 mb-3"> subscrib to my newsletter</div>
          </div>
          <div class="col-md-6 col-lg-7 mb-5">
              <input class="w-100 text-light p-2 bg-transparent" name="sub_user_email" type="text" placeholder="enter your email address">
          </div>
          <div class="col-md-6 col-lg-2">
            <input class="btn rounded-pill" type="submit" value="Subscribe">
        </div>
        </form>

    </div>
</div>
<!-- subscrip end -->

 <!-- footer start -->
 <div class="footer pt-5 pb-5 text-white-50 text-center text-md-start">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-lg-4">
                 <div class="info mb-5">
                    <img src="{{URL::asset('imgs/mylogo.png')}}" width="100" alt="" class="img-fluid mb-4">
                    <p class="mb-5">
                        I am afull-stack developer,entrepreneur. I am a big fan of PHP ,Laravel ,javascript, jQuery and bootstrap </p>
                    <div class="copyright">
                        Created by <span>Nasser Al-abbasi</span>
                        <div> &copy;2022 <span>self website</span></div>
                    </div>
                 </div>
            </div>
            <div class="col-md-6 col-lg-2">
                <div class="links">
                    <h5 class="text-light">links</h5>
                    <ul class="list-unstyled lh-lg">
                        <li>Home </li>
                        <li>serviece</li>
                        <li>Experience</li>
                        <li>portifolio</li>
                        <li>blogs</li>

                    </ul>
                </div>
            </div>
            <div class="col-md-6 col-lg-2">
                <div class="links">
                    <h5 class="text-light">About me</h5>
                    <ul class="list-unstyled lh-lg">
                        <li>sign in </li>
                        <li>register</li>
                        <li>about me </li>
                        <li>contact me</li>

                    </ul>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="contact">
                    <h5 class="text-white">contact me</h5>
                    <p class="lh-lg  mb-5">Get in touch with me via phone .i am waiting for your call or message</p>
                    <a href="mailto:n716527766@gmail.com" class="btn rounded-pill main-btn w-100">Nasser@gmail.com</a>
                    <ul class="d-flex mt-5 list-unstyled gap-3">
                        <li>
                            <a href="3" class="d-block text-light">
                                <i class="fa-brands fa-facebook fa-lg facebook rounded-circle p-2"></i>
                            </a>
                        </li>
                        <li>
                            <a href="3" class="d-block text-light">
                                <i class="fa-brands fa-twitter fa-lg twitter rounded-circle p-2"></i>
                            </a>
                        </li>
                        <li>
                            <a href="3" class="d-block text-light">
                                <i class="fa-brands fa-linkedin fa-lg linkedin rounded-circle p-2"></i>
                            </a>
                        </li>

                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>




@endsection
