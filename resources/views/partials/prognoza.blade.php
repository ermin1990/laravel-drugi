<div class="  flex items-center justify-center p-2">
    <div class="w-full max-w-md bg-white rounded-lg shadow-xl p-6">

        <form action="{{ route('search') }}" method="GET" class="mb-2">
            <div class="flex flex-col space-y-4">
                <label for="city" class="text-lg font-semibold text-gray-700">Unesite ime grada</label>
                <div class="flex space-x-2">
                    <input type="text" name="city" id="city" placeholder="npr. Sarajevo" class="flex-1 px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>

                    <button type="submit" class="px-6 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition duration-200">
                        Pretraži
                    </button>
                </div>
            </div>
        </form>

        @if(isset($weather))

            <div class="text-center">
                <h2 class="text-2xl font-bold text-gray-800 mb-2">{{ $weather->city }}</h2>
                <div class="bg-gray-100 rounded-lg p-6">
                    <div class="text-5xl font-bold text-blue-500 mb-2">
                        {{ round($weather->temperature) }}°C
                    </div>
                    <p class="text-gray-600">Trenutna temperatura</p>
                </div>
            </div>
            <p class=" text-xs text-yellow-600 text-center">Ukoliko grad koji se tražili ne postoji, prikazat ćemo vam random grad.</p>
        @endif

        @if(isset($error))
            <div class="mt-2 p-4 bg-red-100 text-red-700 rounded-lg">
                {{ $error }}
            </div>
        @endif
    </div>
</div>
