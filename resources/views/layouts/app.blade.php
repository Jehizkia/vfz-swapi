<!doctype html>
<html>
<head>
    <title>StarWars Universe</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="bg-gray-900">


<div class="container mx-auto">
    <h1 class="text-4xl font-bold text-center mt-24 text-yellow-300">
        StarWars Universe
    </h1>

    <p class="text-center text-gray-300 text-lg mt-3">Learn more about our universe</p>

    <div class="flex justify-center mt-4">
        <ul class="text-4xl space-x-4 ">
            @php
                $activeClass = 'text-yellow-300 underline hover:text-yellow-300 transition-colors';
                $inActiveClass = 'text-gray-500 hover:text-yellow-300 transition-colors';
                $currentRoute = request()->route()->getName();
            @endphp
            <a href="/" class=" {{ $currentRoute == 'people' || $currentRoute == 'index' ? $activeClass : $inActiveClass }} ">People</a>
            <a href="/planets" class="{{ $currentRoute == 'planets' ? $activeClass : $inActiveClass  }}">Planets</a>
            <a href="/species" class="{{ $currentRoute == 'species' ? $activeClass : $inActiveClass  }}">Species</a>
        </ul>
    </div>

    @yield('content')
</div>
</body>
</html>
