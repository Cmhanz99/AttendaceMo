@extends('layout.adminLayout')

@section('content')
<link rel="stylesheet" href="{{ asset('adminCss/profile.css') }}">
<div class="main-dashboard">
      <div class="dashboard-nav">
            <div class="overview">
                <h3>Dashboard Overview</h3>
                <p>Here's the quick summary of AttendanceMo.</p>
            </div>
            <div class="search-bar-dashboard">
                <input type="search" placeholder="Search..">
                <i class="fa-solid fa-magnifying-glass"></i>
            </div>
            <div class="drop-down" onclick="dropdown()">
                <p>{{ $client->first_name }}</p>
                <i class="fas fa-chevron-down"></i>
                <div class="dropdown-logout">
                    <a href="/login">Logout</a>
                </div>
            </div>
        </div>
    <div class="profile-container">
        <div class="profile-info">
            <div class="profile-image">
                <img style="background-image: url('{{asset('profilePic/profile1.jpg')}}')">
            </div>
            <div class="profile-details">
                <form action="">
                    <div class="form-group">
                        <div class="form-g">
                            <label for="name">First Name</label>
                            <input type="text" id="name" name="first_name" value="{{ $client->first_name }}">
                        </div>
                        <div class="form-g">
                            <label for="last_name">Last Name</label>
                            <input type="text" id="last_name" name="last_name" value="{{ $client->last_name }}">
                        </div>
                    </div>

                    <div class="form-class">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" value="{{$client->email}}">
                    </div>

                    <div class="form-class">
                        <button type="submit">Save Changes</button>
                    </div>

                </form>
            </div>
        </div>
        <div class="profile-stats">
            <div class="profile-account">
                <div class="profile-header">
                    <h3><i class="fa-solid fa-circle-info"></i></h3>
                    <p>Profile Information</p>
                </div>
                <div class="profile-body">
                    <p><i class="fa fa-user"></i>Full Name : {{$client->first_name}} {{$client->last_name}}</p>
                    <p><i class="fa fa-envelope"></i>Email : {{$client->email}}</p>
                    <p><i class="fa fa-phone"></i>Phone : {{$client->phone}}</p>
                    <p><i class="fa fa-calendar"></i>Created : {{$client->created_at->format('F j, Y')}}</p>
                </div>
            </div>
            <div class="profile-handles">
                <div id="clock"></div>
            </div>
        </div>
    </div>
</div>
<script>
    setInterval(function(){
        var now = new Date();

        // Get day name (Sunday, Monday, etc.)
        var days = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];
        var dayName = days[now.getDay()];

        // Get time (Hour : Minutes : Seconds)
        var hours = now.getHours();
        var minutes = now.getMinutes();
        var seconds = now.getSeconds();

        // AM or PM
        var ampm = hours >= 12 ? 'PM' : 'AM';
        hours = hours % 12;
        hours = hours ? hours : 12; // 0 becomes 12

        // Add zero if minutes/seconds are less than 10
        minutes = minutes < 10 ? '0'+minutes : minutes;
        seconds = seconds < 10 ? '0'+seconds : seconds;

        // Final format
        var timeString = dayName + " - " + hours + ":" + minutes + ":" + seconds + " " + ampm;

        // Show it on page
        document.getElementById("clock").innerHTML = timeString;

    }, 1000);
</script>

@endsection
