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
        <h3>Teachers</h3>
        <div class="add-teacher">
            <a href="/admin/add-teacher">Add Teacher</a>
        </div>
    </div>
    <div class="teacher-lists">
        <table>
            <thead>
                <tr>
                    <th>Teacher ID</th>
                    <th>Name</th>
                    <th>Department</th>
                    <th>Email</th>
                    <th>Total Students</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                @foreach ($teachers as $teacher)
                    <td>1010{{$teacher->id}}</td>
                    <td>{{$teacher->name}}</td>
                    <td>{{$teacher->course->course_name}}</td>
                    <td>{{$teacher->email}}</td>
                    <td>{{$teacher->total_student}}</td>
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
