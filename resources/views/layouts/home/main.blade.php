<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="/css/index.css">
</head>

<body>
    <nav id="navbar">
        <ul>
            <li>
                <a href="#">Home</a>
            </li>
            <li>
                <a href="#">Doc</a>
            </li>
            <li>
                <a href="#">faq</a>
            </li>
            <li>
                <a href="#">contact</a>
            </li>
        </ul>
    </nav>


    @yield('content');


    <footer>
            <h6> contact us</h6>
           
            
            <a href="#" class="fa fa-twitter"></a>
            <a href="#" class="fa fa-google"></a>
            <a href="#" class="fa fa-linkedin"></a>
            <a href="#" class="fa fa-youtube"></a>
            <center> <h4> Privacy | Site Terms | Cookie Preferences | © 2022, LogManager, Inc. or its affiliates. All rights reserved.</h4></center>
          
          </footer>

    <!-- particles js files -->

    <script src="/js/particles.js"></script>
    <script src="/js/welcome.js"></script>

</body>

</html>