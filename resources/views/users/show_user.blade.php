@extends('layouts.main')

@section('content')
    <h1>{{ $user->name }}</h1>
    <p>Email: {{ $user->email }}</p>
    <p>Data utworzenia konta: {{ $user->created_at->toDateString() }}</p>

    <h2>Opublikowane wpisy:</h2>
    <ul>
        @foreach($user->publications as $publication)
            <li>
                <a class="text-blue-500" href="{{ route('publications.show', ['id' => $publication->id]) }}">
                    {{ $publication->title }}
                </a>
            </li>
        @endforeach
    </ul>
@endsection