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
            @for ($i = 0; $i < 4; $i++)
                <tr>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                    <td>
                        <div class="d-flex justify-content-end">
                            <a href="/cities/edit"><i class="ti ti-pencil table-icon"></i></a>
                            <i class="ti ti-ban table-icon"></i>
                            <i class="ti ti-trash table-icon"></i>
                        </div>
                    </td>
                </tr>
            @endfor
        </tbody>
    </table>
@endsection
