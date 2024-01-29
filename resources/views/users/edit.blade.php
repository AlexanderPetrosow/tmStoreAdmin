@extends('layouts.base')
@section('title', 'Пользователи')
@section('buttons')
    @include('layouts.button', ['create' => false])
@endsection
@section('content')
    <div class="input-group-flex d-flex">
        <div class="input-label-col">
            <label for="name">Имя</label>
            <input type="text" name="name" placeholder="Введите имя пользователя" value="@if(isset($user)){{$user['name']}}@endif" required>
        </div>
        <div class="input-label-col">
            <label for="phone">Номер телефона</label>
            <input type="tel" name="phone" placeholder="99365 776655" pattern="[0-9]{3}[0-9]{8}" maxlength="11"  title="Заполните номер по данному примеру: 99365776655" value="@if(isset($user)){{$user['phone']}}@endif" required>
        </div>
    </div>
@endsection
