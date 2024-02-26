@extends('layouts.base')
@section('title', 'Объявления')
@section('buttons')
    @include('layouts.button', ['create' => false])
@endsection
@section('content')
    <div class="input-group-flex d-flex mb-4">
        <div class="input-label-col">
            <label for="name">Название</label>
            <input type="text" name="name" placeholder="Введите название" value="@if(isset($advert)){{$advert['name']}}@endif" required>
        </div>
        <div class="input-label-col">
            <div class="d-flex flex-column">
                <label for="phone">Категория</label>
                <button type="button" class="modal-button" data-bs-toggle="modal" data-bs-target="#categoryModal"
                    id="categoryModalButton">@if(isset($advert)){{$category_name['ru_name']}}@else Выберите категорию @endif</button>
                <input type="hidden" class="categoryValue" name="category" value="@if(isset($advert)){{$advert['category_id']}}@endif">
                <span class="text-danger">@error('category'){{$message}}@enderror</span>
            </div>
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
                        <div class="modal-body category-body">
                            {{-- <div class="d-flex justify-content-between category-option cat" data-category="" data-name="Недвижимость">
                                <p class="" >Недвижимость</p>
                            </div> --}}
                            @for ($c = 0; $c < count($department); $c++)
                                @if($department[$c] != [])
                                    <div class="d-flex justify-content-between cat" data-category="{{$department[$c]['id']}}">
                                        <p data-name="{{$department[$c]['ru_name']}}">{{$department[$c]['ru_name']}}</p>
                                        <button type="button" class="goToSub btn">
                                            <i class="ti ti-chevron-right my-auto"></i>
                                        </button>
                                    </div>
                                @endif
                            @endfor
                        </div>
                        <div class="modal-body sub-category-body d-none"></div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary modal-select-button" data-bs-dismiss="modal"
                                id="category-select-button">Выбрать</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="input-label-col mw-670">
        <label for="name">Описание</label>
        <textarea name="description" id="" cols="30" rows="10" required>@if(isset($advert)){{$advert['description']}}@endif</textarea>
    </div>
    <div class="input-group-flex d-flex">
        <div class="input-label-col mb-4">
            <div class="d-flex flex-column">
                <label for="phone">Город</label>
                <button type="button" class="modal-button" data-bs-toggle="modal" data-bs-target="#cityModal"
                    id="cityModalButton">@if(isset($advert)){{$city_name['ru_name']}}@else Выберите город @endif</button>
                <input type="hidden" class="cityValue" name="city" value="@if(isset($advert)){{$advert['city_id']}}@endif">
                <span class="text-danger">@error('city'){{$message}}@enderror</span>
            </div>
            <!-- Modal -->
            <div class="modal fade" id="cityModal" tabindex="-1" role="dialog" aria-labelledby="cityModalTitle"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title text-center m-auto" id="cityModalTitle">Выберите город</h5>
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body district-body">
                            @for ($d = 0; $d < count($district); $d++)
                                @if($district[$d] != [])
                                <div class="d-flex justify-content-between cat" data-district="{{$district[$d]['id']}}" data-name="{{$district[$d]['ru_name']}}">
                                    <p data-value="{{$district[$d]['ru_name']}}">{{$district[$d]['ru_name']}}</p>
                                    <button type="button" class="btn goToCity">
                                        <i class="ti ti-chevron-right my-auto"></i>
                                    </button>
                                </div>
                                @endif
                            @endfor
                        </div>
                        <div class="modal-body city-body d-none"></div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary modal-select-button" data-bs-dismiss="modal"
                                id="city-select-button" disabled>Выбрать</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="input-label-col">
        <div class="d-flex flex-column mb-3">
            <label for="name">Прикрепите фото</label>
            <div id="upload-container" class="tenImages adverts-img">
                <input id="file-input" type="file" name="file" multiple>
                <label for="file-input" class="upload-label">Выберите или перетащите сюда несколько фотографий для загрузки в
                    ваше объявление(до 10 фото)</label>
                <div class="uploaded-carousel">
                    @if(isset($advert))
                        @if($advert['main_image'] != '')
                        <div>
                            <img class="uploaded-image highlight" src="/storage/{{$advert['main_image']}}" alt="Изображение">
                            <div class="delete-slide-button">
                                <i class="ti ti-trash"></i>
                            </div>
                            <div class="main-photo-icon"><i class="ti ti-home"></i></div>
                        </div>
                        @endif
                        @if($images[0]['image'] != '')
                            @foreach ($images as $img)
                                <div>
                                    <img class="uploaded-image" src="/storage/{{$img['image']}}" alt="Изображение">
                                    <div class="delete-slide-button old_image" link="{{$img['image']}}">
                                        <i class="ti ti-trash"></i>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    @endif
                </div>
            </div>
            <span class="text-danger">@error('images'){{$message}}@enderror</span>
        </div>
    </div>

    <div class="input-group-flex  mb-4">
        <div class="input-label-col">
            <label for="name">Номер телефона</label>
            <input type="tel" name="phone" placeholder="Введите номер телефона" pattern="[0-9]{3}[0-9]{8}" maxlength="11"  title="Введите номер по данному примеру: 99365776655" 
            value="@if(isset($advert)){{$advert['phone']}}@endif" required>
        </div>
        <div class="input-label-col">
            <label for="phone">Цена</label>
            <input type="number" name="price" placeholder="Введите цену" value="@if(isset($advert)){{$advert['price']}}@endif">
        </div>
    </div>
    <div class="input-group-flex  mb-4">
        <div class="input-label-col">
            <div class="d-flex flex-column">
                <label for="name">Пользователь</label>
                <button type="button" class="modal-button" data-bs-toggle="modal" data-bs-target="#userModal"
                    id="userModalButton">@if(isset($advert)){{$user_name['name']}} @else Выберите пользователя@endif</button>
                <input type="hidden" class="userValue" name="user" value="@if(isset($advert)){{$advert['user_id']}}@endif">
                <span class="text-danger">@error('user'){{$message}}@enderror</span>
            </div>
            <div class="modal fade" id="userModal" tabindex="-1" role="dialog" aria-labelledby="userModalTitle"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title text-center m-auto" id="userModalTitle">Выберите пользователя</h5>
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <input type="text" placeholder="Введите имя для поиска" class="m-auto mb-3 user_search">
                            <div class="users_list">
                                @foreach ($users as $user)
                                    <p class="user-option" data-value="{{$user['id']}}" data-name="{{$user['name']}}">{{$user['name']}}</p>
                                @endforeach
                            </div>
                            {{-- <p class="user-option" data-value="Аннамередов Аннамеред">Аннамередов Аннамеред</p>
                            <p class="user-option" data-value="Велиев Вели">Велиев Вели</p>
                            <p class="user-option" data-value="Гочмурадов Гочмурад">Гочмурадов Гочмурад</p> --}}
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary modal-select-button" data-bs-dismiss="modal"
                                id="user-select-button">Выбрать</button>
                            <input type="hidden" class="userValue">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="input-label-col">
            <label for="phone">Статус</label>
            <div class="accordion" id="statusAccordion">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="statusHeading">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                            data-bs-target="#statusBody" aria-expanded="true" aria-controls="statusBody">
                            @if(isset($advert))
                            @switch($advert['status'])
                                @case(0)
                                Отключено
                                    @break
                                @case(1)
                                Одобрено   
                                    @break
                                @case(2)
                                На модерации    
                            @endswitch
                            @else 
                                Выберите статус 
                                @endif
                        </button>
                        <input type="hidden" class="statusValue" name="status" value="@if(isset($advert)){{$advert['status']}}@endif">
                    </h2>
                    <div id="statusBody" class="accordion-collapse collapse" aria-labelledby="statusHeading"
                        data-bs-parent="#statusAccordion">
                        <div class="accordion-body">
                            <div class="select-container">
                                <p class="status-option" data-value="2" data-name="На модерации">На модерации</p>
                                <p class="status-option" data-value="1" data-name="Одобрено">Одобрено</p>
                                <p class="status-option" data-value="0" data-name="Отключено">Отключено</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="input-group-flex  mb-4">
        <div class="input-label-col ">
            <label for="name">Вип-статус</label>
            <div class="accordion" id="vipStatusAccordion">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="vipStatusHeading">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                            data-bs-target="#vipStatusBody" aria-expanded="true" aria-controls="vipStatusBody">
                            @if(isset($advert)){{$advert['status_vip'] ? 'Включено' : 'Отключено'}}@else Выберите статус @endif
                        </button>
                        <input type="hidden" class="vipStatusValue" name="status_vip" value="@if(isset($advert)){{$advert['status_vip']}}@endif">
                    </h2>
                    <div id="vipStatusBody" class="accordion-collapse collapse" aria-labelledby="vipStatusHeading"
                        data-bs-parent="#vipStatusAccordion">
                        <div class="accordion-body">
                            <div class="select-container">
                                <p class="vip-status-option" data-value="1" data-name="Включено">Включено</p>
                                <p class="vip-status-option" data-value="0" data-name="Отключено">Отключено</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="input-label-col">
            <label for="phone">
                <span>Дата</span>
                <span class="badge small text-muted">(Введите дату окончания VIP)</span>
            </label>
            <input type="date" class="date_vip" name="date_end" placeholder="Введите дату окончания VIP" value="">
        </div>
    </div>
    <input type="hidden" class="date_vips" value="@if(isset($advert)){{$advert['date_vip']}}@endif">
    <div class="input-group-flex">
        @if(isset($advert))
            <div class="elevate-adv-button">
                <p>Поднять объявление</p>
            </div>
        @endif
        <div class="checkbox-input">
            <input type="checkbox" name="secureCheckbox" class="sucureCheckBox" @if(isset($advert))@if($advert['secure'])checked @endif @endif>
            <label for="attach-adv">Закрепить объявление</label>
        </div>
    </div>
@endsection
