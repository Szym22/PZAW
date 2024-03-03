@extends('layouts.main')

@section('content')
    <h1>Zarejestruj się</h1>
    <form action="{{route('UsersStore')}}" method="POST">
        @csrf
        <label for="name">Nazwa urzytkownika</label><br>
        <input class="text-black" type="text" name="name" placeholder="Nazwa urzytkownika...">
        @error('name')
            <p>{{ $message }}</p>
        @enderror
        <br>
        <label for="email">Email</label><br>
        <input class="text-black" type="email" name="email" placeholder="Email">
        @error('email')
            <p>{{ $message }}</p>
        @enderror
        <br>
        <label for="password">Hasło</label><br>
        <input class="text-black" type="password" name="password" placeholder="Podaj hasło..."><br>
        <label for="password_confirmation"></label><br>
        <input class="text-black" type="password" name="password_confirmation" placeholder="Podaj hasło ponownie...">
        @error('password')
            <p>{{ $message }}</p>
        @enderror
        <br><br>
        <button class="pl-8 pr-8 bg-blue-500 text-white p-2 rounded-full hover:bg-blue-600" type="submit">Zarejestruj</button>
    </form>
@endsection
