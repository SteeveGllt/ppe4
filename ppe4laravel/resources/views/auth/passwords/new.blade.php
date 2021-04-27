@extends('welcome')
@section('content')
<div class="leading-loose flex justify-center">
    <form name="inscription" class="w-75  p-10 bg-white rounded shadow-xl" method="POST" action="" oninput='password2.setCustomValidity(password2.value != password.value ? "Les mots de passe ne correspondent pas." : "")'>
        <div class="md-form">
            <label for="password1" class="block text-sm text-gray-00">{{ __('Mot de passe') }}</label>
            <input id="password1" type="password" class="w-full px-3 py-1 text-gray-700 bg-gray-200 rounded validate" name="password" required autocomplete="new-password" placeholder="Mot de Passe">
            @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="md-form">
            <label for="password2" class="block text-sm text-gray-00">{{ __('Confirmer le mot de passe') }}</label>
            <input id="password2" type="password" class="w-full px-3 py-1 text-gray-700 bg-gray-200 rounded validate" name="password2" required placeHolder="Confirmer le mot de passe">
        </div>
        
        <div class="mt-4">
            <center>
            <button class="px-4 py-1 text-white font-light tracking-wider bg-gray-900 rounded" type="submit">Confirmer</button>
            </center>
        </div>
    </form>
</div>

@stop
