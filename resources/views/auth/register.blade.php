@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                <span class="text-danger fw-bold p-1" id="nameError" style="display: none"></span>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                <span class="text-danger fw-bold p-1" id="emailError" style="display: none"></span>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                <span class="text-danger fw-bold p-1" id="passwordError" style="display: none"></span>

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                <span class="text-danger fw-bold p-1" id="password-confirmError" style="display: none"></span>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary" id="registerBtn" disabled>
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    
const form = document.querySelector('form');
const registerBtn = document.getElementById('registerBtn');

form.addEventListener('keyup', function() {


    
    if (name.value !==  '' && email.value !==  '' && password.value !== '' && password.value.length >= 8 && password.value == passwordConfirm.value) {
        registerBtn.disabled = false;
    }


});

const name = document.querySelector('#name');
const nameError = document.querySelector('#nameError');


name.addEventListener('keyup', function() {

    if (name.value == '' || name.value.length < 3) 
    {
        nameError.innerHTML = 'Veuillez entrer un Nom plus de 3 caractères';
        nameError.style.display = 'block';
    }
    else
    {
        nameError.style.display = 'none';
        registerBtn.disabled = true;
    }

})


const email = document.querySelector('#email');
const emailError = document.querySelector('#emailError');

email.addEventListener('keyup', function() {

    if (email.value == '' || email.value.length < 6) {
        emailError.innerHTML = 'Veuillez entrer un email valide';
        emailError.style.display = 'block';
    }else{
        emailError.style.display = 'none';
        registerBtn.disabled = true;
    }

})


const password = document.querySelector('#password');
const passwordError = document.querySelector('#passwordError');

password.addEventListener('keyup', function() {
    if (password.value == '' || password.value.length < 8) {
        passwordError.innerHTML = 'Entrez un mot de passe contenant plus de 8 caractères';
        passwordError.style.display = 'block';
    } else {
        passwordError.style.display = 'none';
        registerBtn.disabled = true;

    }
})


const passwordConfirm = document.querySelector('#password-confirm');
const passwordConfirmError = document.querySelector('#password-confirmError');

passwordConfirm.addEventListener('keyup', function() {
    if ((password.value != passwordConfirm.value) || passwordConfirm.value.length < 8) 
    {
        passwordConfirmError.innerHTML = 'Le mot de passe ne correspond pas';
        passwordConfirmError.style.display = 'block';
    } 
    else 
    {
        passwordConfirmError.style.display = 'none';
        registerBtn.disabled = true;

    }
})




</script>
@endsection
