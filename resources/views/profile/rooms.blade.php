<style type="text/css">
    form, table {
         display:inline;
         margin:0px;
         padding:0px;
    }
    </style>

<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl">
        My rooms
        </h2>
    </x-slot>

            <div class="py-12">
                <div class= "max-w-7xl mx-auto sm:px-6 lg:px-8 pb-4 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    @foreach ($user->conferences as $conference)
                        @foreach ($conference->rooms as $room)
                            <div class="div pt-4 flex justify-between items-center">
                                <div class="flex items-center">
                                    <x-nav-link href="/room/{{$room->id}}">{{$room->name}}</x-nav-link>
                                    is a room for: 
                                    <x-nav-link href="/conference/{{$conference->id}}">{{$conference->title}}</x-nav-link>
                                </div>
                                <div class="flex items-center">
                                    <form action="/room/delete/{{$room->id}}" method="post">
                                        @csrf
                                        <x-redirectbutton type="submit" class="ml-4 bg-red-500 hover:bg-red-400">Delete</x-redirectbutton>
                                    </form>
                                    <a href="/room/{{$room->id}}/edit"><x-redirectbutton class="ml-2">Edit</x-redirectbutton></a>
                                </div>
                            </div>
                        @endforeach                
                    @endforeach
                </div>
            </div>
</x-app-layout>
