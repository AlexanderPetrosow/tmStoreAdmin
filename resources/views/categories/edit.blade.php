@extends('layouts.base')
@section('title', 'Категории')
@section('page-title')
    <p>Категории</p>
@endsection
@section('content')
    <div class="input-group-flex d-flex mb-4">
        <div class="input-label-col">
            <label for="name">Название</label>
            <input type="text" name="name" placeholder="Введите название на русском">
        </div>
        <div class="input-label-col">
            <label for="phone">Название</label>
            <input type="text" name="phone" placeholder="Введите название на туркменском">
        </div>
    </div>
    <div class="input-group-flex d-flex">
        <div class="input-label-col">
            <label for="name">Родитель</label>
            <input type="text" name="name" placeholder="Выберите категорию">
        </div>
        <div class="input-label-col">
            <label for="phone">Иконка</label>
            <input type="text" name="phone" placeholder="Выберите иконку">
        </div>
    </div>
@endsection
