<x-layout>
    <div class="container-fluid p-5 bg-success text-center text-white">
        <div class="row justify-content-center">
            <h1 class="display-1">
                Inserisci il codice di autenticazione per loggarti
            </h1>
        </div>
    </div>
    <div class="container p-5 bg-light">
        <div class="row justify-content-center mt-5">
            <div class="col-12 col-md-6">
                <form method="post" action="{{route('two-factor.login')}}">
                    @csrf
                    <div class="mb-3">
                        <label for="code" class="form-label">Codice:</label>
                        <input name="code" type="text" class="form-control @error('code') is-invalid @enderror" id="code">
                        @error('code')
                            <span class="fst-italic text-danger small">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="d-flex justify-content-center pt-3">
                        <button class="btn btn-dark btn-lg btn-block" type="submit">Conferma</button>
                    </div>
                </form>
            </div>
            <div class="col-12 col-md-6">
                <form method="post" action="{{route('two-factor.login')}}">
                    @csrf
                    <div class="mb-3">
                        <label for="recovery_code" class="form-label">Codice di recupero:</label>
                        <input name="recovery_code" type="text" class="form-control @error('recovery_code') is-invalid @enderror" id="recovery_code">
                        @error('recovery_code')
                            <span class="fst-italic text-danger small">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="d-flex justify-content-center pt-3">
                        <button class="btn btn-dark btn-lg btn-block" type="submit">Conferma</button>
                    </div>
                </form>
            </div>
        </div>
</x-layout>