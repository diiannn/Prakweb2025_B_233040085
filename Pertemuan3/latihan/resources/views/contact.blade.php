<x-layout>
    <x-slot:title>Contact</x-slot:title>
    <x-slot:header>Contact Me</x-slot:header>

    {{-- Container Utama: Konsisten dengan Header & Halaman Lain --}}
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 py-4">

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

            {{-- KOLOM KIRI: Informasi Kontak --}}
            <div class="bg-gray-50 p-8 rounded-lg border border-gray-200 dark:bg-gray-800 dark:border-gray-700 h-fit">
                <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">
                    Hubungi Saya
                </h3>
                <p class="text-gray-500 mb-8 dark:text-gray-400">
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Illo harum sed soluta eum, cupiditate
                    voluptatibus unde omnis veniam ex rem quam eaque aliquid in magnam sequi facilis similique error
                    dolor.
                </p>

                <div class="space-y-4">
                    <div class="flex items-start">
                        <div class="flex-shrink-0">
                            <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                </path>
                            </svg>
                        </div>
                        <div class="ml-4">
                            <h4 class="text-base font-medium text-gray-900 dark:text-white">Email</h4>
                            <p class="text-gray-500 dark:text-gray-400">Dian@example.com</p>
                        </div>
                    </div>
                    <div class="flex items-start">
                        <div class="flex-shrink-0">
                            <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                                </path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                        </div>
                        <div class="ml-4">
                            <h4 class="text-base font-medium text-gray-900 dark:text-white">Lokasi</h4>
                            <p class="text-gray-500 dark:text-gray-400">Bandung, Indonesia</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- form kontak -->
            <div class="bg-white p-8 rounded-lg shadow-sm border border-gray-200 dark:bg-gray-800 dark:border-gray-700">
                <form action="#" method="POST">
                    <div class="space-y-6">
                        <div>
                            <label for="name"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Nama
                                Lengkap</label>
                            <input type="text" id="name"
                                class="block w-full p-3 text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                                placeholder="Nama Kamu" required>
                        </div>
                        <div>
                            <label for="email"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Alamat
                                Email</label>
                            <input type="email" id="email"
                                class="block w-full p-3 text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                                placeholder="nama@email.com" required>
                        </div>
                        <div class="sm:col-span-2">
                            <label for="message"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Pesan</label>
                            <textarea id="message" rows="4"
                                class="block w-full p-3 text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                                placeholder="Tulis pesanmu di sini..."></textarea>
                        </div>
                        <button type="submit"
                            class="py-3 px-5 w-full text-sm font-medium text-center text-white rounded-lg bg-blue-700 sm:w-auto hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Kirim Pesan
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</x-layout>