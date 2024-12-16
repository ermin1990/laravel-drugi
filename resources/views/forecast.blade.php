@extends('layout')
@php use App\Http\ForecastHelper; @endphp
@php use Carbon\Carbon; @endphp

@section('content')
    <div class="min-h-screen bg-gradient-to-br from-blue-500 to-indigo-600 p-6">
        <div class="max-w-4xl mx-auto">

            @if(isset($city))
                <a class="font-bold text-white" href="{{{ route('search', ['city' => $city->name]) }}}">{{"< Back"}}</a>
                <div class="text-center text-white mb-8">
                    <h1 class="text-4xl font-extrabold">{{ $city->name }}</h1>
                    <p class="text-lg font-light">Prognoza za narednih 5 dana</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-5 gap-6">
                    @foreach($city->forecast as $forecast)
                        <div
                            class="bg-white rounded-lg shadow-lg text-center w-full hover:scale-105 hover:-inset-y-0.5 hover:shadow-2xl transition duration-300">
                            <div
                                class="w-full mb-4 {{ForecastHelper::getColorByTemperature($forecast->temperature)}} h-4"></div>
                            <div>{{ForecastHelper::getIconByWeatherType($forecast->weather_type)}}</div>
                            <div
                                class="text-sm font-medium text-gray-500 mb-2">{{ Carbon::parse($forecast->date)->format('d.m.Y') }}</div>
                            <div class="text-4xl font-bold text-blue-600">{{ ($forecast->temperature) }}°C</div>
                            <div
                                class="text-sm font-light text-gray-600 mt-2 mb-3">{{ $forecast->weather_type }} @if($forecast->probability)
                                    <strong>{{ $forecast->probability }}%</strong>
                                @endif</div>
                        </div>
                    @endforeach
                </div>
            @endif

        </div>
    </div>
@endsection
