@extends('layouts.main')

@section('content')
<h1 class="text-3xl uppercase text-center font-bold text-slate-900 bg-blue-800 w-fit-content mx-auto rounded-full py-4">Witaj na naszej stronie!</h1>

<br><br>
@auth
<h1>Witaj <strong>{{ Auth::user()->name }}</strong>!</h1>
@else
<h1>Nie jesteś zalogowany zaloguj się</h1>
<br>
<p class="ml-8">Dzisiaj jest {{ $date }}</p>

    <br><br>

    <h2>Najnowsza publikacja:</h2>
    <p>Tytuł: {{ $latestPublication->title }}</p>
    <p>Zawartość: {{ $latestPublication->content }}</p>
    <p>Data utworzenia: {{ $latestPublication->created_at->format('Y-m-d H:i:s') }}</p>
    <p>Autor: {{ $latestPublication->author->name }}</p>
@endauth
@endsection





