<x-layout>
    <div class="container-fluid p-5 bg-success text-center text-white">
        <div class="row justify-content-center">
            <h1 class="display-1">
                Profilo Utente
            </h1>
        </div>
    </div>
    <div class="container p-5 bg-light">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8">
                @if (session('status') === 'profile-information-updated')
                    <div class="alert alert-success mb-4">
                        <p>Hai aggiornato correttamente il tuo profilo</p>
                    </div>
                @endif
                @if (session('status') === 'password-updated')
                    <div class="alert alert-success mb-4">
                        <p>Hai aggiornato correttamente la tua password</p>
                    </div>
                @endif
                <div class="card p-3">
                    <p>Username: {{Auth::user()->name}}</p>
                    <p>Email: {{Auth::user()->email}}</p>
                    <p>Verificato: <i class="{{Auth::user()->email_verified_at ? 'fa-sharp fa-solid fa-circle-check text-success' : 'fa-solid fa-cirle-xmark text-danger'}}"></i></p>
                    <p>Utente creato il: {{Auth::user()->created_at->format('d/m/Y')}}</p>
                    <p>Utente aggiornato il: {{Auth::user()->updated_at->format('d/m/Y')}}</p>
                </div>
            </div>
        </div>
        <div class="row justify-content-center mt-5">
            <div class="col-12 col-md-9 my-5">
                <h2 class="display-6 text-uppercase text-center">Aggiorna informazioni profilo</h2>
            </div>
            <div class="col-12 col-md-4">
                <form method="post" action="/user/profile-information">
                    @csrf
                    @method('put')
                    <div class="mb-3">
                        <label for="name" class="form-label">Username:</label>
                        <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" id="name" value="{{Auth::user()->name}}">
                        @error('name')
                            <span class="fst-italic text-danger small">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email:</label>
                        <input name="email" type="email" class="form-control @error('email') is-invalid @enderror" id="email" value="{{Auth::user()->email}}">
                        @error('email')
                            <span class="fst-italic text-danger small">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="d-flex justify-content-center pt-3">
                        <button class="btn btn-dark btn-lg btn-block" type="submit">Aggiorna dati</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="row justify-content-center mt-5">
            <div class="col-12 col-md-9 my-5">
                <h2 class="display-6 text-uppercase text-center">Aggiorna password</h2>
            </div>
            <div class="col-12 col-md-4">
                <form method="post" action="/user/password">
                    @csrf
                    @method('put')
                    <div class="mb-3">
                        <label for="current_password" class="form-label">Password attuale:</label>
                        <input name="current_password" type="password" class="form-control @error('current_password') is-invalid @enderror" id="current_password">
                        @error('current_password')
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
                        <button class="btn btn-dark btn-lg btn-block" type="submit">Aggiorna password</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="row justify-content-center mt-5">
            <div class="col-12 col-md-9 my-5">
                <h2 class="display-6 text-uppercase text-center">Autenticazione a due fattori</h2>
            </div>
            <div class="col-12 col-md-4">
                @if (session('status') == 'two-factor-authentication-disabled')
                    <div class="alert alert-success" role="alert">
                        <p>Autenticazione a due fattori disattivata</p>
                    </div>
                @endif
                @if (session('status') == 'two-factor-authentication-enabled')
                    <div class="alert alert-success" role="alert">
                        <p>Autenticazione a due fattori attivata</p>
                    </div>
                @endif
                <form method="post" action="/user/two-factor-authentication">
                    @csrf
                    <div class="mb-3">
                        @if (Auth::user()->two_factor_secret)
                            @method('DELETE')
               
                            <div class="mb-3 d-flex justify-content-center">
                                {!! Auth::user()->twoFactorQrCodeSvg() !!}
                            </div>
                            <div class="mb-3 d-flex justify-content-center">
                                <p>{{decrypt(Auth::user()->two_factor_secret)}}</p>
                            </div>
                            
                            <div class="d-flex justify-content-center">
                                <button class="btn btn-danger">Disable</button>
                            </div>
                        @else
                            <div class="d-flex justify-content-center">
                                <button class="btn btn-primary">Enable</button>
                            </div>
                        @endif
                    </div>
                </form>
                <form method="post" action="/user/two-factor-recovery-codes">
                    @csrf
                    @if (Auth::user()->two_factor_secret)
                        <div class="mb-3 d-flex justify-content-center">
                            <div>
                                <h3>Codici di recupero:</h3>
                                <ul>
                                    @foreach (json_decode(decrypt(Auth::user()->two_factor_recovery_codes)) as $code)
                                        <li>{{$code}}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="mb-3 d-flex justify-content-center">
                            <button class="btn btn-primary">Rigenera codici</button>
                        </div>
                    @endif
                </form>
            </div>
        </div>
    </div>
</x-layout>