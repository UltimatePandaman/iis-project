
<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl">
            Conferences
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 pb-4"><a href="c/create"><x-redirectbutton>Create new conference</x-redirectbutton></a></div>

        <div class= "max-w-7xl mx-auto sm:px-6 lg:px-8 pb-4 bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="row">
                @foreach ($conferences as $conference)
                    <div class="flex justify-between items-center mb-2 mt-2">
                        <div class="">
                            <x-nav-link class="mr-5 pt-5" href="/conference/{{$conference->id}}">{{$conference->title}}</x-nav-link>
                            <div class="row">Capacity: {{$conference->capacity}}</div>
                            <div class="row pt-2">{{$conference->description}}</div>
                        </div>
                        <div class="flex items-center">
                            {{$conference->price}},- €
                            <a class="ml-2" href="c/">
                                <x-buybutton>
                                    Buy Conference
                                </x-buybutton>
                            </a>
                        </div>
                    </div>
                @endforeach

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
