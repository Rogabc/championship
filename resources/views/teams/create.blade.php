<x-app-layout>
    <x-slot name="header"><h2 class="font-semibold text-xl text-gray-800">New team</h2></x-slot>
    <div class="py-8 max-w-2xl mx-auto sm:px-6 lg:px-8">
        @include('teams._form', ['action' => route('teams.store')])
    </div>
</x-app-layout>
