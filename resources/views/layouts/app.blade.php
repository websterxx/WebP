<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Maintenance</title>
    <link rel="stylesheet" href="{{ mix('css/app.css')}}">
</head>
<body class="bg-gray-200">
    <nav class="p-6 bg-white flex justify-between mb-6">
        <ul class="flex items-center">
            <li>
                <a href="/" class="p-3">Home</a>
            </li>
            @auth
            @if (auth()->user()->right == 1)
            <li>
                <a href="{{ route('dashboard')}}" class="p-3">Dashboard</a>
            </li>
            <li>
                <a href="{{ route('ressources')}}" class="p-3">Ressources</a>
            </li>
            <li>
                <a href="{{ route('createRessource')}}" class="p-3">Create Ressource</a>
            </li>
            @else
            <li>
                <a href="{{ route('createuser')}}" class="p-3">Create User</a>
            </li>
            <li>
                <a href="{{ route('listusers')}}" class="p-3">List users</a>
            </li>
            @endif

            @endauth
        </ul>

        <ul class="flex items-center">
            @auth
            <li>
                <a href="" class="p-3">{{ auth()->user()->name }}</a>
            </li>
            <li>
                <form action="{{ route('logout')}}" method="POST" class="p-3 inline">
                    @csrf
                    <button type="submit" >logout</button>
                </form>
            </li>
            @endauth

            @guest      
            <li>
                <a href="{{ route('login')}}" class="p-3">Login</a>
            </li>  
            @endguest

        </ul>
    </nav>
    
    @yield('content')
</body>
</html>