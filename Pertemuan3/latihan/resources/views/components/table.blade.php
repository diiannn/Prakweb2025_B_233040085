@props(['posts'])

<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">No</th>
                <th scope="col" class="px-6 py-3">Title</th>
                <th scope="col" class="px-6 py-3">Author</th> {{-- Kolom Baru --}}
                <th scope="col" class="px-6 py-3">Category</th>
                <th scope="col" class="px-6 py-3">Published At</th> {{-- Kolom Baru --}}
                <th scope="col" class="px-6 py-3">Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($posts as $post)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    {{-- No --}}
                    <td class="px-6 py-4">
                        {{ $loop->iteration + $posts->firstItem() - 1 }}
                    </td>

                    {{-- Title --}}
                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $post->title }}
                    </td>

                    {{-- Author (Baru) --}}
                    <td class="px-6 py-4">
                        {{ $post->author->name ?? 'Unknown' }}
                    </td>

                    {{-- Category --}}
                    <td class="px-6 py-4">
                        {{ $post->category->name ?? 'Uncategorized' }}
                    </td>

                    {{-- Published At (Baru) --}}
                    <td class="px-6 py-4">
                        {{ $post->created_at->format('d M Y') }}
                    </td>

                    {{-- Action --}}
                    <td class="px-6 py-4 flex items-center gap-2">
                        {{-- View --}}
                        <a href="{{ route('dashboard.show', $post->slug) }}"
                            class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                            View
                        </a>

                        {{-- Edit --}}
                        <a href="{{ route('dashboard.edit', $post->slug) }}"
                            class="font-medium text-yellow-600 dark:text-yellow-500 hover:underline">
                            Edit
                        </a>

                        {{-- Delete --}}
                        <form action="{{ route('dashboard.destroy', $post->slug) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Yakin hapus data?')"
                                class="font-medium text-red-600 dark:text-red-500 hover:underline border-none bg-transparent cursor-pointer">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    {{-- Ubah colspan jadi 6 karena jumlah kolom bertambah --}}
                    <td colspan="6" class="px-6 py-4 text-center text-gray-500">
                        No posts found.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

{{-- Pagination --}}
<div class="mt-4">
    {{ $posts->links() }}
</div>