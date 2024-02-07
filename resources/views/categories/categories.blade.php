@extends('layouts.base')
@section('title', 'Категории')
@section('buttons')
    @include('layouts.button', ['create' => true, 'route' => 'categories'])
@endsection
@section('content')
    <table class="table">
        <thead>
            <tr>

                <th scope="col">Имя</th>
                <th scope="col">Дата добавления</th>
                <th scope="col">Статус</th>
                <th scope="col">Родитель</th>
                <th scope="col" class="text-end">Функции</th>
            </tr>
        </thead>
        <tbody>
            @if(count($list) == 0)
                <tr class="text-center fs-4 fw-bold">
                    <td colspan="5">Нет данных</td>
                </tr>
            @else
                @php
                    $i = 0;
                @endphp
                @foreach ($list as $content)
                    <tr>
                        <td>{{$content['ru_name']}}</td>
                        <td>{{$content['created_at']}}</td>
                        <td>{{$content['status'] ? "Включен" : "Отключен"}}</td>
                        <td>{{$department_name[$i] == '' ? "Нет" : $department_name[$i]}}</td>
                        <td>
                            <div class="d-flex justify-content-end">
                                <a href="/categories/edit/{{$content['id']}}">
                                    <i class="ti ti-pencil table-icon"></i>
                                </a>
                                <a href="/categories/status/{{$content['id']}}">
                                    <i class="ti ti-ban table-icon"></i>
                                </a>
                                <a href="/categories/delete/{{$content['id']}}">
                                    <i class="ti ti-trash table-icon"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                    @php
                        $i++;
                    @endphp
                @endforeach
            @endif
        </tbody>
    </table>
@endsection
