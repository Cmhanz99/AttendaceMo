@extends('layout.adminLayout')

@section('content')
<link rel="stylesheet" href="{{asset ('adminCss/teacher.css')}}">
<link rel="stylesheet" href="{{asset ('adminCss/modalForm.css')}}">
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<style>
    .form-footer {
        border-top: 1px solid #ccc;
        padding-top: 10px;
        bottom: -10px
    }
</style>

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
            <a class="addTeacher">Add Teacher</a>
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
                @foreach ($teachers as $teacher)
                <tr>

                    <td>1010{{$teacher->id}}</td>
                    <td>{{$teacher->first_name}} {{$teacher->last_name}}</td>
                    <td>{{$teacher->course->course_name}}</td>
                    <td>{{$teacher->email}}</td>
                    <td>{{ App\Models\Students::where('teacher_id', $teacher->id)->count() }}</td>
                    <td>
                        <div class="actions">
                            <a href="#"
                            class="edit-btn"
                            data-id="{{$teacher->id}}"
                            data-first_name="{{$teacher->first_name}}"
                            data-last_name="{{$teacher->last_name}}"
                            data-course="{{$teacher->course_id}}"
                            data-email="{{$teacher->email}}"
                            data-password="{{$teacher->password}}"
                            >Edit</a>
                            <a onclick="confirmedDelete({{$teacher->id}})" class="remove-btn">Remove</a>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
</div>

<div class="add-course-modal">
    <h3>Add Teacher</h3>
    <form action="{{route ('teacher.name')}}" method="POST">
        @csrf
        <div class="form-group">
            <div class="form-col">
                <label for="">First Name</label>
                <input type="text" name="first_name" autocomplete="off" placeholder="First Name" name="course_name" required>
            </div>
            <div class="form-col">
                <label for="">Last Name</label>
                <input type="text" name="last_name" autocomplete="off" placeholder="Last Name" name="course_name" required>
            </div>
        </div>
        <div class="form-class">
            <label for="">Email</label>
            <input type="email" name="email" autocomplete="off" placeholder="e.g teacher@test.com" required>
        </div>
        <div class="form-class">
            <label for="">Password</label>
            <input type="password" name="password" autocomplete="off" placeholder="Password" required>
        </div>
        <div class="form-class">
            <select name="department">
                <option selected>Department</option>
                @foreach ($courses as $course)
                    <option value="{{$course->id}}">{{$course->course_name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-footer">
            <button type="submit" class="add-course">Add Teachers</button>
            <button type="button" class="cancel-btn">Cancel</button>
        </div>
    </form>
</div>

<div class="edit-course-modal">
    <h3>Edit Teacher</h3>
    <form id="editTeacherForm" method="POST">
        @csrf
        @method('PUT')
        <input name="id" id="editCourseId" hidden>
        <div class="form-group">
            <div class="form-col">
                <label for="">First Name</label>
                <input type="text" name="first_name" autocomplete="off"
                 placeholder="First Name" required id="edit-teacher-fname">
            </div>
            <div class="form-col">
                <label for="">Last Name</label>
                <input type="text" name="last_name" autocomplete="off"
                placeholder="Last Name" required id="edit-teacher-lname">
            </div>
        </div>
        <div class="form-class">
            <label for="">Email</label>
            <input type="email" name="email" autocomplete="off"
            placeholder="e.g teacher@test.com" required id="edit-teacher-email">
        </div>
        <div class="form-class">
            <label for="">Password</label>
            <input type="password" name="password" autocomplete="off"
            placeholder="Password" required id="edit-teacher-password">
        </div>
        <div class="form-class">
            <select name="department" id="edit-teacher-department">
                @foreach ($courses as $course)
                    <option value="{{$course->id}}">{{$course->course_name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-footer">
            <button type="submit" class="add-course">Update Teacher</button>
            <button type="button" class="cancel-edit">Cancel</button>
        </div>
    </form>
</div>

@if (session('success'))
    <script>
        swal({
            title: "Success!",
            text: "{{ session('success') }}",
            icon: "success",
            button: "OK",
        });
    </script>
@endif

<script>
    const editButtons = document.querySelectorAll('.edit-btn');
    const editCourseModal = document.querySelector('.edit-course-modal');
    const cancelEdit = document.querySelector('.cancel-edit');

    editButtons.forEach(button => {
        button.addEventListener('click', () => {
            const id = button.getAttribute('data-id');
            const firstName = button.getAttribute('data-first_name');
            const lastName = button.getAttribute('data-last_name');
            const email = button.getAttribute('data-email');
            const password = button.getAttribute('data-password');
            const course = button.getAttribute('data-course');

            document.getElementById('editCourseId').value = id;
            document.getElementById('edit-teacher-fname').value = firstName;
            document.getElementById('edit-teacher-lname').value = lastName;
            document.getElementById('edit-teacher-email').value = email;
            document.getElementById('edit-teacher-password').value = password;
            document.getElementById('edit-teacher-department').value = course;

            document.getElementById('editTeacherForm').action = "/teacher/update/" + id;
            editCourseModal.classList.add('show');
        });
    });

    cancelEdit.addEventListener('click', () => {
        editCourseModal.classList.remove('show');
    });


    const addCourse = document.querySelector('.addTeacher')
    const cancel = document.querySelector('.cancel-btn');
    const addCourseModal = document.querySelector('.add-course-modal');

    addCourse.addEventListener('click', () => {
        addCourseModal.classList.add('show');
    });

    cancel.addEventListener('click', () => {
        addCourseModal.classList.remove('show');
    });

    function confirmedDelete(teacherId) {
    swal({
        title: "Are you sure?",
        text: "Once deleted, you will not be able to recover this course!",
        icon: "warning",
        buttons: {
            confirm: {
                text: "Yes, delete it!",
                value: true,
                visible: true,
                className: "swal-button--confirm",
            },
            cancel: {
                text: "Cancel",
                value: false,
                visible: true,
                className: "swal-button--cancel",
            }
        },
        dangerMode: true,
    }).then(function(willDelete) {
        if (willDelete) {
            window.location.href = "/teachers/delete/" + teacherId;
        } else {
            swal("Cancelled!");
        }
    });
    }
</script>

@endsection
