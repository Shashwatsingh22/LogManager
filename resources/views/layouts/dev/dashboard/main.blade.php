<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>@yield("title")</title>

  {{-- Font Awesome Icons --}}
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

  {{-- Our css --}}
  <link rel="stylesheet" href="{{asset("css/devDashboard.css")}}">





</head>
<body>

    <div class="dev-main">
      {{-- Navbar --}}
      <div class="dev-nav">

        {{-- Logo --}}
        <div class="logoContainer">
          <div class="mylogo"></div>
          <div class="logs">
            <p>Log</p>
            <small>Manage your logs</small>    
          </div>
        </div>


        {{-- Search  Here--}}
        <div class="searchBar">
          <i class="fa fa-search"></i>
          <input type="text" placeholder="Search Here">
        </div>




        <div class="userDetails">
          <a href={{ route('logout') }} class="link create" style="background-color:rgba(255, 0, 0, 0.616);">Logout</a>
          <i class="material-icons">settings</i>
          <i class="material-icons">notifications</i>
          <i class="material-icons vert">more_vert</i>
          <div class="user">
            <img src="https://picsum.photos/200"/>
          </div>

        </div>



      </div>





      {{-- Main Content Area --}}
      <div class="dev-content">


        <div class="content-top">


          <div class="content-left">

            <div class="content-item">
            
              <img src="{{asset("/images/extras/manage2.webp")}}">
              <div class="desc">
                <h3><strong>One Space To Rule Them All</strong></h3>
                <p>We bring all your tools together and let you use them with your love</p>
              </div>
            
            </div>

          </div>




          <div class="content-right">
            <h3>Overall Progress</h3>
            <div class="tasks">

              <div class="taskItem completed">
                <h3>100</h3>
                <p>Tasks Completed</p>
              </div>  
              <div class="taskItem pending">
                <h3>12</h3>
                <p>Tasks Pending</p>
              </div>  
              <div class="taskItem schedule">
                <h3>14</h3>
                <p>Tasks Schedule</p>
              </div>  

              <div class="taskItem today">
                <h3>2</h3>
                <p>Today Tasks</p>
              </div>  

            </div>
          </div>


        </div>


        <div class="content-content">
          
          @yield('content')
        </div>

      </div>


    </div>





    {{-- Our JS --}}
    <script src="{{asset("js/dev.js")}}"></script>

</body>
</html>





























