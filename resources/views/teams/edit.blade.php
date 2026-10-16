<x-app-layout>
    <x-slot name="header"><h2 class="font-semibold text-xl text-gray-800">Edit team</h2></x-slot>
    <div class="py-8 max-w-2xl mx-auto sm:px-6 lg:px-8">
        @include('teams._form', ['action' => route('teams.update', $team)])
    </div>
</x-app-layout>
