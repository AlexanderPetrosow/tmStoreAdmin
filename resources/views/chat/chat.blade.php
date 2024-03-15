@extends('layouts.base')
@section('title', 'Чаты')
@section('buttons')
    @include('layouts.button')
@endsection
@section('content')
    <table class="table">
        <thead>
            <tr>

                <th scope="col">Имя</th>
                <th scope="col">Дата добавления</th>
                <th scope="col" class="text-end">Функции</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($chats as $chat)
                <tr>
                    <td>{{$chat['phone']}}</td>
                    <td>{{$chat['created_at']}}</td>
                    <td>
                        <div class="d-flex justify-content-end">
                            <a href="/chat/edit/{{$chat['user_id']}}"><i class="ti ti-message table-icon"></i></a>
                            {{-- <i class="ti ti-ban table-icon"></i> --}}
                            <i class="ti ti-trash table-icon"></i>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
