@extends('layout')

@section('content')
    <div class="min-h-screen bg-gradient-to-br from-blue-500 to-indigo-600 p-6">
        <div class="max-w-4xl mx-auto">

            @if(isset($city))
                <div class="text-center text-white mb-8">
                    <h1 class="text-4xl font-extrabold">{{ $city->name }}</h1>
                    <p class="text-lg font-light">Prognoza za narednih 5 dana</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-5 gap-6">
                    @foreach($allForecast as $forecast)
                        <div class="bg-white rounded-lg shadow-lg p-4 text-center">
                            <div class="text-sm font-medium text-gray-500 mb-2">{{ \Carbon\Carbon::parse($forecast->date)->format('d.m.Y') }}</div>
                            <div class="text-4xl font-bold text-blue-600">{{ ($forecast->temperature) }}°C</div>
                            <div class="text-sm font-light text-gray-600 mt-2">{{ $forecast->description }}</div>
                        </div>
                    @endforeach
                </div>
            @endif

        </div>
    </div>
@endsection
