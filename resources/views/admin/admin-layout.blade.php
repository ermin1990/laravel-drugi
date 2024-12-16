<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <title>Admin Panel - Waterher App</title>
</head>
<body>

<div class="min-h-screen bg-gradient-to-br from-blue-400 to-purple-500 p-4">
    <div class="max-w-6xl mx-auto">
        <div class="bg-white rounded-lg shadow-xl p-6 mb-6">
            <div class="flex justify-between items-center flex-wrap gap-2">
                <h1 class="text-2xl font-bold text-gray-800">Admin Panel - Vremenska Prognoza</h1>
                <a href="{{ route('home') }}" class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition duration-200">
                    Nazad na aplikaciju
                </a>
            </div>
        </div>

        @include('partials.status')

<div class="p-4">
@yield('content')
</div>


    </div>
</div>

</body>
</html>
