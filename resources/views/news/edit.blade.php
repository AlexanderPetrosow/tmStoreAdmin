@extends('layouts.base')
@section('title', 'Новости')
@section('buttons')
    @include('layouts.button', ['create' => false])
@endsection
@section('content')
    <div class="input-group-flex  mb-4" id="newsInputFlex">
        <div class="input-label-col mw-580">
            <div class="d-flex">
                <label for="phone">Заголовок</label>
                <img src="{{asset('/assets/images/ru.png')}}" alt="" width="24" height="24">
            </div>
            <input type="text" name="name" placeholder="Введите заголовок на русском">
        </div>
        <div class="input-label-col mw-580">
            <div class="d-flex">
                <label for="phone">Заголовок</label>
                <img src="{{asset('/assets/images/tm.png')}}" alt="" width="24" height="24">
            </div>
            <input type="text" name="phone" placeholder="Введите заголовок на туркменском">
        </div>
    </div>
    <div class="input-group-flex textarea-mobile-block mb-4" id="newsInputFlex">
        <div class="input-label-col mw-580">
            <div class="d-flex">
                <label for="phone">Содержание</label>
                <img src="{{asset('/assets/images/ru.png')}}" alt="" width="24" height="24">
            </div>
            <textarea name="description" id="" cols="30" rows="10"></textarea>
        </div>
        <div class="input-label-col mw-580">
            <div class="d-flex">
                <label for="phone">Содержание</label>
                <img src="{{asset('/assets/images/tm.png')}}" alt="" width="24" height="24">
            </div>
            <textarea name="description" id="" cols="30" rows="10"></textarea>
        </div>
    </div>
    <div class="input-label-col">
        <div class="input-label-col">
            <label for="name">Прикрепите фото</label>
            <div id="upload-container">
                <input id="file-input" type="file" name="file" multiple>
                <label for="file-input" class="upload-label">Выберите или перетащите сюда несколько фотографий для загрузки </label>
                <div class="uploaded-carousel"></div>
            </div>
        </div>
    </div>
@endsection
