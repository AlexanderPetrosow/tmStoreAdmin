@extends('layouts.base')
@section('title', 'Новости')
@section('page-title')
    <p>Новости</p>
@endsection
@section('content')
    <div class="input-group-flex d-flex mb-4">
        <div class="input-label-col">
            <label for="name">Заголовок</label>
            <input type="text" name="name" placeholder="Введите заголовок на русском">
        </div>
        <div class="input-label-col">
            <label for="phone">Заголовок</label>
            <input type="text" name="phone" placeholder="Введите заголовок на туркменском">
        </div>
    </div>
    <div class="input-group-flex d-flex mb-4">
        <div class="input-label-col">
            <label for="name">Содержание</label>
            <input type="text" name="name" placeholder="Выберите категорию">
        </div>
        <div class="input-label-col">
            <label for="phone">Содержание</label>
            <input type="text" name="phone" placeholder="Выберите иконку">
        </div>
    </div>
    <div class="input-label-col">
        <label for="phone">Прикрепите фото</label>
        <input type="text" name="phone" placeholder="Выберите иконку">
    </div>
@endsection
