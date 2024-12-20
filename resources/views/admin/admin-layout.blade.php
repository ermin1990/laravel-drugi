<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />


    <title>Admin Panel - Waterher App</title>
</head>
<body>

<div class="min-h-screen bg-gradient-to-br from-blue-400 to-purple-500 p-4">
    <div class="max-w-6xl mx-auto">
        <div class="bg-white rounded-lg shadow-xl p-6 mb-6">

            @include('partials.menu')
            @include('partials.status')
        </div>



<div class="p-4">
@yield('content')
</div>


    </div>
</div>

</body>
</html>
