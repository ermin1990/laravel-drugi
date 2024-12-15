@extends('admin.admin-layout')

@section('content')

<div class="">

    <div class="bg-white rounded-lg shadow-xl p-6">
        <div class="wraperHeader flex justify-between">
        <h2 class="text-xl font-semibold text-gray-800 mb-4">Lista Gradova</h2>
        <a href="{{route('add')}}" class="px-4 py-2 bg-green-500 text-white rounded-lg hover:bg-blue-600 transition duration-200">Dodaj novi grad</a>
        </div>



        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Grad</th>
                    <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Temperatura</th>
                    <th class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider text-right">Akcije</th>
                </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                @if(isset($allCities))

                    @foreach($allCities as $city)
                        <tr>
                            <td class="px-6 text-center py-4 whitespace-nowrap">{{$city->city->name}}</td>
                            <td class="px-6 text-center py-4 whitespace-nowrap">{{$city->temperature}}°C</td>
                            <td class="px-6 text-center py-4 whitespace-nowrap">
                                <div class="flex space-x-2 justify-end">
                                    <a href="{{route("edit", $city->id)}}" class="px-3 py-1 bg-blue-500 text-white rounded hover:bg-blue-600 transition duration-200">
                                        Izmjeni
                                    </a>
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
