<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset ('css/landing.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <header>
        <div class="nav-bar">
            <h2 class="logo">AttendanceMO</h2>
            <div class="nav-links">
                <a href="#home" class="links">Home</a>
                <a href="#about" class="links">About</a>
                <a href="#contact" class="links">Contact</a>
                <a href="/login" class="btn-primary">Login</a>
            </div>
            <div class="hamburger">
                <i class="fa-solid fa-bars toggle-btn"></i>
                <div class="dark">
                    <i class="fa-solid fa-moon darkmode" onclick="darkMode()"></i>
                </div>
            </div>
        </div>
    </header>
    @yield('section')
</body>
<script src="{{asset ('js/main.js')}}"></script>
</html>
