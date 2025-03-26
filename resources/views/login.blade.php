<!DOCTYPE html>
<html lang="en">

    @extends('head')

    <body
        class="flex items-center justify-center min-h-screen bg-gradient-to-br from-purple-500 via-pink-500 to-blue-500">
        <div class="bg-white/60 bg-opacity-20 backdrop-blur-lg rounded-lg shadow-lg p-8 w-96 relative text-white">
            <div
                class="absolute -top-12 left-1/2 transform -translate-x-1/2 bg-amber-900 p-4 rounded-full border-4 border-white">
                <span class="text-xl text-white font-bold">Administrator</span>
            </div>
            <form class="space-y-4 mt-6">
                <div>
                    <label class="block text-sm font-medium text-black" for="email">Username</label>
                    <div class="flex items-center bg-amber-900 bg-opacity-50 p-2 rounded-lg mt-1">
                        <i class="fa-solid fa-user-tie"></i>
                        <input id="email" type="email" class="bg-transparent focus:outline-none ml-2 flex-1"
                            placeholder="Username">
                    </div>
                </div>
                <div>
                    <label class="block text-sm font-medium text-black" for="password">Password</label>
                    <div class="flex items-center bg-amber-900 bg-opacity-50 p-2 rounded-lg mt-1">
                        <i class="fa-solid fa-key"></i>
                        <input id="password" type="password" class="bg-transparent focus:outline-none ml-2 flex-1"
                            placeholder="Password">
                    </div>
                </div>
                <div class="flex items-center justify-between text-xs">
                    <label class="flex items-center space-x-2 hover:cursor-pointer">
                        <input type="checkbox" class="text-amber-500">
                        <span class="text-black">Remember me</span>
                    </label>
                    {{-- <a href="#" class="text-black opacity-80 hover:underline">Forgot Password?</a> --}}
                </div>
                <button
                    class="w-full bg-amber-900 py-2 rounded-lg text-white font-semibold shadow-lg hover:bg-amber-800 hover:cursor-pointer">LOGIN</button>
            </form>
        </div>
    </body>

</html>