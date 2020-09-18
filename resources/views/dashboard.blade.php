<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name') }}</title>
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}" />
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>
    <body class="antialiased font-sans text-gray-400 bg-gray-900">
        <div id="app">
            <div class="p-4 h-screen">
                <div class="h-full grid grid-cols-4 grid-rows-6 gap-4">
                    <sketchni cdata="{{ cache('sketchni') }}" class="row-span-4 overflow-auto"></sketchni>

                    <outlook cdata="{{ cache('outlook') }}" class="row-span-4 overflow-auto"></outlook>

                    <linkcraft cdata="{{ cache('linkcraft') }}" class="row-span-4 overflow-auto"></linkcraft>

                    <ukblabberbox cdata="{{ cache('ukblabberbox') }}" class="row-span-4 overflow-auto"></ukblabberbox>

                    <twitch cdata="{{ cache('twitch') }}" class="col-span-4 row-span-2"></twitch>
                </div>
            </div>
        </div>
        <script>
            window.user = <?php echo auth()->user(); ?>;
        </script>
    </body>
</html>
