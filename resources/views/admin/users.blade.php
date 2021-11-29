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



<div class="py-12">
<div class="heading1 max-w-7xl mx-auto sm:px-6 lg:px-8 pt-4 pb-4 bg-white overflow-hidden shadow-sm sm:rounded-t-lg">
        <div class="column">Name:</div>
        <div class="column">Email:</div>
        <div class="column">Username:</div>
        <div class="column"><a href="/user/create"><x-redirectbutton style="float: right;" type="submit" class="bg-green-500 hover:bg-green-400">Add</x-redirectbutton></a></div>
</div>
<div class="max-w-7xl mx-auto sm:px-6 lg:px-8 pt-4 pb-4 bg-white overflow-hidden shadow-sm sm:rounded-lg">
    @foreach ($users as $user)
        <div class="row">
        <div class="column">{{$user->name}}</div>
        <div class="column">{{$user->email}}</div>
        <div class="column">{{$user->username}}</div>
        <a href="/user/{{$user->id}}/edit"><x-redirectbutton type="submit" class="mb-2 ml-2 bg-gray-500 hover:bg-gray-400">Edit</x-redirectbutton></a>
        <form action="/user/{{$user->id}}/delete" method="post">
            @csrf
            <x-redirectbutton type="submit" class="mb-2 ml-2 bg-red-500 hover:bg-red-400">Delete</x-redirectbutton>
        </form>
    </div>
    @endforeach
</div>
</div>

</x-app-layout>