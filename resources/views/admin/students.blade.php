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
        <h3>Students</h3>
        <div class="add-teacher">
            <a href="/admin/add-teacher">Add Students</a>
        </div>
    </div>
    <div class="teacher-lists">
        <table>
            <thead>
                <tr>
                    <th>Student ID</th>
                    <th>Name</th>
                    <th>Course</th>
                    <th>Email</th>
                    <th>Teacher</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                @foreach ($students as $student)
                    <td>2020{{$student->id}}</td>
                    <td>{{$student->name}}</td>
                    <td>{{$student->course->course_name}}</td>
                    <td>{{$student->email}}</td>
                    <td>{{$student->teacher->name}}</td>
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
