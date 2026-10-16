<x-app-layout>
    <x-slot name="header"><h2 class="font-semibold text-xl text-gray-800">Teams</h2></x-slot>
    <div class="py-8 max-w-4xl mx-auto sm:px-6 lg:px-8">
        @if(session('ok'))<div class="bg-green-100 p-3 mb-4 rounded">{{ session('ok') }}</div>@endif
        <div class="flex justify-between mb-4">
            <input id="search" type="text" placeholder="Search teams..." class="border-gray-300 rounded">
            <a href="{{ route('teams.create') }}" class="px-4 py-2 bg-indigo-600 text-white rounded">+ New team</a>
        </div>
        <table class="w-full bg-white shadow rounded text-left">
            <thead><tr><th class="p-3">Name</th><th>Tag</th><th>Tournament</th><th>Wins</th><th></th></tr></thead>
            <tbody id="rows">@include('teams._rows')</tbody>
        </table>
    </div>
    <script>
        const csrf = '{{ csrf_token() }}';
        let timer;
        // AJAX live search
        document.getElementById('search').addEventListener('input', e => {
            clearTimeout(timer);
            timer = setTimeout(async () => {
                const r = await fetch('{{ route('teams.index') }}?q=' + encodeURIComponent(e.target.value),
                    { headers: { 'X-Requested-With': 'XMLHttpRequest' } });
                document.getElementById('rows').innerHTML = await r.text();
            }, 250);
        });
        // AJAX delete without reload
        document.getElementById('rows').addEventListener('click', async e => {
            const b = e.target.closest('.del');
            if (!b || !confirm('Delete this team?')) return;
            const r = await fetch(b.dataset.url, { method: 'DELETE',
                headers: { 'X-CSRF-TOKEN': csrf, 'Accept': 'application/json' } });
            if (r.ok) b.closest('tr').remove();
        });
    </script>
</x-app-layout>
