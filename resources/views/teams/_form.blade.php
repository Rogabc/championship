@php $team = $team ?? null; @endphp
<form method="POST" action="{{ $action }}" class="space-y-4 bg-white p-6 shadow rounded">
    @csrf
    @if($team) @method('PUT') @endif
    <div>
        <label class="block font-medium">Tournament</label>
        <select name="tournament_id" class="w-full border-gray-300 rounded">
            @foreach($tournaments as $tr)
                <option value="{{ $tr->id }}" @selected(old('tournament_id', $team?->tournament_id) == $tr->id)>{{ $tr->name }}</option>
            @endforeach
        </select>
        @error('tournament_id')<p class="text-red-600 text-sm">{{ $message }}</p>@enderror
    </div>
    @foreach(['name' => 'Name', 'tag' => 'Tag (max 5)', 'city' => 'City', 'wins' => 'Wins'] as $f => $label)
        <div>
            <label class="block font-medium">{{ $label }}</label>
            <input name="{{ $f }}" value="{{ old($f, $team?->$f ?? ($f === 'wins' ? 0 : '')) }}" class="w-full border-gray-300 rounded">
            @error($f)<p class="text-red-600 text-sm">{{ $message }}</p>@enderror
        </div>
    @endforeach
    <button class="px-4 py-2 bg-indigo-600 text-white rounded">Save</button>
    <a href="{{ route('teams.index') }}" class="ml-2 text-gray-600">Cancel</a>
</form>
