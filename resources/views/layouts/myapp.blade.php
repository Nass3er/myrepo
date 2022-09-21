<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nasser</title>
    {{-- <link rel="stylesheet" href="../css/css.min.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css.map"> --}}

    <script src=" {{ asset('js/all.min.js') }}" defer> </script>
    <script src=" {{ asset('js/bootstrap.bundle.min.js') }}" defer> </script>
    <script src=" {{ asset('js/bootstrap.bundle.min.js.map') }}" defer> </script>
    <script src=" {{ asset('js/myFile.js') }}" defer> </script>

    {{-- <link rel="stylesheet" href="{{ asset('css/app.css') }}"> --}}

    {{-- FROM THE public folder --}}
    <link rel="stylesheet" href="{{ asset('css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css.map') }}">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
</head>

@php
    function activeMenu($uri = '') {
    $active = '';
    if (Request::is(Request::segment(1) . '/' . $uri . '/*') || Request::is(Request::segment(1) . '/' . $uri) || Request::is($uri)) {
        $active = 'active';
    }
    return $active;
}
@endphp
<body>
<nav class="navbar navbar-expand-lg sticky-top">
    <div class="container">
        <a href="#" class="navbar-brand fw-bold" style="color: white;"> <img class="img-fluid p-0 m-0" src="{{URL::asset('imgs/mylogo.png')}}" width="60px" height="30px" alt=""></a>
        <button
         class="navbar-toggler"
         data-bs-toggle="collapse"
         data-bs-target="#main"
         aria-controls="main"
         aria-expanded="false"
         aria-label="Toggle navigation"
        >
         <i class="fa-solid fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="main">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0 switcher">
                <li class="nav-item {{ activeMenu('myhome') }}">
                    <a  class="nav-link active" aria-current="page" href="{{ url('/myhome') }}">Home</a>
                </li>
                <li class="nav-item ">
                    <a href="#portofo" class="nav-link active" aria-current="page" >portofolio</a>
                </li>
                @if (Auth::check())
                  @can('isAdmin')
                  <li class="nav-item {{ activeMenu('users') }}">
                      <a   class="nav-link active" aria-current="page" href="{{route('users.index')}}">users</a>
                  </li>
                  @endcan
                @endif

                <li class="nav-item {{ activeMenu('blogs') }}">

                    <a  class="nav-link active" aria-current="page" href="{{route('blogs.index')}}"> blogs</a>

                </li>
                <li class="nav-item">
                    <a  class="nav-link active" aria-current="page" href="#exp">experience</a>
                </li>
                <li class="nav-item {{ activeMenu('books') }}">
                    <a  class="nav-link active" aria-current="page"
                    @if (Auth::check())
                    href="{{ route('books.index') }}"
                    @else
                    href="{{ route('login') }}"
                    @endif
                     >myLibrary</a>
                </li>
            </ul>

            {{-- <div class="search ps-3 pe-3 ">
                <i class="fa-solid fa-magnifying-glass "></i>
            </div> --}}
            <ul class="navbar-nav">
                <!-- Authentication Links -->
                @guest

                @if (Route::has('register'))
                    <li class="nav-item">
                        <a href="{{ route('register') }}" class="btn btn-primary rounded-pill main-btn pe-3 ">Register</a>
                    </li>
                @endif

                 @if (Route::has('login'))
                        <li class="nav-item">
                            <a href="{{ route('login') }}" class="btn btn-primary rounded-pill main-btn pe-3 ms-1">login</a>
                        </li>
                 @endif

                 @else

                 <li class="nav-item dropdown">
                     <a id="navbarDropdown" class="nav-link dropdown-toggle" style="color: #33d1cc;" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                         {{ Auth::user()->name }}
                     </a>

                     <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                         <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                          document.getElementById('logout-form').submit();">
                             {{ __('Logout') }}
                         </a>

                         <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                             @csrf
                         </form>
                     </div>
                 </li>
             @endguest
         </ul>



            {{-- <a href="{{ route('register') }}" class="btn btn-primary rounded-pill main-btn pe-3 ">Register</a>
            <a href="{{ route('login') }}" class="btn btn-primary rounded-pill main-btn pe-3 ms-1">login</a> --}}
        </div>


   </div>
    </div>

</nav>
{{-- navbar end --}}



    @yield('content')





</body>
</html>
