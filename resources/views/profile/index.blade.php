<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Welcome back ') . $user->profile->nickname . __('!') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex flex-row">
                        <div class="w-1/6">
                            <img src="{{ $user->profile->profile_image ?? __('/storage/avatars/default.png') }}" alt="avatar" class="rounded-full">
                        </div>
                        <div class="w-5/6">
                            <p class="text-3xl">{{ $user->profile->nickname }}</p>
                            <p class="text-xl">{{ $user->profile->motto }}</p>
                            <p class="text-lg">{{ $user->profile->description }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
