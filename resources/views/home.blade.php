<!DOCTYPE html>
<html lang="en">

    @extends('head')

    <body class="flex flex-col gap-4">
        <x-navbar></x-navbar>
        <x-hero :profile="$profile"></x-hero>
        <x-intro :profile="$profile"></x-intro>
        @if(isset($profile['technologies']))
        <x-skills :profile="$profile"></x-skills>
        @endif
        @if((isset($works) && $works->isNotEmpty()) || (isset($studies) && $studies->isNotEmpty()))
        <x-experiences :works="$works" :studies="$studies"></x-experiences>
        @endif
        @if(isset($projects) && $projects->isNotEmpty())
        <x-projects :projects="$projects"></x-projects>
        @endif
        {{-- <x-contact></x-contact> --}}
        <x-footer :profile="$profile"></x-footer>
    </body>

</html>