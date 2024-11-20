<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <section class="container">
        <div class="login-container">
            <div class="circle circle-one"></div>
            <div class="form-container">
                <img src="https://raw.githubusercontent.com/hicodersofficial/glassmorphism-login-form/master/assets/illustration.png" alt="Login illustration" class="illustration" />
                <h1 class="opacity">Forgot Password</h1>
                <form action="{{ route('forgotPasswordSave') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="email" name="email" placeholder="Email" required />
                    <!-- <input type="password" name="password" placeholder="Password" required /> -->
                    <button type="submit" class="opacity">SUBMIT</button>
                </form>
                <div class="register-forget opacity">
                    <a href="{{ route('register') }}">REGISTER</a>
                    <a href="{{ route('login') }}">BACK</a>
                </div>
            </div>
            <div class="circle circle-two"></div>
        </div>
        <div class="theme-btn-container"></div>
    </section>
</body>
</html>
