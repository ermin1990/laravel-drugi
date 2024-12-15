@if(isset($city))
    <div class="text-center text-white mb-2">
        <h1 class="text-4xl font-extrabold">{{ $city->name }}</h1>
        <span class="text-xs">Prikazujemo 5 dana poredani po datumima</span>

    </div>

    <div class="grid grid-cols-1 md:grid-cols-5 gap-6">
        @foreach($city->forecast as $forecast)
            <div class="bg-white rounded-lg shadow-lg p-4 text-center">
                <div class="text-sm font-medium text-gray-500 mb-2">{{ \Carbon\Carbon::parse($forecast->date)->format('d.m.Y') }}</div>
                <div class="text-4xl font-bold text-blue-600">{{ ($forecast->temperature) }}°C</div>
                <div class="text-sm font-light text-gray-600 mt-2">{{ $forecast->weather_type }} @if($forecast->probability) <strong>{{ $forecast->probability }}%</strong> @endif</div>
            </div>

        @endforeach

    </div>
@endif
