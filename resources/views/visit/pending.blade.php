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
        Pending visits
    </x-slot>
    @if ($user->conferences()->first() != null)
        <div class="py-12">
            <div class="heading1 max-w-7xl mx-auto sm:px-6 lg:px-8 pt-4 pb-4 bg-white overflow-hidden shadow-sm sm:rounded-t-lg">
                    <div class="column">Conference:</div>
                    <div class="column">Email:</div>
                    <div class="column">Status:</div>
            </div>
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 pt-4 pb-4 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                @foreach ($user->conferences as $conference)
                    <div class="column underline text-gray-600 hover:text-gray-900"><a href="/conference/{{ $conference->id }}">{{ $conference->title }}</a></div>
                    <div class="column">&nbsp</div>
                    <div class="column">&nbsp</div>
                    <div class="column">&nbsp</div>
                    @foreach ($conference->visitors as $request)
                        <div class="">
                            <div class="column text-center mt-2">+</div>
                            <div class="column mt-2">{{ $request->email }}</div>
                            <div class="column mt-2">{{ $request->pivot->status ? __('Accepted') : __('Pending...') }}</div>

                            <div class="column">
                                @if (!$request->pivot->status)
                                <form method="POST" action="/visit/{{ $request->pivot->id }}">
                                    @csrf
                                    @method('patch')
                                    <a class="ml-2" href="/visit/{{ $request->pivot->id }}">
                                        <x-button class="bg-green-700 mb-2 mt-2"
                                            onclick="event.preventDefault();
                                            this.closest('form').submit();">
                                            {{ __('Accept') }}
                                        </x-button>
                                    </a>
                                </form>

                                <form method="POST" action="/visit/{{ $request->pivot->id }}/delete">
                                    @csrf
                                    @method('delete')
                                    <a class="ml-2" href="/visit/{{ $request->pivot->id }}/delete">
                                        <x-button class="bg-red-900 mb-2 mt-2"
                                            onclick="event.preventDefault();
                                            this.closest('form').submit();">
                                            {{ __('Reject') }}
                                        </x-button>
                                    </a>
                                </form>
                                @else
                                    <x-button class="bg-gray-600 mb-2 mt-2">
                                        {{ __('Nothing to do...') }}
                                    </x-button>
                                @endif
                            </div>
                        </div>
                    @endforeach
                    @foreach ($conference->anons as $request)
                        <div class="pb-0">
                            <div class="column text-center mt-2">+</div>
                            <div class="column mt-2">{{ $request->email }}</div>
                            <div class="column mt-2">{{ $request->pivot->status ? __('Accepted') : __('Pending...') }}</div>

                            <div class="column">
                                @if (!$request->pivot->status)
                                <form method="POST" action="/visit/{{ $request->pivot->id }}">
                                    @csrf
                                    @method('patch')
                                    <a class="ml-2" href="/visit/{{ $request->pivot->id }}">
                                        <x-button class="bg-green-700 mb-2 mt-2"
                                            onclick="event.preventDefault();
                                            this.closest('form').submit();">
                                            {{ __('Accept') }}
                                        </x-button>
                                    </a>
                                </form>

                                <form method="POST" action="/visit/{{ $request->pivot->id }}/delete">
                                    @csrf
                                    @method('delete')
                                    <a class="ml-2" href="/visit/{{ $request->pivot->id }}/delete">
                                        <x-button class="bg-red-900 mb-2 mt-2"
                                            onclick="event.preventDefault();
                                            this.closest('form').submit();">
                                            {{ __('Reject') }}
                                        </x-button>
                                    </a>
                                </form>
                                @else
                                    <x-button class="bg-gray-600 mb-2 mt-2">
                                        {{ __('Nothing to do...') }}
                                    </x-button>
                                @endif
                            </div>
                        </div>
                    @endforeach
                @endforeach
            </div>
        </div>
    @endif
</x-app-layout>