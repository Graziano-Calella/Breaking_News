<x-layout>
    <div class="container-fluid p-5 bg-success text-center text-white">
        <div class="row justify-content-center">
            <h1 class="display-1">
                Accedi
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
                @if (session('status'))
                    <div class="alert alert-success mb-4">
                        <p>{{session('status')}}</p>
                    </div>
                @endif
                <form class="card p-5 shadow" action="{{route('login')}}" method="post">
                    @csrf
                    <div class="mb-3">
                        <a href="/auth/google/redirect" class="btn btn-success">GOOGLE</a>
                        <a href="/auth/github/redirect" class="btn btn-dark">GIT HUB</a>
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
                    <div class="mb-3 form-check">
                        <input name="remember" type="checkbox" class="form-check-input" id="remember">
                        <label for="remember" class="form-check-label">Ricordati di me</label>
                    </div>
                    <div class="mt-2">
                        <button type="submit" class="btn bg-info text-white">Accedi</button>
                        <p class="small mt-2">Non sei registrato? <a href="{{route('register')}}">Clicca qui</a></p>
                        <a class="small text-muted" href="/forgot-password">Hai dimenticato la password?</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout>