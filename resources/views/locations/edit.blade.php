@extends('layouts.base')
@section('title', 'Города')
@section('page-title')
    <p>Города</p>
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
            <label for="name">Велаят</label>
            <input type="text" name="name" placeholder="Выберите велаят">
        </div>
    </div>
@endsection
