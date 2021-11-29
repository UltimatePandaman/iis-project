<style>
    .column {
  float: left;
  width: 25%;
}
.column2 {
  float: left;
  width: 10%;
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
            Presentations for {{$conference->title}}
        </h2>
    </x-slot>

    
<div class="py-12">

    <div class="heading1 max-w-7xl mx-auto sm:px-6 lg:px-8 pt-4 pb-4 bg-white overflow-hidden shadow-sm sm:rounded-t-lg">
        <div class="column">Presentation:</div>
        <div class="column">Presenter:</div>
        <div class="column2">Date:</div>
        <div class="column2">Starts:</div>
        <div class="column2">Ends:</div>
    </div>

    <div class= "pt-4 max-w-7xl mx-auto sm:px-6 lg:px-8 pb-4 bg-white overflow-hidden shadow-sm sm:rounded-lg">
 
    @foreach ($conference->presentations()->where('accepted', '=', 1)->orderBy('date', 'ASC')->get() as $presentation)
    <div class="row mt-2 mb-2">
        <div class="column"><x-nav-link href="/presentation/{{$presentation->id}}">{{$presentation->title}}</x-nav-link></div>
        <div class="column">{{$presentation->user()->first()->name}}</div>
        <div class="column2">{{$presentation->date}}</div>
        <div class="column2">{{$presentation->start}}</div>
        <div class="column2">{{$presentation->end}}</div>

        @can('update', $presentation)
        <div class="column2"><a href="/presentation/edit/{{$presentation->id}}"><x-redirectbutton type="submit" class="ml-11 bg-gray-500 hover:bg-gray-400">Edit</x-redirectbutton></a></div>
        <div class="column2"><form action="/presentation/delete/{{$presentation->id}}" method="post">
            @csrf
            <x-redirectbutton type="submit" class="mb-2 ml-2 bg-red-500 hover:bg-red-400">Delete</x-redirectbutton>
        </form></div>
        @endcan  
        
    </div>
    @endforeach


</div>
</div>
</div>
</x-app-layout>
