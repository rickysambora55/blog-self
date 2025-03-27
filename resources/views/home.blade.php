<!DOCTYPE html>
<html lang="en">

    @extends('head')

    <body class="flex flex-col gap-4">
        <x-navbar></x-navbar>
        <x-hero></x-hero>
        <x-intro></x-intro>
        <x-skills></x-skills>
        <x-experiences :works="$works" :studies="$studies"></x-experiences>
        <x-projects :projects="$projects"></x-projects>
        {{-- <x-contact></x-contact> --}}
        <x-footer></x-footer>
    </body>

</html>