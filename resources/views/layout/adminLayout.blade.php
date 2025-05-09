<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset ('adminCss/adminNav.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <aside>
        <div class="nav">
            <div class="admin-profile">
                <div class="admin-image" style="background-image: url('{{asset('profilePic/profile1.jpg')}}')"></div>
                <p>{{$client->first_name}}</p>
            </div>
            <div class="nav-links">
                <a href="/admin" class="{{Request::is('admin') ? 'active' : ''}}"><i class="fas fa-tachometer-alt"></i>Dashboard</a>
                <a href="/profile" class="{{Request::is('profile') ? 'active' : ''}}"><i class="fa-solid fa-address-card"></i>Profile</a>
                <a href="/course" class="{{Request::is('course') ? 'active' : ''}}"><i class="fa-solid fa-school"></i>Course</a>
                <a href="/teachers" class="{{Request::is('teachers') ? 'active' : ''}}"><i class="fa-solid fa-user-tie"></i>Teacher</a>
                <a href="/students" class="{{Request::is('students') ? 'active' : ''}}"><i class="fa-solid fa-user"></i>Students</a>
                <a href="/request" class="{{Request::is('request') ? 'active' : ''}}"><i class="fa-solid fa-bell"></i>Request</a>
                <a href="/inbox" class="{{Request::is('inbox') ? 'active' : ''}}"><i class="fa-solid fa-envelope"></i>Inbox</a>
            </div>
        </div>
    </aside>
    
    @yield('content')
</body>
</html>
