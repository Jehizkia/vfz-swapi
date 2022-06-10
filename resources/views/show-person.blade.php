@extends('layouts.app')

@section('content')
    <div
        class="w-full mt-8 bg-gray-200 rounded-2xl shadow-xl shad p-4 shadow-gray-800 border-4 border-gray-200 ">

        <p class="font-bold text-2xl text-gray-800">
            {{ $person->name }}
        </p>

        <p class="text-gray-500">
            A
            <span class="font-bold§">
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

        {{ $person->attributes }}

        <p class="mt-8 text-2xl text-gray-700">General info</p>
        <ul class="text-gray-600 mt-2">
            @foreach($person->getAttributes() as $key => $property)
                <li> {{ $key }} : <span class="font-bold"> {{ $property }}</span></li>
            @endforeach
        </ul>

        @if($person->planet)
            <p class="text-2xl mt-8 text-gray-700">Origin</p>
            <ul class="mt-2 text-gray-600">
                @foreach($person->planet->getAttributes() as $key => $property)
                    <li> {{ $key }} : <span class="font-bold"> {{ $property }}</span></li>
                @endforeach
            </ul>
        @endif

        @if($person->specie)
            <p class="text-2xl mt-8 text-gray-700">Specie</p>
            <ul class="mt-2 text-gray-600">
                @foreach($person->specie->getAttributes() as $key => $property)
                    <li> {{ $key }} : <span class="font-bold"> {{ $property }}</span></li>
                @endforeach
            </ul>
        @endif

    </div>
@endsection
