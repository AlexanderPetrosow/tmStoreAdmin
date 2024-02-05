@extends('layouts.base')
@section('title', 'Баннеры')
@section('buttons')
    @include('layouts.button', ['create' => false])
@endsection
@section('content')
    <div class="input-group-flex d-flex mb-4">
        <div class="input-label-col">
            <label for="name">Название</label>
            <input type="text" name="name" placeholder="Введите название на русском" 
            value="@if(isset($banner)){{$banner['name']}}@else{{old('name')}}@endif">
        </div>
    </div>
    <div class="input-group-flex d-flex mb-4 flex-wrap">
        <div class="input-label-col">
            <label for="name">Главная</label>
            <div class="accordion" id="mainPageBannerAccordion">
                <div class="accordion-item">
                  <h2 class="accordion-header" id="mainPageBannerHeading">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#mainPageBannerBody" aria-expanded="true" aria-controls="mainPageBannerBody">
                      @if(isset($banner)){{$banner['status_main'] ? "Включен" : "Отключен"}}@else Выберите статус @endif 
                    </button>
                    <input type="hidden" class="mainPageBannerValue" name="status_main">
                    {{-- <input type="hidden" class="mainPageBannerValue"> --}}
                  </h2>
                  <div id="mainPageBannerBody" class="accordion-collapse collapse" aria-labelledby="mainPageBannerHeading" data-bs-parent="#mainPageBannerAccordion">
                    <div class="accordion-body">
                      <div class="select-container">
                        <p class="main-page-banner-option" data-value="1" data-name="Включено">Включено</p>
                        <p class="main-page-banner-option" data-value="0" data-name="Отключено">Отключено</p>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
        </div>
        <div class="input-label-col">
          <label for="phone">Категории</label>
          <div class="accordion" id="categoryBannerAccordion">
              <div class="accordion-item">
                <h2 class="accordion-header" id="categoryBannerHeading">
                  <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#categoryBannerBody" aria-expanded="true" aria-controls="categoryBannerBody">
                  @if(isset($banner)){{$banner['status_category'] ? "Включен" : "Отключен"}}@else Выберите статус @endif
                  </button>
                  <input type="hidden" class="categoryBannerValue" name="status_category">
                  {{-- <input type="hidden" class="categoryBannerValue"> --}}
                </h2>
                <div id="categoryBannerBody" class="accordion-collapse collapse" aria-labelledby="categoryBannerHeading" data-bs-parent="#categoryBannerAccordion">
                  <div class="accordion-body">
                    <div class="select-container">
                      <p class="category-page-banner-option" data-value="1" data-name="Включено">Включено</p>
                      <p class="category-page-banner-option" data-value="0" data-name="Отключено">Отключено</p>
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
                    @if(isset($banner)){{$banner['status_advert'] ? "Включен" : "Отключен"}}@else Выберите статус @endif
                    </button>
                    <input type="hidden" class="advPageBannerValue" name="status_advert">
                    {{-- <input type="hidden" class="advPageBannerValue"> --}}
                  </h2>
                  <div id="advPageBannerBody" class="accordion-collapse collapse" aria-labelledby="advPageBannerHeading" data-bs-parent="#advPageBannerAccordion">
                    <div class="accordion-body">
                      <div class="select-container">
                        <p class="adv-page-banner-option" data-value="1" data-name="Включено">Включено</p>
                        <p class="adv-page-banner-option" data-value="0" data-name="Отключено">Отключено</p>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
        </div>
    </div>
    <div class="input-label-col">
        <label for="name">Прикрепите фото</label>
        <div id="upload-container" class="oneImage">
          <input id="file-input" type="file" name="file" class="oneImage">
          <label for="file-input" class="upload-label">Выберите или перетащите сюда фото для загрузки</label>
          <div class="uploaded-carousel">
            @if(isset($banner))
              <div>
                <img class="uploaded-image" src="/storage/{{$banner['image']}}" alt="Изображение">
                <div class="delete-slide-button">
                  <i class="ti ti-trash"></i>
                </div>
              </div>
            @endif
          </div>
        </div>
        <span class="text-danger fs-6">@error('images'){{$message}}@enderror</span>
    </div>
@endsection
