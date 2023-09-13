<x-layout>
    <div class="container-fluid p-5 bg-success text-center text-white">
        <div class="row justify-content-center">
            <h1 class="display-1">
                Password dimenticata?
            </h1>
        </div>
    </div>
    <div class="container p-5 bg-light">
        <div class="row justify-content-center mt-5">
            <div class="col-12 col-md-6">
                @if (session('status'))
                    <div class="alert alert-success mb-4">
                        <p>{{session('status')}}</p>
                    </div>
                @endif
                <form method="post" action="/forgot-password">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">Indirizzo mail:</label>
                        <input name="email" type="email" class="form-control @error('email') is-invalid @enderror" id="email">
                        @error('email')
                            <span class="fst-italic text-danger small">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="d-flex justify-content-center pt-3">
                        <button class="btn btn-dark btn-lg btn-block" type="submit">Ottieni una nuova password!</button>
                    </div>
                </form>
            </div>
        </div>
</x-layout>