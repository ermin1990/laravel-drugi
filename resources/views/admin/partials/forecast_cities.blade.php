@php use App\Http\ForecastHelper; @endphp
@php use Carbon\Carbon; @endphp
@if(isset($city))
    <div class="text-center text-white mb-2">
        <h1 class="justify-center text-4xl font-extrabold flex items-center">{{ $city->name }}
            @if(in_array($city->id, $favourites))
                <a class="justify-center text-lg bg-red-400 rounded m-2 p-1 hover:transition-all hover:scale-125" href="{{route('delete-fav-city', $city->id)}}"><i class="fas fa-trash"></i></a>
            @else
                <a class="justify-center text-lg bg-lime-400 rounded m-2 p-1 hover:transition-all hover:scale-125" href="{{route('add-fav-city', $city->id)}}"> <i class="fas fa-star"></i></a>
            @endif

        </h1>




        <span class="text-xs">Prikazujemo 5 dana poredani po datumima</span>

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
