@extends('layouts.app')

@section('content')
    <div class="mt-8 grid gap-4 grid-cols-3 flex-wrap">
        @foreach($species as $specie)
            <div
                class="transition-all bg-gray-200 rounded-2xl shadow-xl shad p-4 shadow-gray-800 border-4 border-gray-200 ">

                <p class="font-bold text-2xl text-gray-800">
                    {{ $specie->name }}
                </p>

                <ul class="mt-3 text-gray-700">
                    <li><span class="font-bold">Language:</span> {{ $specie->language }}</li>
                    <li><span class="font-bold">Average lifespan:</span> {{ $specie->average_lifespan }}</li>
                    <li><span class="font-bold">Classification:</span> {{ $specie->classification }}</li>
                    @isset($species->planet)
                        <li><span class="font-bold">Planet:</span> {{ $specie->planet->name }}</li>
                    @endisset
                </ul>

                @if(count($specie->people) > 0)
                    <div class="mt-4" x-data="{showPeople: false}">
                        <button @click="showPeople= !showPeople" class="font-bold transition-color underline hover:text-yellow-500">
                            <span x-show="!showPeople">Show</span>
                            <span x-show="showPeople">Hide</span>
                            people
                        </button>

                        <ul class="bg-gray-300 shadow-inner rounded-lg p-4 mt-4" x-show="showPeople">
                            @foreach($specie->people as $person)
                                <li><a class="transition-color hover:underline hover:text-yellow-500" href="/people/{{ $person->id }}">{{ $person->name }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
        @endforeach
    </div>
@endsection
