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
            @if(count($users) == 0)
                <tr class="text-center fs-4 fw-bold">
                    <td colspan="4">Нет данных</td>
                </tr>
            @else
                @foreach($users as $user)
                <tr>
                    <td>{{$user['name']}}</td>
                    <td>{{$user['created_at']}}</td>
                    <td>{{$user['status'] ? "Включен" : "Отключен"}}</td>
                    <td>
                        <div class="d-flex justify-content-end">
                            <a href="/users/edit/{{$user['id']}}">
                                <i class="ti ti-pencil table-icon"></i>
                            </a>
                            <a href="/users/status/{{$user['id']}}">
                                <i class="ti ti-ban table-icon"></i>
                            </a>
                            <a href="/users/delete/{{$user['id']}}">
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
