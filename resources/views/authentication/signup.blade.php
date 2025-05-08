<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        body {
            background-size: cover;
            background-repeat: no-repeat;
            background-image: url({{ asset('images/web1.jpg') }});
        }
    </style>
</head>
@if (session('success'))
    <script>
        Swal.fire({
            title: 'Registered',
            text: '{{ session('success') }}',
            icon: 'success'
        });
    </script>
@endif

<body class="flex h-screen items-center justify-center">
    <div class="w-[40%] shadow-[0px_2px_5px_rgba(0,0,0,.5)]
    rounded p-5 relative  bg-white">
        <form action="{{ route('register.name') }}" method="post" id="registerForm">
            @csrf
            <h3 class="text-[24px] font-bold text-center">SignUp</h3>
            <a href="/" class="absolute top-7 left-5"><i class="fa fa-arrow-left"></i></a>

            <div class="flex w-full mt-3 gap-4">
                <div class="flex flex-col flex-1">
                    <label for="first_name">First Name</label>
                    <input
                    class="shadow-[0_0_2px_rgba(0,0,0,.5)]
                    h-8 px-3 text-sm mt-2 rounded outline-none"
                    type="text" name="first_name" required maxlength="50" minlength="5" placeholder="First Name" autocomplete="off">
                </div>
                <div class="flex flex-col flex-1">
                    <label for="last_name">Last Name</label>
                    <input
                    class="shadow-[0_0_2px_rgba(0,0,0,.5)]
                    h-8 px-3 text-sm mt-2 rounded outline-none"
                    type="text" name="last_name" required maxlength="50" minlength="5" placeholder="Last Name" autocomplete="off">
                </div>
            </div>

            <div class="flex flex-col w-full mt-3">
                <label for="user_name">Username</label>
                <input
                    class="shadow-[0_0_2px_rgba(0,0,0,.5)]
                    h-8 px-3 text-sm mt-2 rounded outline-none"
                    type="text" name="user_name" required maxlength="10" minlength="5" placeholder="Username" autocomplete="off">
                </div>
            @error('user_name')
                <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
            @enderror

            <div class="flex flex-col w-full mt-3">
                <label for="password">Password</label>
                <input
                    class="shadow-[0_0_2px_rgba(0,0,0,.5)]
                    h-8 px-3 text-sm mt-2 rounded outline-none"
                    type="password" name="password" id="password" required maxlength="10" minlength="8" placeholder="Password(8 characters)">
            </div>

            <div class="flex flex-col w-full mt-3">
                <label for="username">Confirm Password</label>
                <input
                    class="shadow-[0_0_2px_rgba(0,0,0,.5)]
                    h-8 px-3 text-sm mt-2 rounded outline-none"
                    type="password" id="confirmPassword" name="password_confirmation" required maxlength="10"
                    minlength="8" placeholder="Password(8 characters)">
            </div>
            <p id="message"></p>
            <div class="flex flex-col w-full mt-3">
                <button type="submit"
                    class="bg-blue-400 p-1 mt-3 rounded text-white cursor-pointer
                    bg-[length:0%_100%] hover:bg-[length:100%_100%]
                    bg-no-repeat transition-all duration-500 ease-linear
                    bg-gradient-to-r from-blue-600 to-blue-600">
                    Register
                </button>
            </div>

            <p class="mt-3">Have an account? <a href="/login" class="text-blue-400 underline">Login</a></p>
        </form>
    </div>
</body>
<script>
    var password = document.querySelector('#password');
    var confirmPassword = document.querySelector('#confirmPassword');
    var message = document.querySelector('#message');
    var form = document.querySelector('#registerForm');

    password.addEventListener('keyup', checkPassword)
    confirmPassword.addEventListener('keyup', checkPassword)

    function checkPassword() {
        if (password.value == confirmPassword.value && password.value != "" && confirmPassword.value != "") {
            message.textContent = "✅ Passwords match!";
            message.style.color = "green";
        } else {
            if (confirmPassword.value == "") {
                message.textContent = " "
            } else if (password.value == "") {
                message.textContent = " "
            } else {
                message.style.color = "red";
                message.textContent = "❎ Password does not  match"
            }

        }
    };

    form.addEventListener('submit', () => {
        if (password.value !== confirmPassword.value) {
            event.preventDefault();
            alert('password does not match')
        }
    });
</script>

</html>
