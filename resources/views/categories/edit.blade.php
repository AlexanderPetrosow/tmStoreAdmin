@extends('layouts.base')
@section('title', 'Категории')
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
                <label for="phone">Название</label>
                <img src="{{ asset('/assets/images/tm.png') }}" alt="" width="24" height="24">
            </div>
            <input type="text" name="phone" placeholder="Введите название на туркменском">
        </div>
    </div>
    <div class="input-group-flex d-flex">
        <div class="input-label-col">
            <label for="phone">Родитель</label>
            <button class="modal-button" data-bs-toggle="modal" data-bs-target="#categoryModal"
                id="categoryModalButton">Выберите категорию</button>
            <input type="hidden" class="categoryValue">
            <!-- Modal -->
            <div class="modal fade" id="categoryModal" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title text-center m-auto" id="categoryModalTitle">Выберите категорию</h5>
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p class="category-option" data-value="Недвижимость">Недвижимость</p>
                            <p class="category-option" data-value="Автомобили">Автомобили</p>
                            <p class="category-option" data-value="Работа">Работа</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary modal-select-button" data-bs-dismiss="modal"
                                id="category-select-button">Выбрать</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
    <div class="input-label-col">
        <label for="phone">Иконка</label>
        <input type="text" name="phone" placeholder="Выберите иконку">
    </div>
    </div>
@endsection
