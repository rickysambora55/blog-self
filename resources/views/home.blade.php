<!DOCTYPE html>
<html lang="en">

    @extends('head')

    <body class="flex flex-col gap-4">
        <x-navbar></x-navbar>
        <x-hero :profile="$profile"></x-hero>
        <x-intro :profile="$profile"></x-intro>
        <x-skills :profile="$profile"></x-skills>
        <x-experiences :works="$works" :studies="$studies"></x-experiences>
        <x-projects :projects="$projects"></x-projects>
        {{-- <x-contact></x-contact> --}}
        <x-footer></x-footer>
    </body>

</html>