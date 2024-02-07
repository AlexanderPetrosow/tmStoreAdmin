@extends('layouts.base')
@section('title', 'Пользователи')
@section('buttons')
    @include('layouts.button', ['create' => true, 'route' => 'users'])
@endsection
@section('content')
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Имя</th>
                <th scope="col">Дата добавления</th>
                <th scope="col">Статус</th>
                <th scope="col" class="text-end">Функции</th>
            </tr>
        </thead>
        <tbody>
            @if(count($list) == 0)
                <tr class="text-center fs-4 fw-bold">
                    <td colspan="4">Нет данных</td>
                </tr>
            @else
                @foreach($list as $content)
                <tr>
                    <td>{{$content['name']}}</td>
                    <td>{{$content['created_at']}}</td>
                    <td>{{$content['status'] ? "Включен" : "Отключен"}}</td>
                    <td>
                        <div class="d-flex justify-content-end">
                            <a href="/users/edit/{{$content['id']}}">
                                <i class="ti ti-pencil table-icon"></i>
                            </a>
                            <a href="/users/status/{{$content['id']}}">
                                <i class="ti ti-ban table-icon"></i>
                            </a>
                            <a href="/users/delete/{{$content['id']}}">
                                <i class="ti ti-trash table-icon"></i>
                            </a>
                        </div>
                    </td>
                </tr>
                @endforeach
            @endif
        </tbody>
    </table>
@endsection
