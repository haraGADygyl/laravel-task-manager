<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My Tasks') }}
        </h2>
    </x-slot>

    <div class="max-w-2xl mx-auto mt-8">
        <h2 class="text-2xl font-semibold mb-4">Create Task</h2>
        <form action="{{ route('tasks.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="title" class="block text-gray-700 font-semibold mb-2">Title</label>
                <input type="text" name="title" id="title" class="w-full border-gray-300 rounded-md p-2" required>
                @error('title')
                <p class="text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label for="description" class="block text-gray-700 font-semibold mb-2">Description</label>
                <textarea name="description" id="description" rows="4" class="w-full border-gray-300 rounded-md p-2"
                          required></textarea>
                @error('description')
                <p class="text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label for="due_date" class="block text-gray-700 font-semibold mb-2">Due Date</label>
                <input type="date" name="due_date" id="due_date" class="w-full border-gray-300 rounded-md p-2"
                       required>
                @error('due_date')
                <p class="text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded">
                    Create Task
                </button>

            </div>
        </form>
    </div>
</x-app-layout>
