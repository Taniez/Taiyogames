<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title> 

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

<!-- Tagify CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@yaireo/tagify/dist/tagify.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

<!-- Tagify JS -->
<script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify"></script>
   
</head>
<style>
    @import url({{asset('css/home.css')}});
</style>
<body>
    

<x-app-layout>
    

   
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Latest Featured Games') }}
            </h2>
        </x-slot>
        <div class="input-group">
                <div class="form-outline" data-mdb-input-init>
                    <input type="search" id="form1" class="form-control" />
                    <label class="form-label" for="form1">Search</label>
                </div>
                <button type="button" class="btn btn-primary" data-mdb-ripple-init>
                <i class="fas fa-search"></i>
                </button>
                <script>import { Input, Ripple, initMDB } from "mdb-ui-kit";
                    initMDB({ Input, Ripple });</script>
        </div>
        <div class="flex py-12">
            <!-- Sidebar -->
            <div class="w-1/4 bg-gray-800 text-white p-6">
                <h3 class="text-lg font-bold mb-4">Popular Tags</h3>
                <ul class="space-y-2">
                    <li>Horror Game</li>
                    <li>Simulation</li>
                    <li>Roguelike</li>
                    <li>Multiplayer</li>
                    <li>Visual Novels</li>
                    <li>2D</li>
                </ul>
                <a href="#" class="text-orange-500 mt-4 block">See all Tags &rarr;</a>
    
                <h3 class="text-lg font-bold mt-8 mb-4">Browse</h3>
                <ul class="space-y-2">
                    <li>Games</li>
                    <li>Tools</li>
                    <li>Mod</li>
                </ul>
    
                <h3 class="text-lg font-bold mt-8 mb-4">Games by Price</h3>
                <ul class="space-y-2">
                    <li>Onsale</li>
                    <li>Free Game</li>
                    <li>With Demo</li>
                    <li>$5 or less</li>
                </ul>
            </div>
    
            <!-- Main Content -->
            <div class="w-3/4 p-6">
                <div class="grid grid-cols-3 gap-6">
                    <!-- Game Card 1 -->
                    <div class="bg-white shadow-md p-4">
                        <img src="https://via.placeholder.com/150" alt="Kitsune Tails">
                        <h3 class="font-bold text-lg mt-2">Kitsune Tails</h3>
                        <p class="text-gray-600">Jump, and dash across a land inspired by Japanese mythology...</p>
                    </div>
                    <!-- Game Card 2 -->
                    <div class="bg-white shadow-md p-4">
                        <img src="https://via.placeholder.com/150" alt="Life Eater">
                        <h3 class="font-bold text-lg mt-2">Life Eater</h3>
                        <p class="text-gray-600">A horror fantasy kidnapping sim...</p>
                    </div>
                    <!-- Game Card 3 -->
                    <div class="bg-white shadow-md p-4">
                        <img src="https://via.placeholder.com/150" alt="Make Ten">
                        <h3 class="font-bold text-lg mt-2">Make Ten</h3>
                        <p class="text-gray-600">Math arcade blitz...</p>
                    </div>
                    <!-- Add more game cards as needed -->
                    <div class="bg-white shadow-md p-4">
                        <img src="https://via.placeholder.com/150" alt="Make Ten">
                        <h3 class="font-bold text-lg mt-2">Make Ten</h3>
                        <p class="text-gray-600">Math arcade blitz...</p>
                    </div>
         
                  
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<script>
import { Input, Ripple, initMDB } from "mdb-ui-kit";
initMDB({ Input, Ripple });
</script>
</body>
</html>

