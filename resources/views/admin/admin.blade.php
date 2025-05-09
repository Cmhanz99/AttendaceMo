@extends('layout.adminLayout')

@section('content')
<link rel="stylesheet" href="{{ asset('adminCss/dashboard.css') }}">

@php
    $present = (App\Models\Students::where('status', 'present')->count() / App\Models\Students::count()) * 100;
    $absent = (App\Models\Students::where('status', 'absent')->count() / App\Models\Students::count()) * 100;

    $total = App\Models\Students::count() + App\Models\Teachers::count();
    $student = (App\Models\Students::count() / $total) * 100;
    $teacher = (App\Models\Teachers::count() / $total) * 100;
@endphp

<main>
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
        <div class="dashboard-overview">
            <div class="box-overview">
                <div class="box">
                    <canvas id="chart1"></canvas>
                    <div class="stats">
                        <p class="stats-title">
                            Present
                        </p>
                        <p>{{number_format($present,2)}}%</p>
                    </div>
                </div>
                <div class="box">
                    <canvas id="chart2"></canvas>
                    <div class="stats">
                        <p class="stats-title">
                            Absent
                        </p>
                        <p>{{number_format($absent,2)}}%</p>
                    </div>
                </div>
                <div class="box">
                    <canvas id="chart3"></canvas>
                    <div class="stat">
                        <p class="stats-titles stat1">
                            Students
                        </p>
                        <p>{{number_format($student,2)}}%</p>
                        <p class="stats-titles stat2">
                            Teachers
                        </p>
                        <p>{{number_format($teacher, 2)}}%</p>
                    </div>
                </div>
            </div>
            <div class="dashboard-activity">
                <div class="dash-review">
                    <canvas id="lineChart"></canvas>
                </div>
                <div class="dash-notification">
                    <div class="notification-header">
                        <div class="notification-title">
                            <h2><i class="fa-solid fa-bell"></i></h2>
                            <h3>Notification</h3>
                        </div>
                        <i class="fa-solid fa-ellipsis"></i>
                    </div>
                    <div class="notification-body">
                        <div class="notification">
                            <div class="notification-icon">
                                <i class="fa-solid fa-user"></i>
                            </div>
                            <div class="notification-text">
                                <p>New student registered</p>
                                <p>2 minutes ago</p>
                            </div>
                        </div>
                        <div class="notification">
                            <div class="notification-icon">
                                <i class="fa-solid fa-user"></i>
                            </div>
                            <div class="notification-text">
                                <p>New student registered</p>
                                <p>2 minutes ago</p>
                            </div>
                        </div>
                        <div class="notification">
                            <div class="notification-icon">
                                <i class="fa-solid fa-user"></i>
                            </div>
                            <div class="notification-text">
                                <p>New student registered</p>
                                <p>2 minutes ago</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<script>
    function dropdown() {
        document.querySelector('.dropdown-logout').classList.toggle("active");
    }

    const present = {{ $present }};
    const absent = {{ $absent }};

    const student = {{ $student }};
    const teacher = {{ $teacher }};

    const ctx1 = document.getElementById('chart1').getContext('2d');
    const ctx2 = document.getElementById('chart2').getContext('2d');
    const ctx3 = document.getElementById('chart3').getContext('2d');
    const chart1 = new Chart(ctx1, {
        type: 'doughnut',
        data: {
            datasets: [{
                data: [present, 100 - present], // 70% filled, 30% empty
                backgroundColor: ['#00b894', '#dfe6e9'], // green and gray
                borderWidth: 0
            }]
        },
        options: {
            cutout: '80%', // makes it look like a thin ring
            responsive: false,
            plugins: {
                legend: {
                    display: false
                }
            }
        }
    });

    const chart2 = new Chart(ctx2, {
        type: 'doughnut',
        data: {
            datasets: [{
                data: [absent, 100 - absent], // 70% filled, 30% empty
                backgroundColor: ['red', '#dfe6e9'], // green and gray
                borderWidth: 0
            }]
        },
        options: {
            cutout: '80%', // makes it look like a thin ring
            responsive: false,
            plugins: {
                legend: {
                    display: false
                }
            }
        }
    });

    const chart3 = new Chart(ctx3, {
        type: 'pie',
        data: {
            datasets: [{
                data: [teacher, student],
                backgroundColor: ['white', 'aqua'],
                borderWidth: 0
            }]
        },
        options: {
            responsive: false
        }
    });

    var ctx4 = document.getElementById('lineChart').getContext('2d');

    var myBarChart = new Chart(ctx4, {
        type: 'line', // This is the chart type!
        data: {
            labels: ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'],
            datasets: [{
                label: 'Attendance',
                data: [12, 19, 3, 5, 2],
                backgroundColor: 'skyblue', // color of the bars
                borderColor: 'white', // border color of the bars
                borderWidth: 1 // how thick the border is
            }]
        },
        options: {
            scales: {
                y: {
                    ticks: {
                        color: 'white'
                    }
                },
                x: {
                    ticks: {
                        color: 'white'
                    }
                }
            },
            plugins: {
                legend: {
                    labels: {
                        color: 'white'
                    }
                }
            }
        }
    });
</script>
@endsection
