{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Setting') }}
        </h2>
    </x-slot>

    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            @if (Laravel\Fortify\Features::canUpdateProfileInformation())
                @livewire('profile.update-profile-information-form')

                <x-section-border />
            @endif

            @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
                <div class="mt-10 sm:mt-0">
                    @livewire('profile.update-password-form')
                </div>

                <x-section-border />
            @endif

            @if (Laravel\Fortify\Features::canManageTwoFactorAuthentication())
                <div class="mt-10 sm:mt-0">
                    @livewire('profile.two-factor-authentication-form')
                </div>

                <x-section-border />
            @endif

            <div class="mt-10 sm:mt-0">
                @livewire('profile.logout-other-browser-sessions-form')
            </div>

            @if (Laravel\Jetstream\Jetstream::hasAccountDeletionFeatures())
                <x-section-border />

                <div class="mt-10 sm:mt-0">
                    @livewire('profile.delete-user-form')
                </div>
            @endif
        </div>
    </div>
</x-app-layout> --}}



<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Account Settings') }}
        </h2>
    </x-slot>

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

                    <!-- Profile Form -->
                    <div class="w-3/4 p-4">
                        <form>
                            <!-- Username -->
                            <div class="mb-4">
                                <label for="username" class="block text-sm font-medium text-gray-700">Username</label>
                                <input type="text" id="username" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" value="{{ auth()->user()->name }}">
                            </div>

                            <!-- Profile Image -->
                            <div class="mb-4">
                                <label for="profile_image" class="block text-sm font-medium text-gray-700">Profile Image</label>
                                @if (Laravel\Fortify\Features::canUpdateProfileInformation())
                                @livewire('profile.update-profile-information-form')
                
                                
                            @endif
                            </div>

                            <!-- Display Name -->
                            <div class="mb-4">
                                <label for="display_name" class="block text-sm font-medium text-gray-700">Display Name</label>
                                <input type="text" id="display_name" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                            </div>

                            <!-- Website URL -->
                            <div class="mb-4">
                                <label for="website" class="block text-sm font-medium text-gray-700">Website</label>
                                <input type="text" id="website" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                            </div>

                            <!-- Twitter Handle -->
                            <div class="mb-4">
                                <label for="twitter" class="block text-sm font-medium text-gray-700">Twitter</label>
                                <input type="text" id="twitter" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                            </div>

                            <!-- Account Preferences -->
                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-700">Account Type</label>
                                <select class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                                    <option>Playing and downloading games</option>
                                    <option>Developing and uploading games</option>
                                </select>
                            </div>

                            <div>
                                <button class="bg-blue-500 text-white px-4 py-2 rounded-md">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
