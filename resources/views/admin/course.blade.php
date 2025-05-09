@extends('layout.adminLayout')

@section('content')
<link rel="stylesheet" href="{{asset ('adminCss/teacher.css')}}">
<link rel="stylesheet" href="{{asset ('adminCss/modalForm.css')}}">
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


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
            <a class="addCourse">Add Course</a>
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
                @foreach ($course as $courses)
                <tr>
                    <td>BS {{$courses->course_name}}</td>
                    <td>{{$courses->duration}} Years</td>
                    <td>{{ App\Models\Students::where('course_id', $courses->id)->count() }}</td>
                    <td>{{ App\Models\Teachers::where('course_id', $courses->id)->count() }}</td>
                    <td>{{ucwords($courses->status)}}</td>
                    <td>
                        <div class="actions">
                            <a href="#"
                               data-id="{{$courses->id}}"
                               data-name="{{$courses->course_name}}"
                               data-duration="{{$courses->duration}}"
                               data-status="{{$courses->status}}"
                                class="edit-btn">
                            Edit</a>
                            <a onclick="confirmedDelete({{$courses->id}})" class="remove-btn">Remove</a>
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
    <h3>Add Course</h3>
    <form action="{{route ('course.name')}}" method="POST">
        @csrf
        <div class="form-class">
            <label for="">Course Name</label>
            <input type="text" name="course_name" placeholder="e.g. Computer Science" name="course_name" required>
        </div>
        <div class="form-class">
            <label for="">Duration</label>
            <input type="text" name="duration" placeholder="e.g. 2 years" required>
        </div>
        <div class="form-class">
            <select name="status" required>
                <option selected>Status</option>
                <option value="active">Active</option>
                <option value="inactive">Inactive</option>
                <option value="suspended">Suspended</option>
            </select>
        </div>
        <div class="form-footer">
            <button type="submit" class="add-course">Add Course</button>
            <button type="button" class="cancel-btn">Cancel</button>
        </div>
    </form>
</div>

<!--This is Edit Modal-->
<div class="edit-course-modal">
    <h3>Edit Course</h3>
    <form id="editCourseForm" method="POST">
        @csrf
        @method('PUT')
        <input type="hidden" name="id" id="edit-course-id">
        <div class="form-class">
            <label>Course Name</label>
            <input type="text" name="course_name" id="edit-course-name" required>
        </div>
        <div class="form-class">
            <label>Duration</label>
            <input type="number" name="duration" id="edit-duration" required>
        </div>
        <div class="form-class">
            <select name="status" id="edit-status" required>
                <option value="active">Active</option>
                <option value="inactive">Inactive</option>
                <option value="suspended">Suspended</option>
            </select>
        </div>
        <div class="form-footer">
            <button type="submit" class="add-course">Edit Course</button>
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
        button.addEventListener('click', (e) => {
            e.preventDefault();
            const courseId = button.getAttribute('data-id');
            const courseName = button.getAttribute('data-name');
            const duration = button.getAttribute('data-duration');
            const status = button.getAttribute('data-status');

            document.getElementById('edit-course-id').value = courseId;
            document.getElementById('edit-course-name').value = courseName;
            document.getElementById('edit-duration').value = duration;
            document.getElementById('edit-status').value = status;

             document.getElementById('editCourseForm').action = "/course/update/" + courseId;
            editCourseModal.classList.add('show');
        });
    });

    cancelEdit.addEventListener('click', () => {
        editCourseModal.classList.remove('show');
    });

    const addCourse = document.querySelector('.addCourse')
    const cancel = document.querySelector('.cancel-btn');
    const addCourseModal = document.querySelector('.add-course-modal');

    addCourse.addEventListener('click', () => {
        addCourseModal.classList.add('show');
    });

    cancel.addEventListener('click', () => {
        addCourseModal.classList.remove('show');
    });

    function confirmedDelete(courseId) {
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
            window.location.href = "/course/delete/" + courseId;
        } else {
            swal("Your course is safe!");
        }
    });
}

</script>
@endsection
