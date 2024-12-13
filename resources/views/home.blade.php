@extends('layout')

@section('content')
    <div class="min-h-screen bg-gradient-to-br from-blue-400 to-purple-500 p-4">
        <div class="max-w-6xl mx-auto">
            <div class="bg-white rounded-lg shadow-xl p-6 mb-4">
                <div class="flex justify-between items-center flex-wrap gap-2">
                    <h1 class="text-2xl font-bold text-gray-800">Admin - Vremenska Prognoza</h1>

                    <div class="menuItems flex gap-2">
                        @if(!Auth::check())
                            <a href="{{ route('login') }}"
                               class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition duration-200">
                                Prijava
                            </a>
                        @else
                            @if(\Illuminate\Support\Facades\Auth::user()->role == "admin")
                            <a href="{{ route('index') }}"
                               class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition duration-200">
                                Administracija
                            </a>
                            @endif
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit"
                                        class="px-4 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600 transition duration-200">
                                    Logout
                                </button>
                            </form>
                        @endif
                    </div>

                </div>
            </div>

            <div class="mt-1">
                @include('partials.prognoza')
            </div>
        </div>
    </div>
@endsection
