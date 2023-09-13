<x-layout>
    <div class="container-fluid p-5 bg-danger text-center text-white">
        <div class="row justify-content-center">
            <h1 class="display-1">
                Registrati
            </h1>
        </div>
    </div>
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-6">
                {{-- @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif --}}
                <form class="card p-5 shadow" action="{{route('register')}}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Username:</label>
                        <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" id="name" value="{{old('name')}}">
                        @error('name')
                            <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email:</label>
                        <input name="email" type="email" class="form-control @error('email') is-invalid @enderror" id="email" value="{{old('email')}}">
                        @error('email')
                            <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password:</label>
                        <input name="password" type="password" class="form-control @error('password') is-invalid @enderror" id="password">
                        @error('password')
                            <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label">Conferma Password:</label>
                        <input name="password_confirmation" type="password" class="form-control" id="password_confirmation">
                    </div>
                    <div class="mt-2">
                        <button type="submit" class="btn bg-info text-white">Registrati</button>
                        <p class="small mt-2">Già registrato? <a href="{{route('login')}}">Clicca qui</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout>