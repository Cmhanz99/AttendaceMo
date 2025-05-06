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
    <style>
        body {
            background-size: cover;
            background-repeat: no-repeat;
            background-image: url({{asset('images/web1.jpg')}});
        }
    </style>
</head>
<body class="flex h-screen items-center justify-center">
    <div class="w-[30%] h-[60%] shadow-[0px_2px_5px_rgba(0,0,0,.5)]
    rounded p-5 relative  backdrop-blur-sm">
        <form action="/login" method="post">
            @csrf
            <h3 class="text-[24px] font-bold text-center">Login</h3>
            <a href="/" class="absolute top-7 left-5"><i class="fa fa-arrow-left"></i></a>

            <div class="flex flex-col w-full mt-3">
                <label for="username">Username</label>
                <input
                    class="shadow-[0_0_2px_rgba(0,0,0,.5)]
                h-8 px-3 text-sm mt-2 rounded outline-none"
                    type="text" name="username" required maxlength="10" minlength="5">
            </div>

            <div class="flex flex-col w-full mt-3">
                <label for="username">Password</label>
                <input
                    class="shadow-[0_0_2px_rgba(0,0,0,.5)]
                 h-8 px-3 text-sm mt-2 rounded outline-none"
                    type="password" name="password" required maxlength="10" minlength="5">
            </div>

            <div class="flex flex-col w-full mt-3">
                <button onclick="admin()" type="submit"
                    class="bg-blue-400 p-1 mt-3 rounded text-white cursor-pointer
                    bg-[length:0%_100%] hover:bg-[length:100%_100%]
                    bg-no-repeat transition-all duration-500 ease-linear
                    bg-gradient-to-r from-blue-600 to-blue-600">
                    Login
                </button>
            </div>

            <p class="mt-3">No account? <a href="/signup" class="text-blue-400 underline">Signup</a></p>
        </form>
    </div>
</body>
<script>
    function admin(){
        window.location.href = '/admin';
    }
</script>
</html>
