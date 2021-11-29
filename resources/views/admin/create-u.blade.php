<x-app-layout>
    <x-slot name="header">
    </x-slot>

<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
<form action="/user/create" enctype="multipart/form-data" method="POST">
    @csrf

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 pt-2 mt-8 pb-4 bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="col-8 offset-1">

            <div class="form-group row">
                <label for="name" class="col-md-4 col-form-label text-md-right">Name:</label>

                <div class="col-md-6">
                    <input 
                    id="name"
                    type="text"
                    class="form-control @error('name') is-invalid @enderror"
                    name="name"
                    value="{{ old('name') }}" required
                    autocomplete="name" autofocus>

                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="username" class="col-md-4 col-form-label text-md-right">Username:</label>

                <div class="col-md-6">
                    <input 
                    id="username"
                    type="text"
                    class="form-control @error('username') is-invalid @enderror"
                    name="username"
                    value="{{ old('username') }}" required
                    autocomplete="username" autofocus>

                    @error('username')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="email" class="col-md-4 col-form-label text-md-right">Email:</label>

                <div class="col-md-6">
                    <input id="email" name="email" type="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required autocomplete="email" autofocus>

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="password" class="col-md-4 col-form-label text-md-right">Password:</label>

                <div class="col-md-6">
                <input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
                </div>
            </div>

            <div class="form-group row">
                <label for="password_confirmation">Confirm password:</label>

                <div class="col-md-6">
                <input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required />
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