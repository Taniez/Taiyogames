<x-app-layout>


    <div class="mt-10 sm:mt-0">
        <form method="POST" action="{{ route('user-password.update') }}">
            @csrf
            @method('PUT')
    
            <!-- Title -->
            <div class="text-lg font-medium text-gray-900">
                {{ __('Update Password') }}
            </div>
    
            <!-- Description -->
            <p class="mt-1 text-sm text-gray-600">
                {{ __('Ensure your account is using a long, random password to stay secure.') }}
            </p>
    
            <div class="grid grid-cols-6 gap-6 mt-6">
                <!-- Current Password -->
                <div class="col-span-6 sm:col-span-4">
                    <label for="current_password" class="block font-medium text-sm text-gray-700">{{ __('Current Password') }}</label>
                    <input id="current_password" name="current_password" type="password" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" autocomplete="current-password">
                    @error('current_password')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
    
                <!-- New Password -->
                <div class="col-span-6 sm:col-span-4">
                    <label for="password" class="block font-medium text-sm text-gray-700">{{ __('New Password') }}</label>
                    <input id="password" name="password" type="password" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" autocomplete="new-password">
                    @error('password')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
    
                <!-- Confirm Password -->
                <div class="col-span-6 sm:col-span-4">
                    <label for="password_confirmation" class="block font-medium text-sm text-gray-700">{{ __('Confirm Password') }}</label>
                    <input id="password_confirmation" name="password_confirmation" type="password" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" autocomplete="new-password">
                    @error('password_confirmation')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
            </div>
    
            <div class="flex items-center justify-end mt-6">
                <button type="submit" class="bg-indigo-600 text-white font-medium px-4 py-2 rounded-md shadow-sm hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    {{ __('Save') }}
                </button>
            </div>
        </form>
    </div>
    
</x-app-layout>