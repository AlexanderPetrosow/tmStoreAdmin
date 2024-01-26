@extends('layouts.base')
@section('title', 'Баннеры')
@section('buttons')
    @include('layouts.button', ['create' => false])
@endsection
@section('content')
    <div class="input-group-flex d-flex mb-4">
        <div class="input-label-col">

            <label for="name">Название</label>

            <input type="text" name="name" placeholder="Введите название на русском">
        </div>

    </div>
    <div class="input-group-flex d-flex mb-4">
        <div class="input-label-col">
            <label for="name">Главная</label>
            <div class="accordion" id="mainPageBannerAccordion">
                <div class="accordion-item">
                  <h2 class="accordion-header" id="mainPageBannerHeading">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#mainPageBannerBody" aria-expanded="true" aria-controls="mainPageBannerBody">
                     Выберите статус
                    </button>
                    <input type="hidden" class="mainPageBannerValue">
                    <input type="hidden" class="mainPageBannerValue">
                  </h2>
                  <div id="mainPageBannerBody" class="accordion-collapse collapse" aria-labelledby="mainPageBannerHeading" data-bs-parent="#mainPageBannerAccordion">
                    <div class="accordion-body">
                      <div class="select-container">
                        <p class="main-page-banner-option" data-value="Включено">Включено</p>
                        <p class="main-page-banner-option" data-value="Отключено">Отключено</p>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
        </div>
        <div class="input-label-col">
            <label for="phone">Объявления</label>
            <div class="accordion" id="advPageBannerAccordion">
                <div class="accordion-item">
                  <h2 class="accordion-header" id="advPageBannerHeading">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#advPageBannerBody" aria-expanded="true" aria-controls="advPageBannerBody">
                     Выберите статус
                    </button>
                    <input type="hidden" class="advPageBannerValue">
                    <input type="hidden" class="advPageBannerValue">
                  </h2>
                  <div id="advPageBannerBody" class="accordion-collapse collapse" aria-labelledby="advPageBannerHeading" data-bs-parent="#advPageBannerAccordion">
                    <div class="accordion-body">
                      <div class="select-container">
                        <p class="adv-page-banner-option" data-value="Включено">Включено</p>
                        <p class="adv-page-banner-option" data-value="Отключено">Отключено</p>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
        </div>
    </div>
    <div class="input-label-col">
        <label for="name">Прикрепите фото</label>
        <form id="upload-container" method="POST" action="/upload">
            <input id="file-input" type="file" name="file">
            <label for="file-input" class="upload-label">Выберите или перетащите сюда фотографию баннера</label>
            <div class="success" style="display:none;">Worked!</div>
        </form>
    </div>
@endsection
