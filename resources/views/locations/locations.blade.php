@extends('layouts.base')
@section('title', 'Города')
@section('page-title')
    <p>Города</p>
@endsection
@section('content')
    <table class="table">
        <thead>
            <tr>
               
                <th scope="col">Имя</th>
                <th scope="col">Дата добавления</th>
                <th scope="col">Статус</th>
                <th scope="col">Функции</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                
                <td>Mark</td>
                <td>Otto</td>
                <td>@mdo</td>
                <td>
                    <div class="d-flex">
                        <a href="/cities/edit"><i class="ti ti-pencil table-icon"></i></a>
                        <i class="ti ti-ban table-icon"></i>
                        <i class="ti ti-trash table-icon"></i>
                    </div>
                </td>
            </tr>
            <tr>
                
                <td>Jacob</td>
                <td>Thornton</td>
                <td>@fat</td>
                <td>
                    <div class="d-flex">
                        <a href="/cities/edit"><i class="ti ti-pencil table-icon"></i></a>
                        <i class="ti ti-ban table-icon"></i>
                        <i class="ti ti-trash table-icon"></i>
                    </div>
                </td>
            </tr>
            <tr>
                
                <td>Larry</td>
                <td>the Bird</td>
                <td>@twitter</td>
                <td>
                    <div class="d-flex">
                        <a href="/cities/edit"><i class="ti ti-pencil table-icon"></i></a>
                        <i class="ti ti-ban table-icon"></i>
                        <i class="ti ti-trash table-icon"></i>
                    </div>
                </td>
            </tr>
            <tr>
                
                <td>Larry</td>
                <td>the Bird</td>
                <td>@twitter</td>
                <td>
                    <div class="d-flex">
                        <a href="/cities/edit"><i class="ti ti-pencil table-icon"></i></a>
                        <i class="ti ti-ban table-icon"></i>
                        <i class="ti ti-trash table-icon"></i>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
@endsection
