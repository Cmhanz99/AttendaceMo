@extends('layout.adminLayout')

@section('content')
    <link rel="stylesheet" href="{{ asset('adminCss/teacher.css') }}">
    <link rel="stylesheet" href="{{ asset('adminCss/modalForm.css') }}">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <style>
        .form-footer {
            border-top: 1px solid #ccc;
            padding-top: 20px;
            bottom: -20px
        }

        .add-course-modal {
            height: 450px;
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
                <p>{{ $client->first_name }}</p>
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
                    <a class="addStudent">Add Students</a>
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
                        @foreach ($students as $student)
                            <tr>
                                <td>2020{{ $student->id }}</td>
                                <td>{{ $student->first_name }} {{ $student->last_name }}</td>
                                <td>{{ $student->course->course_name }}</td>
                                <td>{{ $student->email }}</td>
                                <td>{{ $student->teacher->first_name }} {{ $student->teacher->last_name }}</td>
                                <td>
                                    <div class="actions">
                                        <a href="#" class="edit-btn" data-id="{{ $student->id }}"
                                            data-first_name="{{ $student->first_name }}"
                                            data-last_name="{{ $student->last_name }}"
                                            data-course="{{ $student->course_id }}" data-email="{{ $student->email }}"
                                            data-teacher="{{ $student->teacher_id }}"
                                            data-password="{{ $student->password }}">Edit</a>
                                        <a href="/removed/" class="remove-btn">Remove</a>
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
        <h3>Add Students</h3>
        <form action="{{ route('students.name') }}" method="POST">
            @csrf
            <div class="form-group">
                <div class="form-col">
                    <label for="">First Name</label>
                    <input type="text" name="first_name" autocomplete="off" placeholder="First Name" name="course_name"
                        required>
                </div>
                <div class="form-col">
                    <label for="">Last Name</label>
                    <input type="text" name="last_name" autocomplete="off" placeholder="Last Name" name="course_name"
                        required>
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
            <div class="form-group">
                <div class="form-col">
                    <select name="department" id="courseSelect">
                        <option value="" selected disabled hidden>Department</option>
                        @foreach ($courses as $course)
                            <option value="{{ $course->id }}" data-department="{{ $course->id }}">
                                {{ $course->course_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-col">
                    <select name="teacher" id="teacherSelect">
                        <option value="" disabled selected hidden>Select Department</option>
                        @foreach ($teachers as $teacher)
                            <option value="{{ $teacher->id }}" data-department="{{ $teacher->course_id }}">
                                {{ $teacher->first_name }} {{ $teacher->last_name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-footer">
                <button type="submit" class="add-course">Add Students</button>
                <button type="button" class="cancel-btn">Cancel</button>
            </div>
        </form>
    </div>

    <div class="edit-course-modal">
        <h3>Update Students</h3>
        <form id="editStudentForm" method="POST">
            @csrf
            @method('PUT')
            <input name="id" id="editStudentId" hidden>
            <div class="form-group">
                <div class="form-col">
                    <label for="">First Name</label>
                    <input type="text" name="first_name" autocomplete="off" placeholder="First Name" required
                        id="edit-student-fname">
                </div>
                <div class="form-col">
                    <label for="">Last Name</label>
                    <input type="text" name="last_name" autocomplete="off" placeholder="Last Name" required
                        id="edit-student-lname">
                </div>
            </div>
            <div class="form-class">
                <label for="">Email</label>
                <input type="email" name="email" autocomplete="off" placeholder="e.g teacher@test.com" required
                    id="edit-student-email">
            </div>
            <div class="form-class">
                <label for="">Password</label>
                <input type="password" name="password" autocomplete="off" placeholder="Password" required
                    id="edit-student-password">
            </div>
            <div class="form-group">
                <div class="form-col">
                    <select name="department" id="edit-student-department">
                        <option selected disabled hidden value="">Department</option>
                        @foreach ($courses as $course)
                            <option value="{{ $course->id }}" data-department="{{$course->id}}">{{ $course->course_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-col">
                    <select name="teacher" id="edit-student-teacher">
                        <option selected hidden disabled value="">Teacher</option>
                        @foreach ($teachers as $teacher)
                            <option value="{{ $teacher->id }}" data-department="{{$teacher->course_id}}">
                                {{ $teacher->first_name }} {{ $teacher->last_name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-footer">
                <button type="submit" class="add-course">Update Student</button>
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
                const teacher = button.getAttribute('data-teacher');

                document.querySelector('#editStudentId').value = id;
                document.querySelector('#edit-student-fname').value = firstName;
                document.querySelector('#edit-student-lname').value = lastName;
                document.querySelector('#edit-student-email').value = email;
                document.querySelector('#edit-student-password').value = password;
                document.querySelector('#edit-student-department').value = course;
                document.querySelector('#edit-student-teacher').value = teacher;

                document.querySelector('#editStudentForm').action = "/students/update/" + id;

                editCourseModal.classList.add('show');
            });
        });

        cancelEdit.addEventListener('click', () => {
            editCourseModal.classList.remove('show');
        });

        const addCourse = document.querySelector('.addStudent')
        const cancel = document.querySelector('.cancel-btn');
        const addCourseModal = document.querySelector('.add-course-modal');

        addCourse.addEventListener('click', () => {
            addCourseModal.classList.add('show');
        });

        cancel.addEventListener('click', () => {
            addCourseModal.classList.remove('show');
        });

        // Get the dropdowns
        var teacherSelect = document.getElementById('teacherSelect');
        var courseSelect = document.getElementById('courseSelect');

        courseSelect.addEventListener('change', function() {
            var selectedCourseId = courseSelect.value;

            for (var i = 0; i < teacherSelect.options.length; i++) {
                var teacherOption = teacherSelect.options[i];
                var teacherDepartment = teacherOption.getAttribute('data-department');

                if (teacherOption.value === "") {
                    teacherOption.style.display = "block";
                    continue;
                }

                if (teacherDepartment === selectedCourseId) {
                    teacherOption.style.display = "block";
                } else {
                    teacherOption.style.display = "none";
                }
            }

            teacherSelect.value = "";
        });
        // Get the dropdowns
            var courseSelect = document.querySelector('#edit-student-department');
            var teacherSelect = document.querySelector('#edit-student-teacher');
            courseSelect.addEventListener('change', function() {
            var selectedCourseId = courseSelect.value;

            for (var i = 0; i < teacherSelect.options.length; i++) {
                var teacherOption = teacherSelect.options[i];
                var teacherDepartment = teacherOption.getAttribute('data-department');

                if (teacherOption.value === "") {
                    teacherOption.style.display = "block";
                    continue;
                }

                if (teacherDepartment === selectedCourseId) {
                    teacherOption.style.display = "block";
                } else {
                    teacherOption.style.display = "none";
                }
            }

            teacherSelect.value = "";
        });
    </script>
@endsection
