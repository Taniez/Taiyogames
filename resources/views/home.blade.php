
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
   

        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Latest Featured Games') }}
        </h2>
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
    <div class="flex py-12 ">
        <!-- Sidebar -->
        <div class="w-1/4 bg-gray-800 text-white p-6">
            <h3 class="text-lg font-bold mb-4">Popular Tags</h3>
            <ul>
            @foreach ($tags as $tag)
                @php
                    $cleanedTag = preg_replace('/{value:(.*?)}/', '$1', $tag->gametag_name);
                @endphp
                <li>
                    <a href="{{ url('/search-by-tag/'.$tag->gametag_name) }}">
                        {{ $cleanedTag }}
                    </a>
                </li>
                @endforeach

            </ul>

            <a href="#" class="text-orange-500 mt-4 block">See all Tags &rarr;</a>

            
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
                        <p class="text-gray-600">{{ $game->Game_info }}</p>
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