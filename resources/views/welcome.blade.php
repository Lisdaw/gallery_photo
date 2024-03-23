<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Galeri Foto</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.min.css') }}">

        <!-- Styles -->
        <script src="https://kit.fontawesome.com/a076d05399.js"></script>
        <style>
            @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap");
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
}
::selection {
  color: #000;
  background: #fff;
}
nav {
  position: fixed;
  background: #1b1b1b;
  width: 100%;
  padding: 10px 0;
  z-index: 12;
}
nav .menu {
  max-width: 1250px;
  margin: auto;
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 0 20px;
}
.menu .logo a {
  text-decoration: none;
  color: #fff;
  font-size: 20px;
  font-weight: 600;
}
.menu ul {
  display: inline-flex;
}
.menu ul li {
  list-style: none;
  margin-left: 7px;
}
.menu ul li:first-child {
  margin-left: 0px;
}
.menu ul li a {
  text-decoration: none;
  color: #fff;
  font-size: 18px;
  font-weight: 500;
  padding: 8px 15px;
  border-radius: 5px;
  transition: all 0.3s ease;
}
.menu ul li a:hover {
  background: #fff;
  color: black;
}
.img {
  background: url("img.jpg") no-repeat;
  width: 100%;
  height: 100vh;
  background-size: cover;
  background-position: center;
  position: relative;
}
.img::before {
  content: "";
  position: absolute;
  height: 100%;
  width: 100%;
  background: rgba(0, 0, 0, 0.4);
}
.center {
  position: absolute;
  top: 52%;
  left: 50%;
  transform: translate(-50%, -50%);
  width: 100%;
  padding: 0 20px;
  text-align: center;
}
.center .title {
  color: #fff;
  font-size: 55px;
  font-weight: 600;
}
.center .sub_title {
  color: #fff;
  font-size: 52px;
  font-weight: 600;
}
.center .btns {
  margin-top: 20px;
}
.center .btns button {
  height: 55px;
  width: 170px;
  border-radius: 5px;
  border: none;
  margin: 0 10px;
  border: 2px solid white;
  font-size: 20px;
  font-weight: 500;
  padding: 0 10px;
  cursor: pointer;
  outline: none;
  transition: all 0.3s ease;
}
.center .btns button:first-child {
  color: #fff;
  background: none;
}
.btns button:first-child:hover {
  background: white;
  color: black;
}
.center .btns button:last-child {
  background: white;
  color: black;
}

        </style>

        {{--  <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>  --}}
    </head>
    <body class="antialiased">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm" >
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <h5 class="Galeri" style="color:#5603ad">Galeri Foto</h5>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent" style="color:#5603ad">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav  " style="margin-left:40em;">
                        <li style="nav-item "> <a href="{{ url('/') }}" class="btn btn dark"style="color:#5603ad" >Beranda</a></li>
                        <li class="nav-item px-3"><a href="{{ url('/home') }}" class="btn btn dark"style="color:#5603ad" >Foto</a></li>
                        <li class="nav-item "><a href="{{ url('/album') }}" class="btn btn dark"style="color:#5603ad" >Album</a></li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item" >
                                    <button type="button" class="btn btn-light">   <a class="nav-link" style="color:#5603ad" href="{{ route('login') }}">{{ __('Login') }}</a> </button>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <button type="button" class="btn btn-light ms-3">  <a class="nav-link" style="color:#5603ad" href="{{ route('register') }}">{{ __('Register') }}</a> </button>
                                </li>
                            @endif
                        @else

                            <li class="nav-item dropdown" >
                                <a id="navbarDropdown" class="nav-link dropdown-toggle"style="color:#5603ad" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
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
                </div>
            </div>
        </nav>
            {{--  <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
                            <div class="judul">
                                <h1>Welcome </h1>
                                <h3>Galery Photo </h3>
                            </div>
             </div>
               --}}
               <div class="bg" style="background-color:#5603ad">
               <div class="img"></div>
               <div class="center">
                 <div class="title">Image For You </div>
                 <div class="sub_title">Let You Get It</div>
                 <div class="btns">
                  <a href="{{ url('/home') }}" class="" > <button>Start</button> </a>
                   
                </div>
            </div>
        </div>

    </body>
</html>
