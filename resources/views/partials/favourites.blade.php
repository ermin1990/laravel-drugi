@if(isset($favourites))
    <h3>Vaši favoriti</h3>
    <div class="flex">
    @foreach($favourites as $city)
        <div class="flex items-center bg-gray-200 rounded-lg p-2 m-1">
            <a href="{{route ('forecast', $city->city->name)}}" class="text-2xl font-bold mt-2 mb-2"> {{$city->city->name}} </a>
            <div class="bg-gray-300 rounded-lg p-2 flex flex-col items-center m-2 h-11 overflow-hidden hover:transition-all duration-500  hover:h-20 hover:duration-500 ease-in-out delay-150">
                <div class="text-2xl z-10 font-bold">{{($city->city->oneforecast->temperature)}}°C</div>
                <div class="m-1 scale-[2.5] translate-y-1">{{\App\Http\ForecastHelper::getIconByWeatherType($city->city->oneforecast->weather_type)}} </div>
            </div>

            <a class="justify-center text-lg m-2 p-2 hover:transition-all hover:scale-125" href="{{route('delete-fav-city', $city->city->id)}}">
                <i class="fas fa-trash"></i>
            </a>
        </div>

    @endforeach
    </div>
@endif
