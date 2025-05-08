@extends('layout.adminLayout')

@section('content')
<link rel="stylesheet" href="{{asset ('adminCss/teacher.css')}}">

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
            <p>{{$client->first_name}}</p>
            <i class="fas fa-chevron-down"></i>
        <div class="dropdown-logout">
            <a href="/login">Logout</a>
        </div>
    </div>
</div>
<div class="teachers-section">
    <div class="teacher-list-header">
        <h3>Courses</h3>
        <div class="add-teacher">
            <a href="/admin/add-teacher">Add Course</a>
        </div>
    </div>
    <div class="teacher-lists">
        <table>
            <thead>
                <tr>
                    <th>Course Name</th>
                    <th>Duration</th>
                    <th>Total Students</th>
                    <th>Total Teachers</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    @foreach ($course as $courses)
                    <td>{{$courses->course_name}}</td>
                    <td>{{$courses->duration}} years</td>
                    <td>{{$courses->total_student}}</td>
                    <td>{{$courses->total_teacher}}</td>
                    <td>{{ucwords($courses->status)}}</td>
                    <td>
                        <div class="actions">
                            <a href="/edit/" class="edit-btn">Edit</a>
                            <a href="/removed/" class="remove-btn">Remove</a>
                        </div>
                    </td>
                    @endforeach
                </tr>
            </tbody>
        </table>
    </div>
</div>
</div>
@endsection
