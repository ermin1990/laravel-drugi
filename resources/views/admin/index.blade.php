@extends('admin.admin-layout')

@section('content')

<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
    <!-- Add New City Form -->
    <div class="bg-white rounded-lg shadow-xl p-6">
        <h2 class="text-xl font-semibold text-gray-800 mb-4">Dodaj Novi Grad</h2>
        <form action="{{ route('add-city') }}" method="POST">
            @csrf
            <div class="space-y-4">
                <div>
                    <label for="city" class="block text-sm font-medium text-gray-700">Ime Grada</label>
                    <input type="text" name="city" id="city" value="{{old('city')}}" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                </div>
                <div>
                    <label for="temperature" class="block text-sm font-medium text-gray-700">Temperatura (°C)</label>
                    <input type="number" name="temperature" id="temperature" value="{{old('temperature')}}" step="0.1" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                </div>
                <button type="submit" class="w-full px-4 py-2 bg-green-500 text-white rounded-lg hover:bg-green-600 transition duration-200">
                    Dodaj Grad
                </button>
            </div>
        </form>
    </div>

    <!-- Cities List -->
    <div class="bg-white rounded-lg shadow-xl p-6">
        <h2 class="text-xl font-semibold text-gray-800 mb-4">Lista Gradova</h2>
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Grad</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Temperatura</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Akcije</th>
                </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                @if(isset($allCities))

                    @foreach($allCities as $city)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">{{$city->city}}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{$city->temperature}}°C</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex space-x-2">
                                    <a href="{{route("delete", $city->id)}}" class="px-3 py-1 bg-red-500 text-white rounded hover:bg-red-600 transition duration-200">
                                        Obriši
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforeach

                @else
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">Nema Gradova</td>
                        <td class="px-6 py-4 whitespace-nowrap"></td>
                        <td class="px-6 py-4 whitespace-nowrap"></td>
                    </tr>
                @endif

                </tbody>
            </table>
        </div>
    </div>
</div>


@endsection
