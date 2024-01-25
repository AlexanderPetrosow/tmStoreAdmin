@extends('layouts.base')
@section('title', 'Баннеры')
@section('buttons')
    @include('layouts.button', ['create' => false])
@endsection
@section('content')
    <div class="input-group-flex d-flex mb-4">
        <div class="input-label-col">

            <label for="name">Название</label>

            <input type="text" name="name" placeholder="Введите название на русском">
        </div>

    </div>
    <div class="input-group-flex d-flex mb-4">
        <div class="input-label-col">
            <label for="name">Главная</label>
            <input type="text" name="name" placeholder="Выберите статус">
        </div>
        <div class="input-label-col">
            <label for="phone">Объявления</label>
            <input type="text" name="name" placeholder="Выберите статус">
        </div>
    </div>
    <div class="input-label-col">
        <label for="name">Прикрепите фото</label>
        <form id="upload-container" method="POST" action="/upload">
            <input id="file-input" type="file" name="file">
            <label for="file-input" class="upload-label">Выберите или перетащите сюда фотографию баннера</label>
            <div class="success" style="display:none;">Worked!</div>
        </form>
    </div>
@endsection
