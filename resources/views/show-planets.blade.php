<!doctype html>
<html>
<head>
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
            <a href="/" class="text-gray-500 hover:text-yellow-300 transition-colors">People</a>
            <a href="/planets" class=" text-yellow-300 underline hover:text-yellow-300 transition-colors">Planets</a>
            <a href="/species" class="text-gray-500 hover:text-yellow-300 transition-colors">Species</a>
        </ul>
    </div>

    <div class="mt-8 grid gap-4 grid-cols-3 flex-wrap">
        @foreach($planets as $planet)
            <div
               class="transition-all bg-gray-200 rounded-2xl shadow-xl shad p-4 shadow-gray-800 border-4 border-gray-200 ">

                <p class="font-bold text-2xl text-gray-800">
                    {{ $planet->name }}
                </p>

                <ul class="mt-3 text-gray-700">
                    <li><span class="font-bold">Population:</span> {{ $planet->population }}</li>
                    <li><span class="font-bold">Climate:</span> {{ $planet->climate }}</li>
                    <li><span class="font-bold">Terrain:</span> {{ $planet->terrain }}</li>
                    @if(count($planet->species))
                        <li>
                            <span class="font-bold">Species:</span> {{ $planet->species->pluck('name')->implode(', ') }}
                        </li>
                    @endif
                </ul>

                @if(count($planet->people) > 0)
                    <div class="mt-4" x-data="{showPeople: false}">
                        <button @click="showPeople= !showPeople" class="font-bold transition-color underline hover:text-yellow-500">
                         <span x-show="!showPeople">Show</span>
                         <span x-show="showPeople">Hide</span>
                            people that live here
                        </button>

                        <ul class="bg-gray-300 shadow-inner rounded-lg p-4 mt-4" x-show="showPeople">
                            @foreach($planet->people as $person)
                                <li><a class="transition-color hover:underline hover:text-yellow-500" href="/people/{{ $person->id }}">{{ $person->name }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
        @endforeach
    </div>
</div>
</body>
</html>
