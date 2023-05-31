<x-guest-layout>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <div class="mb-4 text-l text-gray-600">
            Welcome to the Task Manager Application! This application allows you to manage your tasks efficiently and stay organized.
        </div>

        <div class="mt-6 flex justify-between">
            <x-primary-button>
                <a href="{{ route('login') }}">Login</a>
            </x-primary-button>
            <x-primary-button>
                <a href="{{ route('register') }}">Register</a>
            </x-primary-button>
        </div>
</x-guest-layout>
