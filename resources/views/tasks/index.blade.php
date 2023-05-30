<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My Tasks') }}
        </h2>
    </x-slot>

    @foreach($tasks as $task)
        <div class="py-6">
            <div class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="bg-white shadow-sm rounded-lg overflow-hidden">
                    <div class="p-6">
                        <h2 class="text-xl font-semibold text-gray-900">{{ $task->title }}</h2>
                        <p class="mt-2 text-gray-600">{{ $task->description }}</p>
                        <div class="flex items-center mt-4">
                            <svg class="h-5 w-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <p class="ml-2 text-sm text-gray-600">{{ $task->due_date }}</p>
                        </div>
                        <div class="mt-4">
                            <span class="px-2 py-1 text-xs bg-{{ $task->status ? 'green' : 'red' }}-200 text-{{ $task->status ? 'green' : 'red' }}-800 rounded-full">{{ $task->status ? 'Completed' : 'Not Completed' }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

</x-app-layout>
