@extends('layouts.base')
@section('title', 'Города')
@section('buttons')
    @include('layouts.button', ['create' => true, 'route' => 'cities'])
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
            @if(count($cities) == 0)
                <tr class="text-center fs-4 fw-bold">
                    <td colspan="4">Нет данных</td>
                </tr>
            @else
                @for ($i = 0; $i < count($cities); $i++)
                    <tr>
                        <td>{{$cities[$i]['ru_name']}}</td>
                        <td>{{$cities[$i]['created_at']}}</td>
                        <td>{{$cities[$i]['status'] ? "Включен" : "Отключен"}}</td>
                        <td>
                            <div class="d-flex justify-content-end">
                                <a href="/cities/edit/{{$cities[$i]['id']}}">
                                    <i class="ti ti-pencil table-icon"></i>
                                </a>
                                <a href="/cities/status/{{$cities[$i]['id']}}">
                                    <i class="ti ti-ban table-icon"></i>
                                </a>
                                <a href="/cities/delete/{{$cities[$i]['id']}}">
                                    <i class="ti ti-trash table-icon"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                @endfor
            @endif
        </tbody>
    </table>
@endsection
