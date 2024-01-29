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
            @for ($i = 0; $i < 5; $i++)
                <tr>

                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                    <td>Главная, Объявления</td>
                    <td>
                        <div class="d-flex justify-content-end">
                            <a href="/banners/edit"><i class="ti ti-pencil table-icon"></i></a>
                            <i class="ti ti-ban table-icon"></i>
                            <i class="ti ti-trash table-icon"></i>
                        </div>
                    </td>
                </tr>
            @endfor

        </tbody>
    </table>
@endsection
