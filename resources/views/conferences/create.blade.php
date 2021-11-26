<x-app-layout>
    <x-slot name="header">
    </x-slot>

<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
<form action="/c" enctype="multipart/form-data" method="POST">
    @csrf

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
                <label for="from" class="col-md-4 col-form-label text-md-right">Start date:</label>

                <div class="col-md-6">
                    <input id="from" name="from" type="date" class="form-control @error('from') is-invalid @enderror" value="{{ old('from') }}" required autocomplete="from" autofocus>

                    @error('from')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="to" class="col-md-4 col-form-label text-md-right">End date:</label>

                <div class="col-md-6">
                    <input id="to" name="to" type="date" class="form-control @error('to') is-invalid @enderror" value="{{ old('to') }}" required autocomplete="to" autofocus>

                    @error('to')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="description" class="col-md-4 col-form-label text-md-right">Description for conference:</label>

                <div class="col-md-6">
                    <textarea style="resize: none;" id="description" name="description" type="text" class="form-control @error('description') is-invalid @enderror" value="{{ old('description') }}" autofocus></textarea>

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
                        Create
                    </x-button>
                </div>
            </div>

        </div>
    </div>

</form>

</div>
</x-app-layout>