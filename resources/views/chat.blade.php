<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <style>
        .list-group{
            overflow-y: scroll;
            height: 200px;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="row" id="app">
        <div class="offset-4 col-4">
            <li class="list-group-item active">Chat Room</li>
            <ul class="list-group" v-chat-scroll>

                <message
                    v-for="value,index in chat.message"
                    :key=value.index
                    :color=chat.color[index]
                    :user = chat.user[index]
                >
                    @{{ value }}
                </message>
                <input type="text" class="form-control" placeholder="your message" v-model="message"
                       @keyup.enter="send">
            </ul>
        </div>
    </div>
</div>


<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
