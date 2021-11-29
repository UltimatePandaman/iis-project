<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit User Information') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <!-- Validation Errors -->
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />

                    <form method="POST" action="{{ route('user.update', ['user' => $user]) }}" enctype="multipart/form-data">
                        @csrf
                        @method('patch')

                        <!-- Balance -->
                        <div>
                            <x-label for="balance" :value="__('Balance')" />

                            <x-input id="balance"
                                class="block mt-1 w-full mr-50"
                                type="text"
                                name="balance"
                                :value="old('balance') ?? $user->balance"
                                required autofocus />
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
