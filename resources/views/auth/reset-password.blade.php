<x-layout>
    <div class="container-fluid p-5 bg-success text-center text-white">
        <div class="row justify-content-center">
            <h1 class="display-1">
                Cambia password!
            </h1>
        </div>
    </div>
    <div class="container p-5 bg-light">
        <div class="row justify-content-center mt-5">
            <div class="col-12 col-md-6">
                <form method="post" action="/reset-password">
                    @csrf
                    <input type="hidden" name="token" value="{{request()->route('token')}}">
                    <div class="mb-3">
                        <label for="email" class="form-label">Indirizzo mail:</label>
                        <input name="email" type="email" class="form-control @error('email') is-invalid @enderror" id="email" value="{{$request->email}}">
                        @error('email')
                            <span class="fst-italic text-danger small">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Nuova password:</label>
                        <input name="password" type="password" class="form-control @error('password') is-invalid @enderror" id="password">
                        @error('password')
                            <span class="fst-italic text-danger small">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label">Conferma Nuova password:</label>
                        <input name="password_confirmation" type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="password_confirmation">
                        @error('password_confirmation')
                            <span class="fst-italic text-danger small">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="d-flex justify-content-center pt-3">
                        <button class="btn btn-dark btn-lg btn-block" type="submit">Cambia password</button>
                    </div>
                </form>
            </div>
        </div>
</x-layout>