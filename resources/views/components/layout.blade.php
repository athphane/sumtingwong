<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>{{ __('Sumtingwong - :app_name', ['app_name' => config('app.name')]) }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=montserrat:100,200,300,400,500,600,700,800,900" rel="stylesheet"/>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        * {
            font-family: 'Montserrat', sans-serif;
        }
    </style>
</head>

<body>
<x-sumtingwong::header />

<div class="mx-auto max-w-screen-xl px-4 py-2 sm:px-6 sm:py-4 lg:px-8">
    {{ $slot }}
</div>

</body>
</html>
