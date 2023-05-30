<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Task Details') }}
        </h2>
    </x-slot>

    <div class="max-w-2xl mx-auto mt-8">
        <div class="bg-white shadow-sm rounded-lg overflow-hidden">
            <div class="p-6">
                <h2 class="text-xl font-semibold text-gray-900">Title: {{ $task->title }}</h2>
                <p class="mt-2 text-gray-600">{{ $task->description }}</p>
                <div class="flex items-center mt-4">
                    <p class="text-sm text-gray-600">Due Date: {{ $task->due_date }}</p>
                </div>
                <div class="mt-4">
                    <span class="px-2 py-1 text-xs bg-{{ $task->status ? 'green' : 'red' }}-200 text-{{ $task->status ? 'green' : 'red' }}-800 rounded-full">{{ $task->status ? 'Completed' : 'Not Completed' }}</span>
                </div>
                <div class="mt-4">
                    <a href="{{ route('tasks.index') }}" class="inline-block bg-gray-700 hover:bg-gray-800 text-white font-semibold py-2 px-4 rounded">
                        Back
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
