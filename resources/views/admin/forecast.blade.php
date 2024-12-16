@extends('admin.admin-layout')

@section('content')

    <div class="min-h-screen p-3">


        <div class="text-3xl font-bold text-white mb-6">Forecast<span class="text-gray-900 font-bold italic">Admin</span></div>
        <div class="max-w-4xl mx-auto">
            <div class="addForm">
                @include('partials.status')
                @include('admin.partials.forecast_add')
                <i class="bi bi-sun"></i>
            </div>

            <div class="list">
                @foreach($cities as $city)

                    <div class="wraper m-2 mb-4">
                        @include('admin.partials.forecast_cities', ['city' => $city])

                    </div>
                @endforeach
            </div>


        </div>
    </div>
@endsection
