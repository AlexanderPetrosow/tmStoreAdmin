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
            @if(count($category) == 0)
                <tr class="text-center fs-4 fw-bold">
                    <td colspan="5">Нет данных</td>
                </tr>
            @else
                @foreach ($category as $categ)
                    <tr>
                        <td>{{$categ['ru_name']}}</td>
                        <td>{{$categ['created_at']}}</td>
                        <td>{{$categ['status'] ? "Включен" : "Отключен"}}</td>
                        <td>{{$categ['parent'] == 0 ? "Нет" : "Тест"}}</td>
                        <td>
                            <div class="d-flex justify-content-end">
                                <a href="/categories/edit/{{$categ['id']}}">
                                    <i class="ti ti-pencil table-icon"></i>
                                </a>
                                <a href="/categories/status/{{$categ['id']}}">
                                    <i class="ti ti-ban table-icon"></i>
                                </a>
                                <a href="/categories/delete/{{$categ['id']}}">
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
