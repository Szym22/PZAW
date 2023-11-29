@extends('layouts.main')
    <ol>
    @foreach ($publications as $publication)
        <li>
        <x-component title='{{ $publication["title"] }}' content='{{ $publication["content"] }}' author='{{ $publication["author"] }}' author_id='{{ $publication["id_author"] }}'></x-component>
        </li>
    @endforeach
    </ol>


