<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl">
            {{$conference->title}}
        </h2>
    </x-slot>

<div class="py-12">
<div class="max-w-7xl mx-auto sm:px-6 lg:px-8 pt-4 pb-4 bg-white overflow-hidden shadow-sm sm:rounded-lg">
    <font size = "+1">
        <div class="row">{{$conference->description}}</div>
        <div class="row">Created by: {{$conference->user->name}}</div>
        <div class="row">From: {{$conference->from}}</div>
        <div class="row">To: {{$conference->to}}</div>
        <div class="row">Rooms: TODO</div>
    </font>
    <a href="{{$conference->id}}/create-p"><x-redirectbutton>Create new presentation</x-redirectbutton></a>
</div>
</div>
</x-app-layout>