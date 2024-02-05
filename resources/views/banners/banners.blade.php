@extends('layouts.base')
@section('title', 'Баннеры')
@section('buttons')
    @include('layouts.button', ['create' => true, 'route' => 'banners'])
@endsection
@section('content')
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Имя</th>
                <th scope="col">Дата добавления</th>
                <th scope="col">Статус</th>
                <th scope="col">Расположение</th>
                <th scope="col" class="text-end">Функции</th>
            </tr>
        </thead>
        <tbody>
            @if(count($banners) == 0)
                <tr class="text-center fs-4 fw-bold">
                    <td colspan="5">Нет данных</td>
                </tr>
            @else
                @foreach ($banners as $banner)
                    <tr>
                        <td>{{$banner['name']}}</td>
                        <td>{{$banner['created_at']}}</td>
                        <td>{{$banner['status'] ? "Включен" : "Отключен"}}</td>
                        <td class="d-flex align-items-center">
                            <img src="/storage/{{$banner['image']}}" alt="banner" class="border rounded-2" style="width: 3rem;">
                        </td>
                        <td>
                            <div class="d-flex justify-content-end">
                                <a href="/banners/edit/{{$banner['id']}}">
                                    <i class="ti ti-pencil table-icon"></i>
                                </a>
                                <a href="/banners/status/{{$banner['id']}}">
                                    <i class="ti ti-ban table-icon"></i>
                                </a>
                                <a href="/banners/delete/{{$banner['id']}}">
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
