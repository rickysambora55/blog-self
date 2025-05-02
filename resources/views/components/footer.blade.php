@props(['profile'])

<footer id="contact" class="w-full bg-amber-500 text-white py-6">
    <div class="container mx-auto px-6 flex flex-col items-center gap-4">
        <!-- Social Media Icons -->
        <div class="flex gap-4">
            <!-- GitHub -->
            <x-social-item href="{{isset($profile['github']) ? 'https://github.com/' . $profile['github'] : '#' }}">
                <x-slot:viewBox>0 0 24 24</x-slot:viewBox>
                <path
                    d="M12 0C5.372 0 0 5.373 0 12c0 5.303 3.438 9.8 8.207 11.385.6.11.793-.26.793-.577v-2.18c-3.338.726-4.042-1.415-4.042-1.415-.546-1.388-1.332-1.758-1.332-1.758-1.09-.744.083-.729.083-.729 1.205.085 1.84 1.24 1.84 1.24 1.07 1.835 2.805 1.304 3.49.997.108-.776.42-1.305.764-1.605-2.665-.303-5.466-1.333-5.466-5.932 0-1.312.47-2.386 1.235-3.226-.123-.303-.535-1.522.117-3.172 0 0 1.007-.323 3.3 1.23a11.458 11.458 0 0 1 3.001-.404c1.017.005 2.04.138 3.001.404 2.293-1.553 3.298-1.23 3.298-1.23.653 1.65.241 2.869.118 3.172.767.84 1.234 1.914 1.234 3.226 0 4.61-2.805 5.625-5.476 5.921.431.37.815 1.1.815 2.219v3.293c0 .32.192.694.8.577C20.565 21.795 24 17.3 24 12c0-6.627-5.373-12-12-12z" />
            </x-social-item>

            <!-- LinkedIn -->
            <x-social-item
                href="{{isset($profile['linkedin']) ? 'https://linkedin.com/in/' . $profile['linkedin'] : '#' }}">
                <x-slot:viewBox>0 0 24 24</x-slot:viewBox>
                <path
                    d="M22.225 0H1.771C.792 0 0 .774 0 1.726v20.549C0 23.226.792 24 1.771 24h20.451C23.205 24 24 23.226 24 22.275V1.726C24 .774 23.205 0 22.225 0zM7.126 20.452H3.562V9.01h3.564v11.442zM5.344 7.74c-1.145 0-2.077-.932-2.077-2.078S4.2 3.585 5.344 3.585c1.146 0 2.078.932 2.078 2.077S6.49 7.74 5.344 7.74zM20.45 20.452h-3.563v-5.576c0-1.327-.025-3.033-1.847-3.033-1.848 0-2.132 1.444-2.132 2.938v5.67H9.345V9.01h3.421v1.561h.049c.477-.906 1.64-1.86 3.377-1.86 3.613 0 4.278 2.379 4.278 5.47v6.271z" />
            </x-social-item>

            <!-- Instagram -->
            <x-social-item
                href="{{isset($profile['instagram']) ? 'https://instagram.com/' . $profile['instagram'] : '#' }}">
                <x-slot:viewBox>0 0 16 16</x-slot:viewBox>
                <path
                    d="M5.41421,1.17157c1.17157,1.17157 1.17157,3.07107 0,4.24264c-1.17157,1.17157 -3.07107,1.17157 -4.24264,0c-1.17157,-1.17157 -1.17157,-3.07107 -8.88178e-16,-4.24264c1.17157,-1.17157 3.07107,-1.17157 4.24264,-8.88178e-16"
                    transform="translate(4.707 4.707)"></path>
                <path
                    d="M11.5,0h-7c-2.48145,0 -4.5,2.01855 -4.5,4.5v7c0,2.48145 2.01855,4.5 4.5,4.5h7c2.48145,0 4.5,-2.01855 4.5,-4.5v-7c0,-2.48145 -2.01855,-4.5 -4.5,-4.5Zm-3.5,12c-2.20557,0 -4,-1.79395 -4,-4c0,-2.20605 1.79443,-4 4,-4c2.20557,0 4,1.79395 4,4c0,2.20605 -1.79443,4 -4,4Zm4.5,-8c-0.276123,0 -0.5,-0.223877 -0.5,-0.5c0,-0.276184 0.223877,-0.5 0.5,-0.5c0.276123,0 0.5,0.223816 0.5,0.5c0,0.276123 -0.223877,0.5 -0.5,0.5Z">
                </path>

            </x-social-item>
        </div>
        <div class="flex flex-col text-center">
            <div class="flex gap-2">
                @if(isset($profile['email']))
                <span class="text-sm">{{$profile['email']}}</span>
                @endif
                @if(isset($profile['phone']))
                <div class="border border-b-12 border-white"></div>
                <span class="text-sm">{{$profile['phone']}}</span>
                @endif
            </div>
            @if(isset($profile['address']))
            <span class="text-sm">{{$profile['address']}}</span>
            @endif
        </div>

        <!-- Back to Top Button -->
        <button id="backToTop"
            class="mt-4 text-sm bg-white text-amber-500 cursor-pointer px-4 py-2 rounded-full shadow-md hover:bg-gray-200 transition">
            Back to Top ↑
        </button>

        <!-- Copyright -->
        <div class="text-center text-md mt-4 border-t border-white/20 pt-4">
            Crafted with Laravel & dedication.
        </div>
    </div>
</footer>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const backToTop = document.getElementById("backToTop");

        // // Show button when scrolling down
        // window.addEventListener("scroll", function () {
        //     if (window.scrollY > 300) {
        //         backToTop.classList.remove("opacity-0", "invisible");
        //         backToTop.classList.add("opacity-100", "visible");
        //     } else {
        //         backToTop.classList.remove("opacity-100", "visible");
        //         backToTop.classList.add("opacity-0", "invisible");
        //     }
        // });

        // Smooth scroll to top
        backToTop.addEventListener("click", function () {
            window.scrollTo({ top: 0, behavior: "smooth" });
        });
    });
</script>