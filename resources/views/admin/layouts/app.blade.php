<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title') - {{ config('app.name') }}</title>
    
    <script src="https://cdn.tailwindcss.com"></script>

</head>
<body>
	<section class="container px-4 mx-auto">
        <h3 class="text-2xl text-gray-700 font-bold mb-6 ml-3">
            @yield('header')
		</h3>
        <div class="content">
            @yield('content')
        </div>
    </section>
</body>
</html>