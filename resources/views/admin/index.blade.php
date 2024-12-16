@extends('admin.admin-layout')

@section('content')

<div class="">

    <div class="bg-white rounded-lg shadow-xl p-6">
        <div class="wraperHeader flex justify-between">
        <h2 class="text-xl font-semibold text-gray-800 mb-4">Lista Gradova</h2>
        </div>



        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Grad</th>
                    <th class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider text-center">Temperatura</th>
                    <th class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider text-center">Datum</th>
                    <th class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider text-center">Akcije</th>
                </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                @if(isset($allCities))

                    @foreach($allCities as $city)
                        @foreach($city->allforecasts as $forecast)
                        <tr>
                            <td class="px-6 text-center py-4 whitespace-nowrap">{{$city->name}}</td>
                            <td class="px-6 text-center py-4 whitespace-nowrap">{{$forecast->temperature}}</td>
                            <td class="px-6 text-center py-4 whitespace-nowrap">{{$forecast->date}}</td>



                            <td class="px-6 text-center py-4 whitespace-nowrap">
                                <div class="flex space-x-2 justify-center">
                                    <a href="{{route("edit", $forecast->id)}}" class="px-3 py-1 bg-blue-500 text-white rounded hover:bg-blue-600 transition duration-200">
                                        Izmjeni
                                    </a>
                                    <a href="{{route("delete", $forecast->id)}}" class="px-3 py-1 bg-red-500 text-white rounded hover:bg-red-600 transition duration-200">
                                        Obriši
                                    </a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
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
