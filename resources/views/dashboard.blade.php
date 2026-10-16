<x-app-layout>
    <x-slot name="header"><h2 class="font-semibold text-xl text-gray-800">Championship Manager</h2></x-slot>
    <div class="py-8 max-w-4xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white shadow rounded p-6">
            <p class="mb-4">Welcome, {{ Auth::user()->name }}!</p>
            <a href="{{ route('teams.index') }}" class="px-4 py-2 bg-indigo-600 text-white rounded">Manage teams</a>
        </div>
    </div>
</x-app-layout>
