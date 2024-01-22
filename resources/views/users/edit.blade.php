@extends('layouts.base')
@section('title', 'Пользователи')
@section('page-title')
    <p>Пользователи</p>
@endsection
@section('content')
    <div class="input-group-flex d-flex">
        <div class="input-label-col">
            <label for="name">Имя</label>
            <input type="text" name="name" placeholder="Введите имя пользователя">
        </div>
        <div class="input-label-col">
            <label for="phone">Номер телефона</label>
            <input type="text" name="phone" placeholder="+993">
        </div>
    </div>
@endsection
