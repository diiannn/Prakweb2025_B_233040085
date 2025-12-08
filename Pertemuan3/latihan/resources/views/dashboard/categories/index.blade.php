<x-dashboard-layout>
    <x-slot:title>Post Categories</x-slot:title>

    <div class="bg-white dark:bg-gray-800 p-4 rounded-lg shadow-md">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-xl font-bold text-gray-800 dark:text-white">Post Categories</h2>
            <a href="{{ route('dashboard.categories.create') }}"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                Create New Category
            </a>
        </div>

        @if(session('success'))
            <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400"
                role="alert">
                <span class="font-medium">Success!</span> {{ session('success') }}
            </div>
        @endif

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">#</th>
                        <th scope="col" class="px-6 py-3">Category Name</th>
                        <th scope="col" class="px-6 py-3">Slug</th>
                        <th scope="col" class="px-6 py-3">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr
                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <td class="px-6 py-4">{{ $loop->iteration }}</td>
                            <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $category->name }}
                            </td>
                            <td class="px-6 py-4">{{ $category->slug }}</td>
                            <td class="px-6 py-4 flex gap-2">
                                <a href="{{ route('dashboard.categories.edit', $category->slug) }}"
                                    class="font-medium text-yellow-600 dark:text-yellow-500 hover:underline">Edit</a>
                                <form action="{{ route('dashboard.categories.destroy', $category->slug) }}" method="post"
                                    class="inline">
                                    @method('delete')
                                    @csrf
                                    <button
                                        class="font-medium text-red-600 dark:text-red-500 hover:underline border-0 bg-transparent cursor-pointer"
                                        onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-dashboard-layout>c