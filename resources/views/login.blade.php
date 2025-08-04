<!DOCTYPE html>
<html lang="en">

    <x-header></x-header>

    <body
        class="flex items-center justify-center min-h-screen bg-gradient-to-br from-gray-100 via-gray-200 to-amber-100">
        <div
            class="flex flex-col bg-white/60 bg-opacity-20 backdrop-blur-lg rounded-4xl shadow-lg px-16 py-12 w-144 text-white">
            <span class="text-black text-3xl font-bold mb-8 text-center">Profile Dashboard</span>
            <form method="POST" action="{{ route('login') }}" class="flex flex-col gap-8">
                @csrf
                <div class="flex flex-col gap-4 px-2">
                    <div>
                        <label class="block text-sm font-medium text-black" for="username">Username</label>
                        <div class="flex items-center bg-amber-100/50 bg-opacity-50 p-2 rounded-lg mt-1">
                            <i class="fa-solid fa-user-tie text-amber-600"></i>
                            <input id="username" type="username" name="username"
                                class="bg-transparent focus:outline-none ml-2 flex-1 text-gray-500 font-light"
                                placeholder="Username" required>
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-black" for="password">Password</label>
                        <div class="flex items-center bg-amber-100/50 bg-opacity-50 p-2 rounded-lg mt-1">
                            <i class="fa-solid fa-key text-amber-600"></i>
                            <input id="password" type="password" name="password"
                                class="bg-transparent focus:outline-none ml-2 flex-1 text-gray-500 font-light"
                                placeholder="Password" required>
                        </div>
                    </div>
                    {{-- <div class="flex items-center justify-between text-xs">
                        <label class="flex items-center space-x-2 hover:cursor-pointer">
                            <input type="checkbox" class="text-amber-500">
                            <span class="text-black">Remember me</span>
                        </label>
                    </div> --}}
                </div>
                <button
                    class="w-full bg-amber-900 py-2 rounded-lg text-white font-semibold shadow-lg hover:bg-amber-800 hover:cursor-pointer">Login</button>
            </form>
        </div>
    </body>
    @if (session('error'))
    <x-toast type="error" :message="session('error')" />
    @endif

    @if ($errors->any())
    <x-toast type="error" :message="$errors->first()" />
    @endif

</html>