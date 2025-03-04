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
    </head>

    <body class="bg-blue-100 flex flex-col gap-4">
        <x-navbar></x-navbar>
        <x-hero></x-hero>
        <x-intro></x-intro>
        <x-skills></x-skills>
        {{-- <x-projects></x-projects>
        <x-contact></x-contact> --}}
        <x-footer></x-footer>
    </body>

</html>