
<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl">
            Conferences
        </h2>
    </x-slot>
<div class="py-12">
    <div class= "max-w-7xl mx-auto sm:px-6 lg:px-8 pb-4 bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="row">
            <div class="col-9 pt-5">
                <a href="c/create"><x-redirectbutton>Create new conference</x-redirectbutton></a>
            </div>
        </div>    
    <div class="row">
    @foreach ($conferences as $conference)
        <div class="col-4">
            <x-nav-link href="/conference/{{$conference->id}}">{{$conference->title}}</x-nav-link>
            <font size = "+1"><div class="row pl-3">{{$conference->description}}</div></font>
        </div>    
    @endforeach

</div>
</div>
</div>
</div>
</x-app-layout>
