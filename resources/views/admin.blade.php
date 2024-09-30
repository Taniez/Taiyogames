<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AdminSaDed</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@yaireo/tagify/dist/tagify.css">
</head>
</head>
<body>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin') }}
        </h2>
        <form action="/home/serch" method="get">
            <div class="input-group">
                <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" name="serch_box" />
                <button type="button" class="btn btn-outline-primary" data-mdb-ripple-init>search</button>
            </div>
            </form>
    </x-slot>

    <div class="py-12">
        <div class=" D max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <x-welcome />
            </div>
        </div>
    </div>
    <div class="flex py-12 ">
        <!-- Sidebar -->
        <div class="w-1/4 bg-gray-800 text-white p-6">
            <h3 class="text-lg font-bold mb-4">Popular Tags</h3>
            <ul>
                <ul>
                    @foreach ($tags as $tag)
                        @php
                            $cleanedTag = preg_replace('/{value:(.*?)}/', '$1', $tag->gametype_name);
                        @endphp
                        <li>
                            <a href="{{ url('/search-by-tag/'.$tag->gametype_name) }}">
                                {{ $cleanedTag }}
                            </a>
                        </li>
                        @endforeach
        
                    </ul>

            </ul>

            <a href="#" class="text-orange-500 mt-4 block">See all Tags &rarr;</a>

            <h3 class="text-lg font-bold mt-8 mb-4">Browse</h3>
            <ul class="space-y-2">
                <li>Games</li>
                <li>Tools</li>
            </ul>

            <h3 class="text-lg font-bold mt-8 mb-4">Games by Price</h3>
            <ul class="space-y-2">
                <li>Onsale</li>
                <li>Free Game</li>
                <li>With Demo</li>
                <li>$5 or less</li>
                <p>Tags:</p>
            </ul>
        </div>
</x-app-layout>
</body>
</html>