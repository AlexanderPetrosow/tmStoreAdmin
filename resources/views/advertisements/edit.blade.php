@extends('layouts.base')
@section('title', 'Объявления')
@section('buttons')
    @include('layouts.button', ['create' => false])
@endsection
@section('content')
    <div class="input-group-flex d-flex mb-4">
        <div class="input-label-col">
            <label for="name">Название</label>
            <input type="text" name="name" placeholder="Введите название на русском">
        </div>
        <div class="input-label-col">
            <label for="phone">Категория</label>
            <button class="modal-button" data-bs-toggle="modal" data-bs-target="#categoryModal" id="categoryModalButton">Выберите категорию</button>
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
                            <button type="button" class="btn btn-primary modal-select-button"
                                data-bs-dismiss="modal" id="category-select-button">Выбрать</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="input-label-col mw-670">
        <label for="name">Описание</label>
        <textarea name="description" id="" cols="30" rows="10"></textarea>
    </div>
    <div class="input-label-col mb-4">
        <label for="phone">Город</label>
        <button class="modal-button" data-bs-toggle="modal" data-bs-target="#cityModal" id="cityModalButton">Выберите город</button>
        <input type="hidden" class="cityValue">
        <!-- Modal -->
        <div class="modal fade" id="cityModal" tabindex="-1" role="dialog"
            aria-labelledby="cityModalTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-center m-auto" id="cityModalTitle">Выберите город</h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p class="city-option" data-value="Ашхабад">Ашхабад</p>
                        <p class="city-option" data-value="Балканабад">Балканабад</p>
                        <p class="city-option" data-value="Лебап">Лебап</p>
                        <p class="city-option" data-value="Туркменбаши">Туркменбаши</p>
                        <p class="city-option" data-value="Дашогуз">Дашогуз</p>
                        <p class="city-option" data-value="Мары">Мары</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary modal-select-button"
                            data-bs-dismiss="modal" id="city-select-button">Выбрать</button>
                            <input type="hidden" class="cityValue">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="input-label-col">
        <label for="name">Прикрепите фото</label>
        <form id="upload-container" method="POST" action="/upload">
            <input id="file-input" type="file" name="file" multiple>
            <label for="file-input" class="upload-label">Выберите или перетащите сюда несколько фотографий для загрузки в ваше объявление(до 10 фото)</label>
            <div class="success" style="display:none;">Worked!</div>
            <div class="uploaded-carousel"><img class="uploaded-image" src=""></div>
        </form>
    </div>
    
    <div class="input-group-flex d-flex mb-4">
        <div class="input-label-col">
            <label for="name">Номер телефона</label>
            <input type="text" name="name" placeholder="Введите название на русском">
        </div>
        <div class="input-label-col">
            <label for="phone">Цена</label>
            <input type="text" name="name" placeholder="Введите название на русском">
        </div>
    </div>
    <div class="input-group-flex d-flex mb-4">
        <div class="input-label-col">
            <label for="name">Пользователь</label>
            <button class="modal-button" data-bs-toggle="modal" data-bs-target="#userModal" id="userModalButton">Выберите пользователя</button>
            <div class="modal fade" id="userModal" tabindex="-1" role="dialog"
            aria-labelledby="userModalTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-center m-auto" id="userModalTitle">Выберите пользователя</h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p class="user-option" data-value="Байрам Байрамов">Байрам Байрамов</p>
                        <p class="user-option" data-value="Аннамередов Аннамеред">Аннамередов Аннамеред</p>
                        <p class="user-option" data-value="Велиев Вели">Велиев Вели</p>
                        <p class="user-option" data-value="Гочмурадов Гочмурад">Гочмурадов Гочмурад</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary modal-select-button"
                            data-bs-dismiss="modal" id="user-select-button">Выбрать</button>
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
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#statusBody" aria-expanded="true" aria-controls="statusBody">
                     Выберите статус
                    </button>
                    <input type="hidden" class="statusValue">
                  </h2>
                  <div id="statusBody" class="accordion-collapse collapse" aria-labelledby="statusHeading" data-bs-parent="#statusAccordion">
                    <div class="accordion-body">
                      <div class="select-container">
                        <p class="status-option" data-value="На модерации">На модерации</p>
                        <p class="status-option" data-value="Одобрено">Одобрено</p>
                        <p class="status-option" data-value="Отключено">Отключено</p>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
        </div>
    </div>
    <div class="input-group-flex d-flex mb-4">
        <div class="input-label-col">
            <label for="name">Вип-статус</label>
            <div class="accordion" id="vipStatusAccordion">
                <div class="accordion-item">
                  <h2 class="accordion-header" id="vipStatusHeading">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#vipStatusBody" aria-expanded="true" aria-controls="vipStatusBody">
                     Выберите статус
                    </button>
                    <input type="hidden" class="vipStatusValue">
                  </h2>
                  <div id="vipStatusBody" class="accordion-collapse collapse" aria-labelledby="vipStatusHeading" data-bs-parent="#vipStatusAccordion">
                    <div class="accordion-body">
                      <div class="select-container">
                        <p class="vip-status-option" data-value="Включено">Включено</p>
                        <p class="vip-status-option" data-value="Отключено">Отключено</p>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
        </div>
        <div class="input-label-col">
            <label for="phone">Дата</label>
            <input type="date" name="name" placeholder="Введите название на русском">
        </div>
    </div>
    <div class="elevate-adv-button"><p>Поднять объявление</p></div>
@endsection