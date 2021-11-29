<style>
    .column {
  float: left;
  width: 25%;
}
.row:after {
  content: "";
  display: table;
  clear: both;
}
.heading1 {
    border-bottom: 1px solid black;
}
form, table {
         display:inline;
         margin:0px;
         padding:0px;
    }
</style>


<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl">
        Pending presentations
        </h2>
    </x-slot>
@if ($user->conferences()->first() == null)

@else
<div class="py-12">
<div class="heading1 max-w-7xl mx-auto sm:px-6 lg:px-8 pt-4 pb-4 bg-white overflow-hidden shadow-sm sm:rounded-t-lg">
        <div class="column">Presentation:</div>
        <div class="column">Conference:</div>
        <div class="column">Created by:</div>
</div>
<div class="max-w-7xl mx-auto sm:px-6 lg:px-8 pt-4 pb-4 bg-white overflow-hidden shadow-sm sm:rounded-lg">
    @foreach ($user->conferences()->get() as $conference)
        @foreach ($conference->presentations()->where('accepted','=', 0)->get() as $presentation)

            <div class="column"><x-nav-link href="/presentation/{{$presentation->id}}">{{$presentation->title}}</x-nav-link></div>
            <div class="column"><x-nav-link href="/conference/{{$conference->id}}">{{$conference->title}}</x-nav-link></div>
            <div class="column">{{$user->name}}</div>
            <div class="column">

                   <a href="/presentation/edit/{{$presentation->id}}"><x-redirectbutton type="submit" class="ml-4 bg-green-500 hover:bg-green-400">Accept</x-redirectbutton></a>

                <form action="/presentation/reject/{{$presentation->id}}" method="post">
                    @csrf
                    <x-redirectbutton type="submit" class="mb-2 ml-2 bg-red-500 hover:bg-red-400">Reject</x-redirectbutton>
                </form>
            
            </div>
        @endforeach
    @endforeach
</div>
</div>
@endif
</x-app-layout>