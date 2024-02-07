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
            <input type="text" name="ru_name" placeholder="Введите заголовок на русском"
            value="@if(isset($news)){{$news['ru_name']}}@else{{old('ru_name')}}@endif" required>
        </div>
        <div class="input-label-col mw-580">
            <div class="d-flex">
                <label for="phone">Заголовок</label>
                <img src="{{asset('/assets/images/tm.png')}}" alt="" width="24" height="24">
            </div>
            <input type="text" name="tm_name" placeholder="Введите заголовок на туркменском" 
            value="@if(isset($news)){{$news['tm_name']}}@else{{old('tm_name')}}@endif" required>
        </div>
    </div>
    <div class="input-group-flex textarea-mobile-block mb-4" id="newsInputFlex">
        <div class="input-label-col mw-580">
            <div class="d-flex">
                <label for="phone">Содержание</label>
                <img src="{{asset('/assets/images/ru.png')}}" alt="" width="24" height="24">
            </div>
            <textarea name="ru_description" id="" cols="30" rows="10" required>@if(isset($news)){{$news['ru_description']}}@else{{old('ru_description')}}@endif</textarea>
        </div>
        <div class="input-label-col mw-580">
            <div class="d-flex">
                <label for="phone">Содержание</label>
                <img src="{{asset('/assets/images/tm.png')}}" alt="" width="24" height="24">
            </div>
            <textarea name="tm_description" id="" cols="30" rows="10" required>@if(isset($news)){{$news['tm_description']}}@else{{old('tm_description')}}@endif</textarea>
        </div>
    </div>
    <div class="input-label-col">
        <div class="input-label-col">
            <label for="name">Прикрепите фото</label>
            <div id="upload-container" class="oneImage">
                <input id="file-input" type="file" name="file" class="oneImage">
                <label for="file-input" class="upload-label">Выберите или перетащите сюда фото для загрузки</label>
                <div class="uploaded-carousel">
                    @if(isset($news))
                    <div>
                        <img class="uploaded-image" src="/storage/{{$news['image']}}" alt="Изображение">
                        <input type="hidden" name="images[]" value="{{$news['image']}}">
                        <div class="delete-slide-button">
                            <i class="ti ti-trash"></i>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
            <span class="text-danger fs-6">@error('images'){{$message}}@enderror</span>
        </div>
    </div>
@endsection
