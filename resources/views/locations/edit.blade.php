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
            <input type="text" name="name" placeholder="Введите название на русском">
        </div>
        <div class="input-label-col">
            <div class="d-flex">
                <label for="name">Название</label>
                <img src="{{ asset('/assets/images/tm.png') }}" alt="" width="24" height="24">
            </div>
            <input type="text" name="phone" placeholder="Введите название на туркменском">
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
                            Выберите велаят
                        </button>
                        <input type="hidden" class="districtValue">
                    </h2>
                    <div id="districtBody" class="accordion-collapse collapse" aria-labelledby="districtHeading"
                        data-bs-parent="#districtAccordion">
                        <div class="accordion-body">
                            <div class="select-container">
                                <p class="district-option" data-value="Ашхабад">Ашхабад</p>
                                <p class="district-option" data-value="Ахал">Ахал</p>
                                <p class="district-option" data-value="Мары">Мары</p>
                                <p class="district-option" data-value="Лебап">Лебап</p>
                                <p class="district-option" data-value="Дашогуз">Дашогуз</p>
                                <p class="district-option" data-value="Балкан">Балкан</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
