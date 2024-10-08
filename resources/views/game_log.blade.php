
<x-app-layout>
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Document</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<!-- Tagify JS -->
    <script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Tagify CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@yaireo/tagify/dist/tagify.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    @guest
    <script>window.location.href = "{{ route('register') }}";</script>
    @endguest


    @if ($_Games)
   <style>
        @import url({{asset('css/game_log.css')}});
body {
    margin: 0px auto;
    padding: 0px 15%;
    height: auto;
    background-image: linear-gradient(rgba(0, 0, 255, 0), rgba(0, 0, 0, 0.8)), url("{{ asset($_Games->Gamebackground)}}");
    /* background-repeat: no-repeat; */
    background-position: center;
    background-size: cover;
}

img{
    width: 60px;
}


    </style>
</head>
<body>
    @guest
        <script>window.location.href = "{{ route('register') }}";</script>
    @endguest
    <div class="ground ">
        <div class="logoGame ">
        <img src="{{ asset($_Games->Game_preview)}}" alt="logo">
    </div>
        <div class='gameLogs'>
            @if($_Dev_logs->isEmpty())
                
            @else
                @foreach ($_Dev_logs as $log)
                    <h1 id='header'><b>{{ $log->topic }}</b></h1>
                    <div class="headerDetail">
                        <p><a href="/game/{{ $_Games->idgames }}">{{ $_Games->Game_name }}</a> -> Devlog by <p class="name">{{ $_Games->User->name }}</p> </p>
                        <p class="LogCreateAt">{{ \Carbon\Carbon::parse($log->created_at)->format('Y-m-d') }}</p>
                    </div>
                    <div class="detailzone">
                        <p id='detailheader'>Detail</p>
                        <p class="detail">{{$log->detail}}</p>
                    </div>
                @endforeach
            @endif
        </div>
@else
        <p>No game found.</p>
@endif
</body>
</html>
</x-app-layout>
