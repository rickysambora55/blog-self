<!DOCTYPE html>
<html lang="en">

    @extends('head')

    <body class="flex flex-col gap-4">
        <x-navbar></x-navbar>
        <article class="py-8 px-12 mt-12">
            <h2>{{$project['title']}}</h2>
            <p>{{$project['description']}}</p>
        </article>
        <x-footer></x-footer>
    </body>

</html>