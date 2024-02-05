@extends('layouts.base')
@section('title', 'Города')
@section('buttons')
    @include('layouts.button', ['create' => false])
@endsection
@section('content')
    <div class="input-group-flex d-flex mb-4">
        <div class="input-label-col">
            <div class="d-flex">
                <label for="name">Название</label>
                <img src="{{ asset('/assets/images/ru.png') }}" alt="" width="24" height="24">
            </div>
            <input type="text" name="ru_name" placeholder="Введите название на русском" required 
            value="@if(isset($cities)){{$cities['ru_name']}}@else{{old('ru_name')}}@endif">
        </div>
        <div class="input-label-col">
            <div class="d-flex">
                <label for="name">Название</label>
                <img src="{{ asset('/assets/images/tm.png') }}" alt="" width="24" height="24">
            </div>
            <input type="text" name="tm_name" placeholder="Введите название на туркменском" required
            value="@if(isset($cities)){{$cities['tm_name']}}@else{{old('tm_name')}}@endif">
        </div>
    </div>
    <div class="input-group-flex d-flex">
        <div class="input-label-col">
            <label for="phone">Велаят</label>
            <div class="accordion" id="districtAccordion">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="districtHeading">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                            data-bs-target="#districtBody" aria-expanded="true" aria-controls="districtBody">
                            @if(isset($cities)){{$districts[$cities['district']-1]['ru_name']}}@else Выберите велаят @endif
                        </button>
                        <input type="hidden" class="districtValue" name="district">
                        <span class="text-danger fs-6">@error('district'){{$message}}@enderror</span>
                    </h2>
                    <div id="districtBody" class="accordion-collapse collapse" aria-labelledby="districtHeading"
                        data-bs-parent="#districtAccordion">
                        <div class="accordion-body">
                            <div class="select-container">
                                @foreach ($districts as $district)
                                    <p class="district-option" data-value="{{$district['id']}}" data-name="{{$district['ru_name']}}">{{$district['ru_name']}}</p>
                                @endforeach
                                {{-- <p class="district-option" data-value="2" data-name="Ахал">Ахал</p>
                                <p class="district-option" data-value="3" data-name="Мары">Мары</p>
                                <p class="district-option" data-value="4" data-name="Лебап">Лебап</p>
                                <p class="district-option" data-value="5" data-name="Дашогуз">Дашогуз</p>
                                <p class="district-option" data-value="6" data-name="Балкан">Балкан</p> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
