<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Name</title>

        @vite('resources/css/app.css')
        @vite('resources/js/app.js')

        <style>
            [x-cloak] {
                display: none;
            }
        </style>

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link
            href="https://fonts.googleapis.com/css2?family=Nunito+Sans:ital,opsz,wght@0,6..12,200..1000;1,6..12,200..1000&display=swap"
            rel="stylesheet">
    </head>

    <body class="flex flex-col gap-4">
        <x-navbar></x-navbar>
        <x-hero></x-hero>
        <x-intro></x-intro>
        <x-skills></x-skills>
        {{-- <x-projects></x-projects>
        <x-contact></x-contact> --}}
        <x-footer></x-footer>
    </body>

</html>