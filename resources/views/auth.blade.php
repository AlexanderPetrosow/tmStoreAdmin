<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @include('layouts.styles')
</head>

<body>
    <div class="auth-content d-flex justify-content-center align-items-center h-100">
        <div class="auth-card ">
            <p class="auth-p text-center">Авторизация</p>
            <div class="d-flex flex-column justify-content-center align-items-center">
                <div class="input-label-col ml-3 mb-5">
                    <input type="text" name="login" placeholder="Введите ваш логин"
                        style="margin-right:0 !important">
                </div>
                <div class="input-label-col ml-3 mb-5">
                    <input type="text" name="password" placeholder="Введите ваш пароль"
                        style="margin-right:0 !important">
                </div>
            </div>
            <div class="auth-button m-auto"><p>Войти</p></div>
        </div>
    </div>
</body>

</html>
