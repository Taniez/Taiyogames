<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Reset Password') }}
        </h2>
    </x-slot>


     @guest
    <script>window.location.href = "{{ route('register') }}";</script>
    @endguest

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="flex">
                    <!-- Sidebar -->
                    <div class="w-1/4 bg-gray-100 p-4">
                        <ul class="space-y-4">
                            <li><a href="/settings" class="text-blue-500">Profile</a></li>
                            <li><a href="/Update" class="text-gray-500">Password</a></li>
                        </ul>
                    </div>

                 

                            <!-- Profile Image -->
                            <div class="mb-4">
                                @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
                                <div class="mt-10 sm:mt-0">
                                    @livewire('profile.update-password-form')
                                </div>
                
                            @endif
                           
                            
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>