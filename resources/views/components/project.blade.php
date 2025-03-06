<a {{$attributes}} rel="noopener noreferrer">
    <div
        class="w-70 2xl:w-84 h-84 p-4 rounded-xl overflow-hidden group border border-gray-100 shadow-lg cursor-pointer hover:shadow-xl hover:shadow-amber-200 transition flex flex-col">

        <!-- Image -->
        <img class="w-full rounded-t-lg h-36 object-cover" src="https://v1.tailwindcss.com//img/card-top.jpg" alt="a">

        <!-- Content Wrapper -->
        <div class="flex flex-col flex-1 px-2">
            <div class="pt-2">
                <div class="font-bold text-xl group-hover:text-amber-400 transition">Atsuko</div>
                <div class="text-gray-700 text-xs">Discord Bot</div>

                <!-- Truncated Description -->
                <div class="text-gray-700 text-md mb-2 line-clamp-2 text-justify">
                    Blue archive wiki and club management system.
                </div>
            </div>

            <!-- Divider -->
            <div class="flex-1"></div>
            <div class="w-full h-0.5 bg-gray-300 mx-auto my-2 rounded-full"></div>

            <!-- Tech Stack -->
            <div class="flex gap-2">
                <x-projects-tech src="/img/nodejs.webp">Node.js</x-projects-tech>
                <x-projects-tech src="/img/discordjs.webp">Discord.js</x-projects-tech>
                <x-projects-tech src="/img/mysql.webp">MySQL</x-projects-tech>
            </div>
        </div>

    </div>
</a>