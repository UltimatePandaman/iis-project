<style type="text/css">
    form, table {
         display:inline;
         margin:0px;
         padding:0px;
    }
    </style>
    

<x-app-layout>
    <x-slot name="header">
        My Conferences
    </x-slot>
    @if ($user->conferences()->first() == null)
        
    @else
        
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 pb-4"><a href="/presentation/pending"><x-redirectbutton>View pending presentations</x-redirectbutton></a></div>
        <div class= "max-w-7xl mx-auto sm:px-6 lg:px-8 pb-4 bg-white overflow-hidden shadow-sm sm:rounded-lg">
            @foreach ($user->conferences as $conference)
            <div class="div pt-4">{{$conference->title}}
            <form action="/conference/delete/{{$conference->id}}" method="post">
                @csrf
                <x-redirectbutton type="submit" class="ml-4 bg-red-500 hover:bg-red-400">Delete</x-redirectbutton>
            </form>
            <a href="/conference/{{$conference->id}}/edit"><x-redirectbutton class="ml-2">Edit</x-redirectbutton></a>
            </div>
                
            @endforeach
        </div>
    </div>
    @endif
</x-app-layout>
