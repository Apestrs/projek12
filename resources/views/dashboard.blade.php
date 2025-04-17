<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>

    <!-- Tambahkan tombol logout -->
    <div class="mt-4 text-center">
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded">
                Logout
            </button>
        </form>
    </div>
</x-app-layout>