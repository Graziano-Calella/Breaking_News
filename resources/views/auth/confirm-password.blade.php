<x-layout>
    <div class="container-fluid p-5 bg-success text-center text-white">
        <div class="row justify-content-center">
            <h1 class="display-1">
                Conferma password per accedere
            </h1>
        </div>
    </div>
    <div class="container p-5 bg-light">
        <div class="row justify-content-center mt-5">
            <div class="col-12 col-md-6">
                <form method="post" action="/user/confirm-password">
                    @csrf
                    <div class="mb-3">
                        <label for="password" class="form-label">Password:</label>
                        <input name="password" type="password" class="form-control @error('password') is-invalid @enderror" id="password">
                        @error('password')
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