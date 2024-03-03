@extends('layouts.main')

@section('content')
@auth
    <h1>Witaj <strong>{{ Auth::user()->name }}</strong>!</h1>
@endauth
    <div class="max-w-md mx-auto mt-4 p-6 bg-gray-700 rounded-md">
        <h1 class="text-gray-100 text-center text-xl pb-2">Zaloguj się</h1>
        <form action="{{ route('login') }}" method="post">
            @csrf
            <div class="mb-4">
                <label for="email" class="block text-gray-400 font-bold mb-2">Email:</label>
                <input type="email" name="email" id="text" placeholder="Email" class="w-full p-2 rounded-md text-black @error('email') border-red-500 @enderror">
                @error('email')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="password" class="block text-gray-400 font-bold mb-2">Hasło:</label>
                <input type="password" name="password" id="password" placeholder="Hasło" class="w-full p-2 rounded-md text-black @error('password') border-red-500 @enderror">
                @error('password')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <input type="checkbox" name="remember" id="remember" class="mr-2">
                <label for="remember" class="text-gray-400">Zapamiętaj mnie</label>
            </div>

            <button type="submit" class="pl-8 pr-8 bg-blue-500 text-white p-2 rounded-full hover:bg-blue-600">Zaloguj</button>
        </form>

    </div>
@endsection
