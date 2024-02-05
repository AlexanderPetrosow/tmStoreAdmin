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
            <input type="text" name="ru_name" placeholder="Введите название на русском" required 
            value="@if(isset($category)){{$category['ru_name']}}@else{{old('ru_name')}}@endif">
        </div>
        <div class="input-label-col">
            <div class="d-flex">
                <label for="phone">Название</label>
                <img src="{{ asset('/assets/images/tm.png') }}" alt="" width="24" height="24">
            </div>
            <input type="text" name="tm_name" placeholder="Введите название на туркменском" required
            value="@if(isset($category)){{$category['tm_name']}}@else{{old('tm_name')}}@endif">
        </div>
    </div>
    <div class="input-group-flex d-flex">
        @if(isset($childCheck))
            @if(!$childCheck)
                <div class="input-label-col">
                    <label for="phone">Родитель</label>
                    <button type="button" class="modal-button" data-bs-toggle="modal" data-bs-target="#categoryModal"
                        id="categoryModalButton">@if(isset($category)){{$department_name != '' ? $department_name : "Нет"}}@else Выберите категорию @endif</button>
                    <input type="hidden" class="categoryValue" name="department">
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
                                    @if(count($department) == 0)
                                        <div class="text-center">
                                            <p class="fs-5 pb-3">Нет данных</p>
                                        </div>
                                </div>    
                                    @else
                                    @foreach ($department as $depart)
                                        @if(isset($category))
                                            @if($depart['id'] != $category['id'])
                                                <p class="category-option" data-name="{{$depart['ru_name']}}" data-value="{{$depart['id']}}">{{$depart['ru_name']}}</p>
                                            @endif
                                        @endif
                                    @endforeach
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary modal-select-button" data-bs-dismiss="modal"
                                        id="category-select-button">Выбрать</button>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        @endif

        <div class="input-label-col">
            <label for="phone">Иконка</label>
                <div class="d-flex flex-column">
                    <button type="button" class="modal-button" data-bs-toggle="modal" data-bs-target="#iconModal"
                        id="iconModalButton">@if(isset($category))<i class="ti ti-{{$category['icon']}}"></i>@else Выберите иконку @endif</button>
                    <span class="text-danger">@error('icon'){{$message}}@enderror</span>
                </div>
                <input type="hidden" id="iconValue" name="icon" value="@if(isset($category)){{$category['icon']}}@endif">
                <!-- Modal -->
                <div class="modal fade" id="iconModal" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title text-center m-auto" id="iconModalTitle">Выберите иконку</h5>
                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <ul class="icon-list d-flex flex-wrap m-auto"></ul>
                                <div id="preloader">
                                    <div class="spinner-border" role="status">
                                        {{-- <span class="sr-only">Loading...</span> --}}
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary modal-select-button" data-bs-dismiss="modal"
                                    id="icon-select-button">Выбрать</button>
                            </div>
                        </div>
                    </div>
                </div>
           
        </div>
    </div>
@endsection
