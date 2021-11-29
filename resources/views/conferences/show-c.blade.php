<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl">
            {{$conference->title}}
        </h2>
    </x-slot>

<div class="py-12">
<div class="max-w-7xl mx-auto sm:px-6 lg:px-8 pt-4 pb-4 bg-white overflow-hidden shadow-sm sm:rounded-lg">
    <font size = "+1">
        
        <div class="row">Created by: {{$conference->user->name}}</div>
        <div class="row">From: {{$conference->start}}</div>
        <div class="row">To: {{$conference->end}}</div>

        <div class="row"><x-nav-link href="/conference/{{$conference->id}}/presentations">View presentations</x-nav-link></div>
        <div class="row pt-4 pb-4">{{$conference->description}}</div>
    </font>
    @if (auth()->check())
    <a href="{{$conference->id}}/create-p"><x-redirectbutton>Create new presentation</x-redirectbutton></a>
    @can('create', $conference)
    <a href="{{$conference->id}}/create-r"><x-redirectbutton>Add room</x-redirectbutton></a>
    @endcan
    @endif
</div>
</div>
</x-app-layout>