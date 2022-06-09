<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
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
            <a href="#" class="text-gray-500 hover:text-yellow-300 transition-colors">Species</a>
        </ul>
    </div>

    <div class="mt-8 grid gap-4 grid-cols-3 flex-wrap">
        @foreach($planets as $planet)
            <div
               class="transition-all bg-gray-200 rounded-2xl shadow-xl shad p-4 shadow-gray-800 border-4 border-gray-200 hover:bg-yellow-200 hover:shadow-yellow-900 hover:border-yellow-400">

                <p class="font-bold text-2xl text-gray-800">
                    {{ $planet->name }}
                </p>

                <p class="text-gray-500">

                </p>
            </div>
        @endforeach
    </div>
</div>
</body>
</html>
