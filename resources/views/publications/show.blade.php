@extends('layouts.main')

@section('content')
    <div class="ml-8">
        <h1 class="text-2xl mb-4">{{ $publication->title }}</h1>
        <p class="mb-4">{{ $publication->content }}</p>
        <p>{{ $publication->author->name }}</p>
        <br><br>

        <h2 class="text-xl mb-2">Komentarze:</h2>

        @if ($comments->count() > 0)
            <ul>
                @foreach ($comments as $comment)
                    <li class="mb-2">
                    <h3>{{ $comment->author_id }}:</h3> {{ $comment->text }}
                    </li>
                    <br><br>
                @endforeach
            </ul>
        @else
            <p>Brak komentarzy!</p>
        @endif

        <br><br>
        <a class="text-white uppercase font-bold flex items-center justify-center bg-blue-500 rounded-full p-2 hover:bg-blue-600" href="{{ route('publications.index') }}">
            <i class="fas fa-book text-2xl mr-2"></i>Wróć
        </a>
    </div>
@endsection

