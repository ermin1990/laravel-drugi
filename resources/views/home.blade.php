@extends('layout')

@section('content')
    <div class="min-h-screen bg-gradient-to-br from-blue-400 to-purple-500 p-4">
        <div class="max-w-6xl mx-auto">


            <div class="bg-white rounded-lg shadow-xl p-6 mb-4">
                @include('partials.menu')
            </div>
            @if(\Illuminate\Support\Facades\Auth::check() && route('home') == url()->current())
            <div class="bg-white rounded-lg shadow-xl p-6 mb-4">
                @include('partials.favourites')
            </div>
           @endif
            <div class="mt-1">
                @include('partials.prognoza')
            </div>
        </div>
    </div>
@endsection
