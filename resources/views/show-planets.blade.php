@extends('layouts.app')

@section('content')
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
@endsection
