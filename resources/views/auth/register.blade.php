<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | Authenticator</title>
    <link rel="icon" type="image/png" href="favicon.png">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
<body>
    <section class="relative flex justify-center items-center h-screen bg-[#1a1a2e] text-white">
        <div class="relative w-80">
            <!-- Form Container -->
            <div class="border border-gray-300/40 shadow-md rounded-lg backdrop-blur-sm p-8 z-10">
                <!-- Illustration -->
                <img src="https://raw.githubusercontent.com/hicodersofficial/glassmorphism-login-form/master/assets/illustration.png" 
                    alt="illustration" 
                    class="absolute top-[-14%] right-0 w-4/5" 
                />

                <!-- Title -->
                <h1 class="opacity-60 text-4xl mb-4">Register</h1>
                
                <!-- Form -->
                <form action="{{ route('registerSave') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                    @csrf
                    <input 
                        type="text" 
                        name="name" 
                        placeholder="NAME" 
                        required 
                        class="block w-full p-4 bg-gray-700/10 text-white outline-none rounded-lg font-medium text-sm tracking-wide backdrop-blur-md focus:shadow-md transition duration-300"
                    />
                    <input 
                        type="email" 
                        name="email" 
                        placeholder="EMAIL" 
                        required 
                        class="block w-full p-4 bg-gray-700/10 text-white outline-none rounded-lg font-medium text-sm tracking-wide backdrop-blur-md focus:shadow-md transition duration-300"
                    />
                    <input 
                        type="password" 
                        name="password" 
                        placeholder="PASSWORD" 
                        required 
                        class="block w-full p-4 bg-gray-700/10 text-white outline-none rounded-lg font-medium text-sm tracking-wide backdrop-blur-md focus:shadow-md transition duration-300"
                    />
                    <input 
                        type="password" 
                        name="password_confirmation" 
                        placeholder="CONFIRM PASSWORD" 
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

                <!-- Display Validation Errors -->
                @if ($errors->any())
                    <div class="bg-red-500/20 text-red-300 rounded-md p-4 mt-6 space-y-2">
                        <ul class="list-disc pl-6">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- Login Link -->
                <div class="flex justify-center mt-6 opacity-60">
                    <a href="{{ route('login') }}" class="hover:underline">LOGIN</a>
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
</body>
</html>