<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset ('css/admin.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <aside>
        <div class="nav">
            <div class="admin-profile">
                <div class="admin-image"></div>
                <p>Administrator</p>
            </div>
            <div class="nav-links">
                <a href=""><i class="fas fa-tachometer-alt"></i>Dashboard</a>
                <a href=""><i class="fa-solid fa-user-tie"></i>Teacher</a>
                <a href=""><i class="fa-solid fa-user"></i>Students</a>
                <a href=""><i class="fa-solid fa-bell"></i>Request</a>
                <a href=""><i class="fa-solid fa-envelope"></i>Inbox</a>
            </div>
        </div>
    </aside>
    <main>
        <div class="main-dashboard">
            <div class="dashboard-nav">
                <div class="overview">
                    <h3>Dashboard Overview</h3>
                    <p>Lorem ipsum dolor sit amet.</p>
                </div>
                <div class="search-bar-dashboard">
                    <input type="search" placeholder="Search..">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </div>
                <div class="drop-down" onclick="dropdown()">
                        <p>Admin</p>
                        <i class="fas fa-chevron-down"></i>
                    <div class="dropdown-logout">
                        <a href="/login">Logout</a>
                    </div>
                </div>
            </div>
            <div class="dashboard-overview">
                <div class="box-overview">
                    <div class="box"></div>
                    <div class="box"></div>
                    <div class="box"></div>
                </div>
                <div class="dashboard-activity">

                </div>
            </div>
        </div>
    </main>
</body>
<script>
    function dropdown(){
        document.querySelector('.dropdown-logout').classList.toggle("active");
    }
</script>
</html>
