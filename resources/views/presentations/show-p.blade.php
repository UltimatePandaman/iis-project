<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl">
            {{$presentation->title}}
        </h2>
    </x-slot>

<div class="py-12">
<div class="max-w-7xl mx-auto sm:px-6 lg:px-8 pt-4 pb-4 bg-white overflow-hidden shadow-sm sm:rounded-lg">
    <div class="row">Presenter: {{$presentation->user()->first()->name}}</div>
    @if ($presentation->room()->first() != NULL)
    <div class="row">Room:<x-nav-link href="/room/{{$presentation->room()->first()->id}}">{{$presentation->room()->first()->name}}</x-nav-link></div>
    @endif
    <div class="row">Presentation content: <br>{{$presentation->content}}</div> 
    <form method="POST" action="{{ route('attend.store', ['presentation' => $presentation]) }}">
        @csrf
        <a class="ml-2" href="{{ route('attend.store', ['presentation' => $presentation]) }}">
            <x-buybutton 
                onclick="event.preventDefault();
                this.closest('form').submit();">
                {{ __('Attend') }}
            </x-buybutton>
        </a>
    </form>
</div>
</div>
</x-app-layout>