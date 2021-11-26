<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Your Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <!-- Validation Errors -->
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />

                    <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
                        @csrf
                        @method('patch')

                        <!-- Nickname -->
                        <div>
                            <x-label for="nickname" :value="__('Nickname')" />

                            <x-input id="nickname"
                                class="block mt-1 w-full mr-50"
                                type="text"
                                name="nickname"
                                :value="old('nickname') ?? $user->profile->nickname"
                                required autofocus />
                        </div>

                        <!-- Motto -->
                        <div class="mt-4">
                            <x-label for="motto" :value="__('Motto')" />

                            <x-input id="motto"
                                class="block mt-1 w-full"
                                type="text"
                                name="motto"
                                :value="old('motto') ?? $user->profile->motto"
                                required />
                        </div>

                        <!-- Description -->
                        <div class="mt-4">
                            <x-label for="description" :value="__('Description')" />

                            <x-input id="description"
                                class="block mt-1 w-full"
                                type="text" name="description"
                                :value="old('description') ?? $user->profile->description"
                                required />
                        </div>

                        <!-- Avatar -->
                        <div class="mt-4">
                            <x-label for="profile_image" :value="__('Profile Picture')" />

                            <x-input id="profile_image"
                                class="block mt-1"
                                type="file" name="profile_image"
                                />
                        </div>

                        <!-- Background -->
                        <div class="mt-4">
                            <x-label for="background_image" :value="__('Background')" />

                            <x-input id="background_image"
                                class="block mt-1"
                                type="file" name="background_image"
                                />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-button class="ml-4">
                                {{ __('Save') }}
                            </x-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
