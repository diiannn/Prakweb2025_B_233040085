<x-layout>
    <x-slot:title>Kategori</x-slot:title>
    <x-slot:header>Daftar Kategori</x-slot:header>

    <div class="w-full text-left mb-6 lg:mb-8 mt-1">
        <p class="font-light text-gray-500 sm:text-xl dark:text-gray-400">
            Pilih kategori artikel yang ingin kamu baca.
        </p>
    </div>

    <div class="grid gap-4 mb-6 lg:mb-16 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
        @foreach ($categories as $category)
            <a href="/categories/{{ $category->slug }}"
                class="block p-6 bg-white rounded-lg border border-gray-200 shadow-md hover:bg-gray-100 transition duration-300 ease-in-out transform hover:-translate-y-1 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">

                <div class="flex flex-col items-center">
                    <!-- icon -->
                    <div class="mb-2 text-4xl text-blue-500 font-bold">
                        #
                    </div>
                    <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-900 dark:text-white text-center">
                        {{ $category->name }}
                    </h5>
                </div>
            </a>
        @endforeach
    </div>

</x-layout>