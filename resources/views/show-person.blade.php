@extends('layouts.app')

@section('content')
    <div
        class=" max-w-xl mx-auto mt-8 bg-gray-200 rounded-2xl shadow-xl shadow-gray-800">
        <div class="p-8 bg-gradient-to-r from-yellow-300 to-yellow-500 relative rounded-t-2xl overflow-hidden">
            <p class="font-bold text-3xl text-gray-800">
                {{ $person->name }}
            </p>

            <p class="text-yellow-800 mt-2">
                A
                <span class="font-bold">
                        @if($person->specie)
                        {{$person->specie->name}}
                    @else
                        Unknown species
                    @endif
                    </span>

                @if($person->planet)
                    <span>
                        from
                            <span class="font-bold">
                                {{$person->planet->name}}
                            </span>
                        </span>
                @endif

            </p>

            <ul class="text-yellow-800 mt-2">
                <li><span class="font-bold mr-1">Height</span> {{ $person->height }}</li>
                <li><span class="font-bold mr-1">Hair color</span> {{ $person->hair_color }}</li>
                <li><span class="font-bold mr-1">Mass</span> {{ $person->mass }}</li>
                <li><span class="font-bold mr-1">Birth year</span> {{ $person->birth_year }}</li>
                <li><span class="font-bold mr-1">Gender</span> {{ $person->gender }}</li>
            </ul>
        </div>

        <div class="p-8">
            @if($person->planet)
                <p class="text-2xl font-bold text-gray-700">Origin</p>
                <ul class="mt-2 text-gray-600">
                    <li>Name: {{ $person->planet->name }}</li>
                    <li>Rotation period: {{ $person->planet->rotation_period }}</li>
                    <li>Obital period: {{ $person->planet->orbital_period }}</li>
                    <li>Diameter: {{ $person->planet->diameter }}</li>
                    <li>Climate: {{ $person->planet->climate }}</li>
                    <li>Gravity: {{ $person->planet->gravity }}</li>
                    <li>Terrain: {{ $person->planet->terrain }}</li>
                    <li>Surface water: {{ $person->planet->surface_water }}</li>
                    <li>Population: {{ $person->planet->population }}</li>
                </ul>
            @endif

            @if($person->specie)
                <p class="text-2xl mt-8 font-bold text-gray-700">Specie</p>
                <ul class="mt-2 text-gray-600">
                    <li>Name: {{ $person->specie->name }}</li>
                    <li>Classification: {{ $person->specie->classification }}</li>
                    <li>Designation: {{ $person->specie->designation }}</li>
                    <li>Average height: {{ $person->specie->average_height }}</li>
                    <li>Hair colors: {{ $person->specie->hair_colors }}</li>
                    <li>Eye colors: {{ $person->specie->eye_colors }}</li>
                    <li>Average lifespan: {{ $person->specie->average_lifespan }}</li>
                    <li>Language: {{ $person->specie->language }}</li>
                </ul>
            @endif
        </div>
    </div>
@endsection
