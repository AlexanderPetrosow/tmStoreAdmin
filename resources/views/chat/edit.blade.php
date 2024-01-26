@extends('layouts.base')
@section('title', 'Чат')
@section('buttons')
    @include('layouts.button', ['create' => false])
@endsection
@section('content')
    <div class="chat-content">
        <div class="chat d-flex flex-column">
            <div class="message incoming">Здравствуйте! Сейчас нахожусь в Барселоне, хочу выставить свой 15-комнатный дом с
                двумя бассейнами и звукозаписывающей студией в подвале у вас на платформе. Хотелось бы обсудить с вами
                возможность перевода оплаты за поднятие моего объявления в топы. Жду ответ!</div>
            <div class="message outgoing align-self-end">Здравствуйте! Можете просто направить к нам Ваших ближайших родственников, которые
                смогут передать нам оплату.</div>
        </div>
        <div class="chat-input-container">
            <input type="text" placeholder="Введите текст" id="messageInput">
            <i class="icon ti ti-send " id="sendMessage"></i>
        </div>
    </div>

@endsection
