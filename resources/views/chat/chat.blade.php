@extends('layouts.base')
@section('title', 'Чаты')
@section('page-title')
    <p>Чат с пользователями</p>
@endsection
@section('content')
    <table class="table">
        <thead>
            <tr>
               
                <th scope="col">Имя</th>
                <th scope="col">Дата добавления</th>
                <th scope="col">Функции</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                
                <td>Mark</td>
                <td>Otto</td>
                <td>
                    <div class="d-flex">
                        <i class="ti ti-pencil table-icon"></i>
                        <i class="ti ti-ban table-icon"></i>
                        <i class="ti ti-trash table-icon"></i>
                    </div>
                </td>
            </tr>
            <tr>
                
                <td>Jacob</td>
                <td>Thornton</td>
                <td>
                    <div class="d-flex">
                        <i class="ti ti-pencil table-icon"></i>
                        <i class="ti ti-ban table-icon"></i>
                        <i class="ti ti-trash table-icon"></i>
                    </div>
                </td>
            </tr>
            <tr>
                
                <td>Larry</td>
                <td>the Bird</td>
                <td>
                    <div class="d-flex">
                        <i class="ti ti-pencil table-icon"></i>
                        <i class="ti ti-ban table-icon"></i>
                        <i class="ti ti-trash table-icon"></i>
                    </div>
                </td>
            </tr>
            <tr>
                
                <td>Larry</td>
                <td>the Bird</td>
                <td>
                    <div class="d-flex">
                        <i class="ti ti-pencil table-icon"></i>
                        <i class="ti ti-ban table-icon"></i>
                        <i class="ti ti-trash table-icon"></i>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
@endsection
