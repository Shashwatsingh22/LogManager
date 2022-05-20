<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>@yield('title')</title>

  {{-- For Toast --}}
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

  
  {{-- Code Mirror For Code Editor Displaying --}}
  <script language="javascript" type="text/javascript"  src="https://codemirror.net/lib/codemirror.js"></script>
  <script language="javascript" type="text/javascript"  src="https://codemirror.net/mode/perl/perl.js"></script>
  <link rel="stylesheet" type="text/css" href="https://codemirror.net/lib/codemirror.css"></link>
  <link rel="stylesheet" type="text/css" href="https://codemirror.net/theme/lucario.css"></link>
  


  {{-- Favicon --}}
  <link rel="shortcut icon" href="{{asset("images/extras/log.png")}}" type="image/x-icon">
    
  {{-- Gsap3 Animation --}}
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.10.3/gsap.min.js"></script>
    
  {{-- Our CSS --}}
  <link rel="stylesheet" href="{{asset("css/dashboard.css")}}">

  {{-- Font Awesome Icons --}}
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

  {{-- Swiper JS --}}
  <link
    rel="stylesheet"
    href="https://unpkg.com/swiper@8/swiper-bundle.min.css"
    />
  <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>

  
</head>
<body>

  {{-- Dashboard Container --}}
  <div class="admin-container">
    {{-- Left Nav --}}
    <div class="left-nav">
      <div class="logoContainer">
        <div class="mylogo"></div>
        <p>Log</p>
        <small>Manage your logs</small>  
      </div>


      <div class="linksNav">
        <a href="{{ route('admin.dashboard') }}">
          <i class="fa fa-home"></i>
        </a>
       
        <a href="{{ route('admin.server.name') }}">
        <i class="fa solid fa-gears"></i>
        </a>
       
        <a href="{{ route('admin.plugin.input.ip') }}">
          <i class="fa fa-pencil"></i>
        </a>

        <a href="">
          <i class="fa fa-terminal"></i>
        </a>

        <a href="">
          <i class="material-icons">	account_circle</i>
        </a>

        <a href="">
          <i class="fa fa-server"></i>
        </a>
        <a href="">
          <i class="material-icons">add</i>
        </a>

       
      </div>
    </div>



    {{-- Content Box --}}
    <div class="content-box" >


      <div class="statusBar">
        <div class="chartArea">
          <canvas id="myChart" ></canvas>
        </div>
        <div class="userArea">
          <p class="demo">Welcome,<span id="user">@yield('name')</span></p>
          <div class="userItem">
            <span class="yel"><small>Email</small></span>
            <span><small>@yield('email')</small></span>
          </div>

          <div class="userItem">
            <span class="yel"><small>Team Key</small></span>
            <span><small>@yield('teamkey')</small></span>
          </div>

          <div class="userItem">
            <span class="yel"><small>Description</small></span>
            <span><small>@yield('disc')</small></span>
          </div>

          <div class="logBtns">
            <a href={{ route('logout') }}>Logout</a>
          </div>
   

        </div>
      </div>

      
      @yield('content')

      

    <div>

  </div>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

  <script src="{{asset("js/myCharts.js")}}"></script>
  <script src="{{asset("js/myModals.js")}}"></script>

</body>
</html>








