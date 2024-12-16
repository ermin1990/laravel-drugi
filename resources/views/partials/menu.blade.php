<div class="flex justify-between items-center flex-wrap gap-2">
    <h1 class="text-2xl font-bold text-gray-800">Admin - Vremenska Prognoza</h1>

    <div class="menuItems flex gap-2">
        <a href="{{ route('home') }}"
           class="px-4 py-2 bg-green-500 text-white rounded-lg hover:bg-blue-600 transition duration-200">
            Početna
        </a>
        @if(!Auth::check())
            <a href="{{ route('login') }}"
               class="px-4 py-2 bg-yellow-300 text-black rounded-lg hover:bg-blue-600 transition duration-200">
                Prijava
            </a>
        @else
            @if(\Illuminate\Support\Facades\Auth::user()->role == "admin")
                <a href="{{ route('index') }}"
                   class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition duration-200">
                    Administracija
                </a>

                <a href="{{ route('admin.forecast') }}"
                   class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-600 transition duration-200">
                    Forecasts
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
