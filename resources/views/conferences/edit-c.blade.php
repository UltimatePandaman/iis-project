<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl">
        Edit your conference
        </h2>
    </x-slot>

    <form action="/conference/{{$conference->id}}" enctype="multipart/form-data" method="POST">
        @csrf
        @method('PATCH')
    
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 pt-2 mt-8 pb-4 bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="col-8 offset-1">
    
                <div class="form-group row">
                    <label for="title" class="col-md-4 col-form-label text-md-right">Title for conference:</label>
    
                    <div class="col-md-6">
                        <input 
                        id="title"
                        type="text"
                        class="form-control @error('title') is-invalid @enderror"
                        name="title"
                        value="{{ old('title') ?? $conference->title }}" required
                        autocomplete="title" autofocus>
    
                        @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="capacity" class="col-md-4 col-form-label text-md-right">Capacity:</label>
    
                    <div class="col-md-6">
                        <input id="capacity" name="capacity" type="number" class="form-control @error('capacity') is-invalid @enderror" value="{{ old('capacity') ?? $conference->capacity }}" required autocomplete="capacity" autofocus>
    
                        @error('capacity')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
    
                <div class="form-group row">
                    <label for="start" class="col-md-4 col-form-label text-md-right">Start date:</label>
    
                    <div class="col-md-6">
                        <input id="start" name="start" type="date" class="form-control @error('start') is-invalid @enderror" value="{{ old('start') ?? $conference->start }}" required autocomplete="start" autofocus>
    
                        @error('start')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
    
                <div class="form-group row">
                    <label for="end" class="col-md-4 col-form-label text-md-right">End date:</label>
    
                    <div class="col-md-6">
                        <input id="end" name="end" type="date" class="form-control @error('end') is-invalid @enderror" value="{{ old('end') ?? $conference->end }}" required autocomplete="end" autofocus>
    
                        @error('end')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
    
                <div class="form-group row">
                    <label for="description" class="col-md-4 col-form-label text-md-right">Description for conference:</label>
    
                    <div class="col-md-6">
                        <textarea style="resize: none;" id="description" name="description" type="text" class="form-control @error('description') is-invalid @enderror" autofocus>{{ old('description') ?? $conference->description }}</textarea>
    
                        @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
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
</x-app-layout>