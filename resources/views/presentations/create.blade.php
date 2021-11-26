<x-app-layout>
    <x-slot name="header">
    </x-slot>


<div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-8 pb-4 bg-white overflow-hidden shadow-sm sm:rounded-lg">
<form action="/{{$key}}/request" enctype="multipart/form-data" method="POST">
    @csrf

    <div class="row mt-4">
        <div class="col-8 offset-1">

            <div class="form-group row">
                <label for="title" class="col-md-4 col-form-label text-md-right">Title for presentation:</label>

                <div class="col-md-6">
                    <input 
                    id="title"
                    type="text"
                    class="form-control @error('title') is-invalid @enderror"
                    name="title"
                    value="{{ old('title') }}" required
                    autocomplete="title" autofocus>

                    @error('title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="content" class="col-md-4 col-form-label text-md-right">Presentation text:</label>

                <div class="col-md-6">
                    <textarea style="resize: none;" id="content" name="content" type="text" class="form-control @error('content') is-invalid @enderror" value="{{ old('content') }}" autofocus></textarea>

                    @error('content')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div>
                    <x-button class="mt-4">
                        Create
                    </x-button>
                </div>
            </div>

        </div>
    </div>

</form>

</div>
</x-app-layout>