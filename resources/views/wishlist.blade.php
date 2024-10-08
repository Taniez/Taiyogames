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
            {{ __('My Favorite') }}
        </h2>
        <form action="/Favorite/search" method="get">
            <div class="input-group">
                <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" name="serch_box" />
                <button type="button" class="btn btn-outline-primary" data-mdb-ripple-init>search</button>
            </div>
            </form>
    </x-slot>
    

   
    

        <!-- Main Content -->
        @if($wishlists->isEmpty())
        <div class="ms-5 center w-100 ">
        <p>No games found for this tag. :(</p>
        </div>
        @else
        <div class="w-3/4 p-6">
            <div class="grid grid-cols-3 gap-6">
               
                @foreach($wishlists as $wishlist)
                <div class="bg-white shadow-md p-4 w-100 h-100 overflow-auto">
                    <!-- Link ไปที่รายละเอียดเกม -->
                    <a href="/game/{{ $wishlist->game->idgames }}">
                        <img src="{{ asset($wishlist->game->Game_preview) }}" alt="Preview" class="mt-2 h-75 w-100">
                        <h3 class="font-bold text-lg mt-2">{{ $wishlist->game->Game_name }}</h3>
                        <p class="text-gray-600">{{ $wishlist->game->Game_info }}</p>
                    </a>
                    <form action="{{ route('wishlist.destroy',$wishlist->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <input type="hidden" name="idgames" value="{{ $wishlist->game->idgames }}">
                        <button type="submit" class="p-2 rounded">
                            <i class="bi bi-heart-fill" style="color: red;"></i>
                        </button>
                    </form> 
                </div>
                
            @endforeach
            </div>
        </div>
        @endif
    </div>
    

</body>
</html>
</x-app-layout>
