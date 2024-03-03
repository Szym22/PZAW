@extends('layouts.main')

@php
    $action = route('publications.store');
    $title = old('title');
    $content = old('content');
    $author_id = null;
    $header = "Tworzenie nowej publikacji";

    if (! empty($publication)) {
        $action = route('publications.update', ['publication' => $publication->id]);
        $title = $publication->title;
        $content = $publication->content;
        $author_id = $publication->author_id;
        $header = "Edycja publikacji";
    }
@endphp


@section('content')

<form action="{{$action}}" method="POST" class="max-w-md mx-auto mt-4 p-6 bg-gray-700 rounded-md">
    @if (! empty($publication))
        @method('PUT')
    @endif
    
    @csrf
    <h1 class="text-gray-100 text-center text-xl pb-2">{{$header}}</h1>
    <div class="mb-4">
        <label for="title" class="block text-gray-400 font-bold mb-2">Tytuł:</label>
        <input  value="{{$title}}" type="text" name="title" id="title" placeholder="Tytuł" class="w-full p-2 rounded-md text-black @error('title') border-red-500 @enderror">
        @error('title')
            <p class="text-red-500 text-xs italic">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-4">
        <label for="content" class="block text-gray-400 font-bold mb-2">Treść:</label>
        <textarea class="w-full p-2 rounded-md text-black text-left @error('content') border-red-500 @enderror" name="content" id="" cols="30" rows="10" placeholder="Treść...">{{$content}}</textarea>
        @error('content')
            <p class="text-red-500 text-xs italic">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-4">
    <label for="author_id">Autor</label><br>
    <input  value="{{$author_id}}" type="text" name="author_id" id="author_id" placeholder="ID Author" class="w-full p-2 rounded-md text-black @error('author_id') border-red-500 @enderror">
        @error('author_id')
            <p class="text-red-500 text-xs italic">{{ $message }}</p>
        @enderror
    </div>

    <button type="submit" name="save" class="pl-8 pr-8 bg-blue-500 text-white p-2 rounded-full hover:bg-blue-600">Zapisz</button>
</form>

@endsection
