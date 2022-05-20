<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{asset("css/loginSignUp.css")}}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.10.3/gsap.min.js"></script>

    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"> --}}
</head>
<body>
    <div class="log-sign-container">
        <div class="loginBox">

            {{-- Left Log --}}
            <div class="leftLog">

                <div class="formBar">
                    {{-- Logo --}}
                    <div class="logo">
                        <p>Log</p>
                        <small>Manage Your Logs</small>
                    </div>
        
                    {{-- Dynamic Content --}}
                    @yield('content')

                </div>
            
            </div>
            {{-- Left Log Ends --}}

            {{-- Right Log --}}
            <div class="rightLog" style="background-image:url({{asset("images/extras/1.jpg")}})"></div>
            </div>
            {{-- Right Log Ends --}}

        </div>
    </div>

    <script src="{{asset("js/loginsignup.js")}}"></script>
</body>
</html>