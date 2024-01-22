@extends('layouts.base')
@section('title', 'Категории')
@section('page-title')
    <p>Категории</p>
@endsection
@section('content')
    <table class="table">
        <thead>
            <tr>
               
                <th scope="col">Имя</th>
                <th scope="col">Дата добавления</th>
                <th scope="col">Статус</th>
                <th scope="col">Родитель</th>
                <th scope="col">Функции</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                
                <td>Mark</td>
                <td>Otto</td>
                <td>@mdo</td>
                <td>Нет</td>
                <td>
                    <div class="d-flex">
                        <a href="/categories/edit"><i class="ti ti-pencil table-icon"></i></a>
                        <i class="ti ti-ban table-icon"></i>
                        <i class="ti ti-trash table-icon"></i>
                    </div>
                </td>
            </tr>
            <tr>
                
                <td>Jacob</td>
                <td>Thornton</td>
                <td>@fat</td>
                <td>Нет</td>
                <td>
                    <div class="d-flex">
                        <a href="/categories/edit"><i class="ti ti-pencil table-icon"></i></a>
                        <i class="ti ti-ban table-icon"></i>
                        <i class="ti ti-trash table-icon"></i>
                    </div>
                </td>
            </tr>
            <tr>
                
                <td>Larry</td>
                <td>the Bird</td>
                <td>@twitter</td>
                <td>Нет</td>
                <td>
                    <div class="d-flex">
                        <a href="/categories/edit"><i class="ti ti-pencil table-icon"></i></a>
                        <i class="ti ti-ban table-icon"></i>
                        <i class="ti ti-trash table-icon"></i>
                    </div>
                </td>
            </tr>
            <tr>
                
                <td>Larry</td>
                <td>the Bird</td>
                <td>@twitter</td>
                <td>Нет</td>
                <td>
                    <div class="d-flex">
                        <a href="/categories/edit"><i class="ti ti-pencil table-icon"></i></a>
                        <i class="ti ti-ban table-icon"></i>
                        <i class="ti ti-trash table-icon"></i>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
@endsection
