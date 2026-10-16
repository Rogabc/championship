<?php
namespace App\Http\Controllers;
use App\Http\Requests\TeamRequest;
use App\Models\Team;
use App\Models\Tournament;
use Illuminate\Http\Request;
class TeamController extends Controller {
    public function index(Request $request) {
        $teams = Team::with('tournament')
            ->when($request->q, fn($q, $s) => $q->where('name', 'like', "%$s%"))
            ->orderBy('name')->get();
        if ($request->ajax()) return view('teams._rows', compact('teams')); // AJAX: partial only
        return view('teams.index', compact('teams'));
    }
    public function create() {
        return view('teams.create', ['tournaments' => Tournament::all()]);
    }
    public function store(TeamRequest $request) {
        Team::create($request->validated());
        return redirect()->route('teams.index')->with('ok', 'Team created');
    }
    public function edit(Team $team) {
        return view('teams.edit', ['team' => $team, 'tournaments' => Tournament::all()]);
    }
    public function update(TeamRequest $request, Team $team) {
        $team->update($request->validated());
        return redirect()->route('teams.index')->with('ok', 'Team updated');
    }
    public function destroy(Request $request, Team $team) {
        $team->delete();
        if ($request->expectsJson()) return response()->json(['ok' => true]);
        return redirect()->route('teams.index')->with('ok', 'Team deleted');
    }
}
