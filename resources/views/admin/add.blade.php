@extends('admin.admin-layout')

@section('content')


    <div class="bg-white rounded-lg shadow-xl p-6">
        <h2 class="text-xl font-semibold text-gray-800 mb-4">Dodaj Novi Grad</h2>
        <form action="{{ route('add-city') }}" method="POST" class="mb-3">
            @csrf
            <div class="space-y-4">
                <div>
                    <label for="city" class="block text-sm font-medium text-gray-700">Ime Grada</label>
                    <input type="text" name="city_id" id="city_id" value="{{old('city_id')}}" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
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


@endsection
