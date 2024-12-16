@extends('layout')

@section('content')
    <div class="min-h-screen bg-gradient-to-br from-blue-400 to-purple-500 p-4">
        <div class="max-w-6xl mx-auto">
            <div class="bg-white rounded-lg shadow-xl p-6 mb-4">
                @include('partials.menu')
            </div>

            <div class="mt-1">
                @include('partials.status')
                @include('partials.prognoza')
            </div>
        </div>
    </div>
@endsection
