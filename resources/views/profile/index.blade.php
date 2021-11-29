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
                <!--  -->
                <div class="p-6 bg-white border-b border-gray-200">
                    <x-schedule :obj="$user"/>
                </div>
                @if ($user->visiting()->first() != null)
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex items-center justify-center min-h-screen">
                        <div class="col-span-12">
                            <div class="overflow-auto lg:overflow-visible ">
                                <table class="w-max table text-gray-400 border-separate space-y-6 text-sm">
                                    <thead class="bg-gray-700 text-gray-500 w-100">
                                        <tr>
                                            <th class="p-3">Conference:</th>
                                            <th class="p-3">Status:</th>
                                        </tr>
                                    </thead>
                                
                                    <tbody>
                                @foreach($user->visiting as $ticket)
                                        <tr class="bg-gray-800">
                                            <td class="p-3">
                                                <div class="underline text-gray-400 hover:text-gray-500"><a href="/conference/{{ $ticket->id }}">{{ $ticket->title }}</a></div>
                                            </td>
                                            @if($ticket->pivot->status)
                                            <td class="p-3 bg-green-600 text-gray-900">
                                                {{ __('Accepted') }}
                                            </td>
                                            @else
                                            <td class="p-3 bg-yellow-600 text-gray-900">
                                                {{ __('Pending...') }}
                                            </td>
                                            @endif
                                        </tr>
                                    </tbody>
                                @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
