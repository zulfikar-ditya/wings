<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>
        @isset($title)
            {{ $title }}
        @endisset
        {{ Str::headline(config('app.name')) }}
    </title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @isset($head)
        {{ $head }}
    @endisset
</head>

<body class="antialiased bg-gray-100 dark:bg-slate-800">

    <x-client.navbar />

    {{ $slot }}

    @isset($footer)
        {{ $footer }}
    @endisset

    @include('components.dark-mode-toggle')
    @include('components.toast')

    @isset($script)
        {{ $script }}
    @endisset

</body>

</html>
