@extends('layouts.main')

@section('content')
    <div class="ml-8">
        <h1 class="text-2xl mb-4">{{ $publication->title }}</h1>
        <p class="mb-4">{{ $publication->content }}</p>
        @if (is_null($publication->author->deleted_at))
            <p>{{$publication->author->name}}</p>
        @else
            <p><s>{{$publication->author->name}}</s></p>
        @endif
        <br>
        @auth
        <div class="flex items-center space-x-4">
            <a class="text-white uppercase font-bold bg-blue-500 rounded-full p-2 hover:bg-blue-600" href="{{ route('publications.edit', ['publication' => $publication->id]) }}">Edytuj</a>
            <form action="{{ route('publications.destroy', ['publication' => $publication->id]) }}" method="POST">
                @csrf
                @method('DELETE')

                <button class="text-white uppercase font-bold bg-blue-500 rounded-full p-2 hover:bg-blue-600" type="submit">Usuń</button>
            </form>
        </div>
        <br><br>
        @else
        <br>
        <form action="{{ route('comment.store') }}" method="POST">
            @csrf
            
            <div class="mb-4">
                <label for="content" class="block text-gray-400 font-bold mb-2">Skomentuj:</label>
                <textarea class="w-full p-2 rounded-md text-black text-left @error('content') border-red-500 @enderror" name="content" id="content" cols="30" rows="5" placeholder="Napisz swój komentarz...">{{ old('content') }}</textarea>
                @error('content')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>
            <button type="submit" class="pl-8 pr-8 bg-blue-500 text-white p-2 rounded-full hover:bg-blue-600">Wyślij</button>
        </form>
        </a>
        <br><br>
        <h2 class="text-xl mb-2">Komentarze:</h2>

        @if ($comments->count() > 0)
            <ul>
                @foreach ($comments as $comment)
                    <li class="mb-2">
                        <p>{{$comment->author->name}}:</p> {{ $comment->text }}
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
    @endauth
@endsection
