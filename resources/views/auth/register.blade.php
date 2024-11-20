<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

</head>
<body>
<body>
    <section class="container">
        <div class="login-container">
            <div class="circle circle-one"></div>
            <div class="form-container">
                <img src="https://raw.githubusercontent.com/hicodersofficial/glassmorphism-login-form/master/assets/illustration.png" alt="illustration" class="illustration" />
                <h1 class="opacity">Register</h1>

                <form action="{{ route('registerSave') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="text" name="name" placeholder="NAME" />
                    <input type="email" name="email" placeholder="EMAIL" />
                    <input type="password" name="password" placeholder="PASSWORD" />
                    <input type="password" name="password_confirmation" placeholder="CONFIRM PASSWORD" />
                    <button class="opacity">SUBMIT</button>
                </form>

                <!-- Display Validation Errors -->
                @if ($errors->any())
                    <div class="error-messages">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="register-forget opacity">
                    <a href="{{ route('login') }}">LOGIN</a>
                </div>
            </div>
            <div class="circle circle-two"></div>
        </div>
        <div class="theme-btn-container"></div>
    </section>
</body>
</body>
</html>