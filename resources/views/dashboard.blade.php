<x-app-layout>
    

   
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Latest Featured Games') }}
            </h2>
        </x-slot>
    
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
    
</x-app-layout>
