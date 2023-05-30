<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Task') }}
        </h2>
    </x-slot>

    <div class="max-w-2xl mx-auto mt-8">
        <form action="{{ route('tasks.update', $task->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="title" class="block text-gray-700 font-semibold mb-2">Title</label>
                <input type="text" name="title" id="title" class="w-full border-gray-300 rounded-md p-2" required value="{{ $task->title }}">
                @error('title')
                <p class="text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label for="description" class="block text-gray-700 font-semibold mb-2">Description</label>
                <textarea name="description" id="description" rows="4" class="w-full border-gray-300 rounded-md p-2"
                          required>{{ $task->description }}</textarea>
                @error('description')
                <p class="text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label for="due_date" class="block text-gray-700 font-semibold mb-2">Due Date</label>
                <input type="date" name="due_date" id="due_date" class="w-full border-gray-300 rounded-md p-2"
                       required value="{{ $task->due_date }}">
                @error('due_date')
                <p class="text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label for="status" class="block text-gray-700 font-semibold mb-2">Status</label>
                <select name="status" id="status" class="w-full border-gray-300 rounded-md p-2" required>
                    <option value="1" {{ $task->status == 1 ? 'selected' : '' }}>Completed</option>
                    <option value="0" {{ $task->status == 0 ? 'selected' : '' }}>Not Completed</option>
                </select>
            </div>
            <div>
                <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded">
                    Edit Task
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
