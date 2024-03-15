@extends('layouts.base')
@section('title', 'Чат')
@section('buttons')
    @include('layouts.button')
@endsection
@section('content')
    <div class="chat-content" userId="{{$chats[0]['user_id']}}">
        <div class="chat d-flex flex-column">
            {{-- @foreach ($chats as $chat)
                <div class="message @if($chat['type'] == 1){{'incoming'}}@else{{'outgoing align-self-end'}}@endif">
                    {{$chat['text']}}
                </div>
            @endforeach --}}
        </div>
        <div class="chat-input-container">
            <input type="text" placeholder="Введите текст" id="messageInput">
            <i class="icon ti ti-send sendMessage" id="sendMessage" ></i>
        </div>
    </div>
@endsection
@section('include-script')
    <script>
        $(document).ready(function(){
            var ccc = 0;
            function msgLength(l){
                ccc = l;
                return true;
            }

            const form = document.getElementById("my_form");

            form.onkeypress = (event) => {
            if (event.keyCode === 13) {
                event.preventDefault();
            }
            };

            $('.sendMessage').click(function(){
                if($('#messageInput').val() != ''){
                    ccc++;
                    $('.chat').append('<div class="message outgoing align-self-end">'+$('#messageInput').val()+'</div>');
                    $('.chat').animate({ scrollTop: $('.chat').get(0).scrollHeight }, 1000);
                    $.ajax({
                        type: 'POST',
                        url: "/sendMsg",
                        headers: { 'X-CSRF-TOKEN': $('meta[name="token"]').attr('content') },
                        data: {msg: $('#messageInput').val(), user: $('.chat-content').attr('userId') },
                        dataType: 'json'
                    });
                    $('#messageInput').val('');
                }
            });

            $.ajax({
                type: 'POST',
                url: "/api/checkMsg",
                headers: { 'X-CSRF-TOKEN': $('meta[name="token"]').attr('content') },
                data: { user: $('.chat-content').attr('userId') },
                dataType: 'json',
                success: function(msg){
                    for (let c = (msg.length-1); c >= 0; c--) {
                        let content = '<div class="message ';
                        content += msg[c]["type"] == 1 ? 'incoming' : 'outgoing align-self-end';
                        content += '">'+msg[c]['text']+'</div>';
                        $('.chat').append(content);                          
                    }
                    $('.chat').animate({ scrollTop: $('.chat').get(0).scrollHeight }, 1000);
                    msgLength(msg.length); 
                }
            });

            // Check update
            setInterval(() => {
                $.ajax({
                    type: 'POST',
                    url: "/api/checkMsg",
                    headers: { 'X-CSRF-TOKEN': $('meta[name="token"]').attr('content') },
                    data: { user: $('.chat-content').attr('userId') },
                    dataType: 'json',
                    success: function(msg){
                        if(msg.length != ccc){
                            for (let c = 0; c < (msg.length-ccc); c++) {
                                let content = '<div class="message ';
                                content += msg[c]["type"] == 1 ? 'incoming' : 'outgoing align-self-end';
                                content += '">'+msg[c]['text']+'</div>';
                                $('.chat').append(content);                               
                            }
                            $('.chat').animate({ scrollTop: $('.chat').get(0).scrollHeight }, 1000);
                            msgLength(msg.length); 
                        }
                        // console.log(0 <= (ccc-msg.length) ? 'Hahha' : 'Nooooo');
                    }
                });
            }, 5000);
        });
    </script>
@endsection
{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @vite('resources/js/app.js')
    <script>
        setTimeout(() => {
            window.Echo.channel('testing').listen('ChatSocket', (e)=>{
                    console.log(e);
                })
        }, 200);
    </script>
</body>
</html> --}}
