<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Authenticator</title>
    <link rel="icon" type="image/svg+xml" href="favicon.svg">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <section class="relative flex justify-center items-center h-screen bg-[#1a1a2e] text-white">
        <div class="relative w-80">
            <!-- Form Container -->
            <div class="border border-gray-300/40 shadow-md rounded-lg backdrop-blur-sm p-8 z-10">
                <!-- Illustration -->
                <img src="https://raw.githubusercontent.com/hicodersofficial/glassmorphism-login-form/master/assets/illustration.png" 
                    alt="Login illustration" 
                    class="absolute top-[-14%] right-0 w-4/5" 
                />
                <!-- Title -->
                <h1 class="opacity-60 text-4xl mb-4">LOGIN</h1>
                
                <!-- Form -->
                <form action="{{ route('loginSave') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                    @csrf
                    <input 
                        type="email" 
                        name="email" 
                        placeholder="Email" 
                        required 
                        class="block w-full p-4 bg-gray-700/10 text-white outline-none rounded-lg font-medium text-sm tracking-wide backdrop-blur-md focus:shadow-md transition duration-300"
                    />
                    <input 
                        type="password" 
                        name="password" 
                        placeholder="Password" 
                        required 
                        class="block w-full p-4 bg-gray-700/10 text-white outline-none rounded-lg font-medium text-sm tracking-wide backdrop-blur-md focus:shadow-md transition duration-300"
                    />
                    <button 
                        type="submit" 
                        class="w-full py-3 bg-[#0f3460] text-white rounded-lg text-lg font-bold tracking-widest hover:shadow-md hover:scale-105 transition duration-100 opacity-60"
                    >
                        SUBMIT
                    </button>
                </form>

                <!-- Register and Forgot Password Links -->
                <div class="flex justify-between text-sm mt-6 opacity-60">
                    <a href="{{ route('register') }}" class="hover:underline">REGISTER</a>
                    <a href="{{ route('forgotPassword') }}" class="hover:underline">FORGOT PASSWORD</a>
                </div>

                <!-- Social Login -->
                <div class="flex justify-center mt-6 opacity-60 space-x-4">
                    <a href="{{ url('/auth/google/redirect') }}" class="text-2xl"><i class="fa-brands fa-google"></i></a>
                    <a href="{{ url('/auth/github/redirect') }}" class="text-2xl"><i class="fa-brands fa-github"></i></a>
                </div>
            </div>

            <!-- Decorative Circle Two -->
            <div class="absolute bottom-0 right-0 translate-x-1/2 translate-y-1/2 w-32 h-32 bg-[#0f3460] rounded-full z-[-1]"></div>
        </div>

        <!-- Theme Button Container -->
        <div class="absolute bottom-8 left-0">
            <button 
                class="w-10 h-10 bg-[#0f3460] text-white rounded-full hover:scale-105 transition-all cursor-pointer"
            ></button>
        </div>
    </section>
</body>
</html>
