<x-dashboard-layout>
    <x-slot:title>
        {{ $post->title }} - Dashboard
    </x-slot:title>

    <article class="max-w-4xl mx-auto bg-white p-6 rounded-lg shadow-sm">

        {{-- Tombol Kembali (Di atas supaya mudah navigasi) --}}
        <div class="mb-6">
            <a href="{{ route('dashboard.index') }}"
                class="inline-flex items-center text-sm font-medium text-blue-600 hover:underline">
                &larr; Back to my posts
            </a>
        </div>

        {{-- HEADER (Bagian yang kamu minta tambahkan/perbaiki) --}}
        <header class="mb-8">
            <h1 class="text-4xl font-bold text-gray-800 mb-4">
                {{ $post->title }}
            </h1>

            <div class="flex items-center text-sm text-gray-600 mb-4">
                <span class="mr-4">By {{ $post->author->name ?? auth()->user()->name }}</span>
                <span class="mr-4">
                    Category: {{ $post->category->name ?? 'Uncategorized' }}
                </span>
                <span>
                    {{ $post->created_at->format('d M Y') }}
                </span>
            </div>

            {{-- Menampilkan Gambar jika ada --}}
            @if ($post->image)
                <div class="overflow-hidden rounded-lg border border-gray-200">
                    <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}"
                        class="w-full h-auto max-h-[400px] object-cover">
                </div>
            @endif
        </header>

        {{-- BODY POST --}}
        <div class="prose prose-lg max-w-none text-gray-800">
            <p class="text-xl text-gray-600 mb-6 font-light">
                {{ $post->excerpt }}
            </p>

            <div class="leading-relaxed">
                {!! nl2br(e($post->body)) !!}
            </div>
        </div>

        {{-- FOOTER & TOMBOL AKSI --}}
        <footer class="mt-8 pt-8 border-t border-gray-200">
            <div class="flex gap-3">
                {{-- Tombol Edit --}}
                <a href="{{ route('dashboard.edit', $post->slug) }}"
                    class="text-white bg-yellow-500 hover:bg-yellow-600 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 focus:outline-none">
                    Edit
                </a>

                {{-- Tombol Delete --}}
                <form action="{{ route('dashboard.destroy', $post->slug) }}" method="POST" class="inline-block">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                        class="text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 focus:outline-none"
                        onclick="return confirm('Are you sure you want to delete this post?')">
                        Delete
                    </button>
                </form>
            </div>
        </footer>

    </article>
</x-dashboard-layout>