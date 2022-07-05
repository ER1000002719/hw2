@extends('layouts.sign')

@section('title', '| Login')

@section('script')
        <link rel="stylesheet" href="{{ asset('css/login.css') }}">
        <script src="{{ asset('js/login.js') }}" defer="true"></script>
@endsection
@section('Content')
<span>Login</span>

<form name="Form" action="{{url('/checkLogin')}}" method="POST">
@csrf
Username </br> <input type='text' name='user' class='textinput'> <span id='username-error'></span>
Password </br> <input type='password' name='pass' class='textinput'>  <span id='password-error'></span>
<span class='posterror'></span>
<input type='submit' id='submit' value='LOGIN'>
</form>

<a id='signup' href='/signup'>Non hai ancora un Account? Registrati adesso!</a>
@endsection
