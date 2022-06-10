@extends('layouts.app')

@section('content')
    <div class="mt-8 grid gap-4 grid-cols-3 flex-wrap">
        @foreach($people as $person)
            <a href="/people/{{ $person->id }}"
               class="transition-all bg-gray-200 rounded-2xl shadow-xl shad p-4 shadow-gray-800 border-4 border-gray-200 hover:bg-yellow-200 hover:shadow-yellow-900 hover:border-yellow-400">

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
            </a>
        @endforeach
    </div>
@endsection
