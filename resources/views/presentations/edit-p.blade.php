<x-app-layout>
    <x-slot name="header">
        Confirm presentation
    </x-slot>

    <form action="/presentation/{{$presentation->id}}" enctype="multipart/form-data" method="POST">
        @csrf
        @method('PATCH')
    
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 pt-2 mt-8 pb-4 bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="col-8 offset-1">
    
                <div class="form-group row">
                    <label for="date" class="col-md-4 col-form-label text-md-right">Presentation date:</label>
    
                    <div class="col-md-6">
                        <input id="date" name="date" type="date" class="form-control @error('date') is-invalid @enderror" value="{{ old('date')  }}" required autocomplete="date" autofocus>
    
                        @error('date')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
    
                <div class="form-group row">
                    <label for="start" class="col-md-4 col-form-label text-md-right">Starts:</label>
    
                    <div class="col-md-6">
                        <input id="start" name="start" type="time" class="form-control @error('start') is-invalid @enderror" value="{{ old('start') }}" required autocomplete="start" autofocus>
    
                        @error('start')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
    
                <div class="form-group row">
                    <label for="end" class="col-md-4 col-form-label text-md-right">Ends:</label>
    
                    <div class="col-md-6">
                        <input id="end" name="end" type="time" class="form-control @error('end') is-invalid @enderror" value="{{ old('end') }}" required autocomplete="end" autofocus>
    
                        @error('end')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
    
                <div class="row">
                    <div>
                        <x-button class="mt-4">
                            Confirm
                        </x-button>
                    </div>
                </div>
    
            </div>
        </div>
    
    </form>
</x-app-layout>