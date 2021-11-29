
<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl">
            Conferences
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 pb-4"><a href="c/create"><x-redirectbutton>Create new conference</x-redirectbutton></a></div>

        <div class= "max-w-7xl mx-auto sm:px-6 lg:px-8 pb-4 bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="row">
                @foreach ($conferences as $conference)
                    <div class="flex justify-between items-center mb-2 mt-2">
                        <div class="">
                            <x-nav-link class="mr-5 pt-5" href="/conference/{{$conference->id}}">{{$conference->title}}</x-nav-link>
                            <div class="row">Capacity: {{ $conference->visitors->count()+$conference->anons->count() }}/{{$conference->capacity}}</div>
                            <div class="row pt-2">{{$conference->description}}</div>
                        </div>
                        @if(Auth::check())
                            <div class="flex items-center">
                                {{$conference->price}},- €
                                <form method="POST" action="{{ route('visit.store', ['conference' => $conference]) }}">
                                    @csrf
                                    <a class="ml-2" href="{{ route('visit.store', ['conference' => $conference]) }}">
                                        <x-buybutton 
                                            onclick="event.preventDefault();
                                            this.closest('form').submit();">
                                            {{ __('Buy Conference') }}
                                        </x-buybutton>
                                    </a>
                                </form>
                            </div>
                        @else
                            <div class="flex items-center">
                                {{$conference->price}},- €
                                <a class="ml-2" href="{{ route('visit.edit', ['conference' => $conference]) }}">
                                    <x-buybutton>
                                        Buy Conference
                                    </x-buybutton>
                                </a>
                            </div>
                        @endif
                    </div>
                @endforeach
                </div>
            </div>
        </div>
    </div>
    <script>
        window.onload = function(){
            if('{{Session::has('alert')}}'){
            alert('{{Session::get('alert')}}');
            }
        }
      </script>
</x-app-layout>
