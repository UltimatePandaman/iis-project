<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl">
            {{$room->name}}
        </h2>
    </x-slot>

<div class="py-12">
<div class="max-w-7xl mx-auto sm:px-6 lg:px-8 pt-4 pb-4 bg-white overflow-hidden shadow-sm sm:rounded-lg">
    <div class="">Added by: {{$room->conference()->first()->user()->first()->name}}</div>
    <div class="">Capacity: {{$room->capacity}}</div> 
    <div class="p-6 bg-white border-b border-gray-200">
        <x-room_schedule :obj="$room"/>
    </div>
</div>
</div>
</x-app-layout>