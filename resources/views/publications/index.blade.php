<?php
?>
@extends('layouts.main')

@props(['publications'])

@section('content')
<h1 class="text-3xl uppercase text-center font-bold text-slate-900 bg-blue-800 w-fit-content mx-auto rounded-full py-4">Oto wszystkie publikacje:</h1>
<br><br>
<ul>
    @foreach ($publications as $publication)
        <li class="flex items-start">
        <a href="{{ url('/publications/' . $publication->id) }}" class="bg-blue-500 text-white px-4 py-2 rounded-full font-semibold mt-2">
            Więcej</a>
            <div class="ml-4">
                <p>
                <x-component :title="$publication->title" :content="$publication->zajawka" :author="$publication->author->name" />
                <span class="text-gray-500">{{ $publication->created_at->locale('pl')->diffForHumans() }}</span>
                </p>
            </div>
        </li>
    <br><br>
    @endforeach
</ul>
@endsection


