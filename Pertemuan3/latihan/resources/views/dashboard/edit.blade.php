<x-dashboard-layout>
    <x-slot:title>Edit Post</x-slot:title>

    <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md">
        <h2 class="text-2xl font-bold mb-6 text-gray-900 dark:text-white">Edit Post</h2>

        {{-- Form mengarah ke method UPDATE --}}
        <form action="{{ route('dashboard.update', $post->slug) }}" method="POST" enctype="multipart/form-data">
            @method('PUT') {{-- PENTING: Ubah method POST menjadi PUT --}}
            @csrf

            <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">

                {{-- TITLE --}}
                <div class="sm:col-span-2">
                    <label for="title"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Title</label>
                    <input type="text" name="title" id="title" value="{{ old('title', $post->title) }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        required>
                    @error('title') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
                </div>

                {{-- CATEGORY --}}
                <div class="sm:col-span-2">
                    <label for="category_id"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category</label>
                    <select id="category_id" name="category_id"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ old('category_id', $post->category_id) == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- EXCERPT --}}
                <div class="sm:col-span-2">
                    <label for="excerpt"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Excerpt</label>
                    <textarea id="excerpt" name="excerpt" rows="2"
                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500">{{ old('excerpt', $post->excerpt) }}</textarea>
                </div>

                {{-- BODY --}}
                <div class="sm:col-span-2">
                    <label for="body"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Content</label>
                    <textarea id="body" name="body" rows="8"
                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500">{{ old('body', $post->body) }}</textarea>
                </div>

                {{-- IMAGE --}}
                <div class="sm:col-span-2">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="image">Upload New
                        Image</label>

                    {{-- Tampilkan gambar lama jika ada --}}
                    @if ($post->image)
                        <img src="{{ asset('storage/' . $post->image) }}"
                            class="w-32 mb-3 rounded-lg border border-gray-200">
                    @endif

                    <input
                        class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50"
                        id="image" name="image" type="file">
                </div>

            </div>

            {{-- BUTTONS --}}
            <div class="flex items-center space-x-4 mt-6">
                <button type="submit"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5">
                    Update Post
                </button>
                <a href="{{ route('dashboard.index') }}"
                    class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-5 py-2.5">
                    Cancel
                </a>
            </div>
        </form>
    </div>
</x-dashboard-layout>