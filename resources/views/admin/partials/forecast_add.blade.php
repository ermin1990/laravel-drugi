<form action="{{route ('add-forecast')}} " method="POST">
    @csrf
    <div class="sm:justify-between sm:items-center mb-4 flex flex-wrap">

        <select name="city_id"
            class="px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            @foreach($cities as $city)
                <option value="{{ $city->id }}">{{ $city->name }}</option>
            @endforeach
        </select>


        <input type="number" name="temperature" placeholder="Temp."
               class="w-[100px] px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">

        <select name="weather_type"
                class="px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            <option value="sunny">Sunny</option>
            <option value="cloudy">Snowy</option>
            <option value="rainy">Rainy</option>
        </select>

        <input type="text" name="probability" placeholder="Procenat padavina"
               class="px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">

        <input type="date" name="date"
               class="px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
        <button type="submit" class="px-4 py-2 bg-white text-black rounded-lg">Dodaj</button>

    </div>

</form>
