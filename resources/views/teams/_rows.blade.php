@forelse($teams as $t)
<tr class="border-t">
    <td class="p-3">{{ $t->name }}</td>
    <td>{{ $t->tag }}</td>
    <td>{{ $t->tournament->name }}</td>
    <td>{{ $t->wins }}</td>
    <td class="text-right p-3">
        <a href="{{ route('teams.edit', $t) }}" class="text-indigo-600">Edit</a>
        <button class="del text-red-600 ml-2" data-url="{{ route('teams.destroy', $t) }}">Delete</button>
    </td>
</tr>
@empty
<tr><td colspan="5" class="p-3">No teams found.</td></tr>
@endforelse
