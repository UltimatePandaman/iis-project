<x-app-layout>
    <x-slot name="header">
    </x-slot>


<div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-8 pb-4 bg-white overflow-hidden shadow-sm sm:rounded-lg">
<form action="/room/{{$room->id}}" enctype="multipart/form-data" method="POST">
    @csrf
    @method('PATCH')

    <div class="row mt-4">
        <div class="col-8 offset-1">

            <div class="form-group row">
                <label for="name" class="col-md-4 col-form-label text-md-right">Room name:</label>

                <div class="col-md-6">
                    <input 
                    id="name"
                    type="text"
                    class="form-control @error('name') is-invalid @enderror"
                    name="name"
                    value="{{ old('name') ?? $room->name }}" required
                    autocomplete="name" autofocus>

                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="capacity" class="col-md-4 col-form-label text-md-right">capacity:</label>

                <div class="col-md-6">
                    <input 
                    id="capacity"
                    type="number"
                    class="form-control @error('capacity') is-invalid @enderror"
                    name="capacity"
                    value="{{ old('capacity') ?? $room->capacity }}" required
                    autocomplete="capacity" autofocus>

                    @error('capacity')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                </div>
            </div>

            <div class="row">
                <div>
                    <x-button class="mt-4">
                        Confirm changes
                    </x-button>
                </div>
            </div>

        </div>
    </div>

</form>

</div>
</x-app-layout>