<style type="text/css">
    form, table {
         display:inline;
         margin:0px;
         padding:0px;
    }
    </style>

<x-app-layout>
    <x-slot name="header">
        My rooms
    </x-slot>
    @if ($user->conferences()->first() != null)
        
    @if ($user->conferences()->first()->rooms()->first() == null)
        
    @else
        
    
    <div class="py-12">
        <div class= "max-w-7xl mx-auto sm:px-6 lg:px-8 pb-4 bg-white overflow-hidden shadow-sm sm:rounded-lg">
            @foreach ($user->conferences as $conference)
            @foreach ($conference->rooms as $room)

            <div class="div pt-4">{{$room->name}} is a room for: {{$conference->title}}
                <form action="/room/delete/{{$room->id}}" method="post">
                    @csrf
                    <x-redirectbutton type="submit" class="ml-4 bg-red-500 hover:bg-red-400">Delete</x-redirectbutton>
                </form>
                <a href="/room/{{$room->id}}/edit"><x-redirectbutton class="ml-2">Edit</x-redirectbutton></a>
            </div>
            @endforeach                
            @endforeach
        </div>
    </div>
    @endif
    @endif
</x-app-layout>
