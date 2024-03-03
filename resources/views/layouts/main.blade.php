<?php

$json = json_decode(file_get_contents(base_path('composer.json')), true);

$projectName = $json['name'];
?>

<!DOCTYPE html>
<html lang="pl">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>{{ $projectName }}</title>
        <script src="https://cdn.tailwindcss.com"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

        <style type="text/tailwindcss">
            @layer utilities {
              .heading {
                content-visibility: auto;
              }
            }
        </style>
    </head>
    <body class="dark bg-slate-100 dark:bg-slate-900 text-white">   

    @include('publications.alerts')

    <div class="flex bg-slate-100 dark:bg-slate-900 text-white h-screen">
<div class="bg-green-500 p-4 w-1/5 h-screen">
   
    <img src="{{asset("images/logo.png")}}" alt="Logo" class="w-16 h-16 mb-4" />

    <ul class="space-y-2">
    <div>
    <li>
        <a class="text-white uppercase font-bold flex items-center justify-center bg-blue-500 rounded-full p-2 hover:bg-blue-600" href="{{  route('home') }}">
            <i class="fas fa-home text-2xl mr-2"></i>Home
        </a>
    </li>
</div>
<div>
    <li>
        <a class="text-white uppercase font-bold flex items-center justify-center bg-blue-500 rounded-full p-2 hover:bg-blue-600" href="{{  route('about_us') }}">
            <i class="fas fa-info text-2xl mr-2"></i>About us
        </a>
    </li>
</div>
<div>
    <li>
        <a class="text-white uppercase font-bold flex items-center justify-center bg-blue-500 rounded-full p-2 hover:bg-blue-600" href="{{ route('publications.index') }}">
            <i class="fas fa-book text-2xl mr-2"></i>Publications
        </a>
    </li>
</div>
    </ul>

    <br><br>

    @auth
                <h1>Witaj <strong>{{ Auth::user()->name }}</strong>!</h1>
	                <form action="{{ route('logout') }}" method="POST">
    		    @csrf
    		            <input type="submit" value="Wyloguj" />
	                </form>
                @else
                    <a href="{{ route('login_user') }}"><button class="text-2xl uppercase font-bold rounded-full bg-blue-500 text-white p-4 mt-auto w-full hover:bg-blue-600">Login</button></a>
    @endauth
    <br><br>
    <a href="{{ route('register') }}"><button class="text-2xl uppercase font-bold rounded-full bg-blue-500 text-white p-4 mt-auto w-full hover:bg-blue-600">Register</button></a>
  </div>
  
  <foot class="bg-gray-800 py-4 text-white text-center fixed bottom-0 w-full"> <!-- Stopka -->
    Copyright 2023 Szymon Modrzewski
</foot>


  <main class="p-4 flex-1">
   
    @yield('content')
  </main>
</div>

    </body>
</html>


