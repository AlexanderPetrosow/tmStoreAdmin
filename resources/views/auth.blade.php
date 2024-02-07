<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Авторизация</title>
    @include('layouts.styles')
</head>

<body>
    <div class="auth-content d-flex justify-content-center align-items-center h-100">
        <form class="auth-card" method="POST">
            @csrf
            <p class="auth-p text-center">Авторизация</p>
            <div class="text-center">
                <span class="text-danger fs-6">@error('auth'){{$message}}@enderror</span>
            </div>
            <div class="d-flex flex-column justify-content-center align-items-center">
                <div class="input-label-col ml-3 my-3">
                    <input type="text" name="login" placeholder="Введите ваш логин" class="me-0" value="{{old('login')}}" autocomplete>
                    <span class="text-danger fs-6">@error('login'){{$message}}@enderror</span>
                </div>
                <div class="input-label-col ml-3 mb-5">
                    <input type="password" name="password" placeholder="Введите ваш пароль" class="me-0" autocomplete>
                    <span class="text-danger fs-6">@error('password'){{$message}}@enderror</span>
                </div>
            </div>
            <div class="d-flex justify-content-center">
                <button type="submit" class="auth-button"><p>Войти</p></button>
            </div>
        </form>
    </div>
    @include('layouts.scripts')
</body>

</html>
