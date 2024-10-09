
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@yaireo/tagify/dist/tagify.css">
    <style>
        @import url({{asset('css/home.css')}});
   .center p{ 
    text-align: center;
    padding-top:18%; 
   }
   .center{
    
    margin-right:15px 
   
   }

    </style>
</head>
<body>
    
<x-app-layout>

    <x-slot name="header">
   

        <h2 class="font-semibold text-xl text-gray-800 leading-tight"></h2>
        <form action="/home/serch" method="get">
        <div class="input-group">
            <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" name="serch_box" />
            <button type="button" class="btn btn-outline-primary" data-mdb-ripple-init>search</button>
        </div>
        </form>
    </x-slot>
    @guest
    <script>window.location.href = "{{ route('register') }}";</script>
    @endguest
    @auth
    <div class="container">
        <!-- Sidebar -->
        <div class="sidebar_container">
            <h3 class="header">Tags</h3>
            @foreach ($tags as $tag)
                    <p class="child-tag">
                        <a href="/search-by-tag/{{$tag->gametype_name}}">
                            {{preg_replace('/{value:(.*?)}/', '$1', $tag->gametype_name)}}
                        </a>
                    </p>
            @endforeach

            <h3 class="header">Latest Game</h3>
            @foreach ($new_Game as $game)
                <p class="child-tag">
                    <a href="/game/{{ $game->idgames }}">
                        {{ $game->Game_name }}
                    </a>
                </p>
            @endforeach
        </div>
    

        <!-- Main Content -->
        @if($_Games->isEmpty())
        <div class="ms-5 center w-100 ">
        <p>No games found for this tag. :</p>
        </div>
        @else
        <div class="w-3/4 p-6">
            <div class="grid grid-cols-3 gap-6">
                @foreach($_Games as $game)
                <div class="bg-white shadow-md p-4 w-100 h-100 overflow-auto">
                    <a href="/game/{{ $game->idgames }}">
                        <img src="{{ asset($game->Game_preview) }}" alt="Preview" class="mt-2 h-75 w-100">
                        <h3 class="font-bold text-lg mt-2">{{ $game->Game_name }}</h3>
                        <p class="text-gray-600">{{ Str::limit($game->Game_info, 20, ' [...]') }}</p>
                    </a>
            
                    <!-- ปุ่ม Wishlist -->
                    <livewire:wishlist-button :gameId="$game->idgames" />
                </div>
            @endforeach
            </div>
        </div>
        @endif
    </div>
   
</body>

</html>
</x-app-layout>
@endauth