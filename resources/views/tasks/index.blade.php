<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My Tasks') }}
        </h2>
    </x-slot>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            if ($('#flash-message').length > 0) {
                $('#flash-message').slideDown();
                setTimeout(function () {
                    $('#flash-message').slideUp();
                }, 3000);
            }
        });
    </script>

    @if(session('success'))
        <div id="flash-message" class="bg-green-200 text-green-800 p-2 mt-4 mx-auto max-w-md text-center">
            {{ session('success') }}
        </div>
    @endif

    <!-- Filter form -->
    <div>
        <form action="{{ route('tasks.index') }}" method="GET" class="p-2 mt-2 mx-auto max-w-md text-center">
            <label for="status" class="block text-gray-700 font-semibold p-2">Filter by Status</label>
            <select name="status" id="status" class="w-64 border-gray-300 rounded-md p-2">
                <option value="">All</option>
                <option value="1" {{ request('status') == '1' ? 'selected' : '' }}>Completed</option>
                <option value="0" {{ request('status') == '0' ? 'selected' : '' }}>Not Completed</option>
            </select>
            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded mt-2">
                Apply Filter
            </button>
        </form>
    </div>

    <div>
        <form action="{{ route('tasks.index') }}" method="GET" class="p-2 mt-2 mx-auto max-w-md text-center">
            <label for="sort" class="block text-gray-700 font-semibold p-2">Sort by Due Date:</label>
            <select name="sort" id="sort" class="w-64 border-gray-300 rounded-md p-2">
                <option value="">None</option>
                <option value="asc" {{ Request::query('sort') == 'asc' ? 'selected' : '' }}>Ascending</option>
                <option value="desc" {{ Request::query('sort') == 'desc' ? 'selected' : '' }}>Descending</option>
            </select>
            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded mt-2">
                Sort
            </button>
        </form>
    </div>

    <div class="mt-4">
        @foreach($tasks as $task)
            <div class="py-2">
                <div class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="bg-white shadow-sm rounded-lg overflow-hidden">
                        <div class="p-6">
                            <h2 class="text-xl font-semibold text-gray-900">
                                <a href="{{ route('tasks.show', $task->id) }}">Title: {{ $task->title }}</a>
                            </h2>                            <p class="mt-2 text-gray-600">Description: {{ $task->description }}</p>
                            <div class="flex items-center mt-4">
                                <p class="text-sm text-gray-600">Due Date: {{ $task->due_date }}</p>
                            </div>
                            <div class="mt-4">
                            <span
                                class="px-2 py-1 text-xs font-bold shadow {{ $task->status ? 'bg-green-200 text-green-800' : 'bg-red-200 text-red-800' }} rounded-full">{{ $task->status ? 'Completed' : 'Not Completed' }}</span>
                            </div>
                            <div class="inline-flex">
                                <div class="mt-6">
                                    <a href="{{ route('tasks.edit', $task->id) }}"
                                       class="inline-block bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded">
                                        Edit
                                    </a>
                                </div>
                                <div class="mt-6 ml-1">
                                    <form action="{{ route('tasks.destroy', $task->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="inline-block bg-red-500 hover:bg-red-600 text-white font-semibold py-2 px-4 rounded">Delete</button>
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</x-app-layout>

