<x-layout>
    <div class="container-fluid p-5 bg-success text-center text-white">
        <div class="row justify-content-center">
            <h1 class="display-1">
                Controlla la mail
            </h1>
        </div>
    </div>
  
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-5 col-sm-12 mx-auto">
                <div class="card py-4">
                    <div class="card-body">
                        {{-- Inform user after click resend verification email button is successful --}}
                        @if (session('status') == 'verification-link-sent')
                            <div class="alert alert-success text-center">A new email verification link has been emailed to you!</div>
                        @endif
                        <div class="text-center mb-5">
                            {{-- Instructions for new users --}}
                            <h3>Verify e-mail address</h3>
                            <p>You must verify your email address to access this page.</p>
                        </div>
                        <form method="POST" action="{{ route('verification.send') }}" class="text-center">
                            @csrf
                            <button type="submit" class="btn btn-primary">Resend verification email</button>
                        </form>
                    </div>
                    {{-- Optional: Add this link to let user clear browser cache --}}
                    <p class="mt-3 mb-0 text-center"><small>Issues with the verification process or entered the wrong email?
                        <br>Please sign up with <a href="{{route('register-retry')}}">another</a> email address.</small></p>
                </div>
            </div>
        </div>
    </div>
    
</x-layout>