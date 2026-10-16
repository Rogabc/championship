<?php
namespace Database\Seeders;
use App\Models\Team;
use App\Models\Tournament;
use App\Models\User;
use Illuminate\Database\Seeder;
class DatabaseSeeder extends Seeder {
    public function run(): void {
        User::factory()->create(['name' => 'Demo', 'email' => 'demo@example.com']); // password: password
        $a = Tournament::create(['name' => 'Riga Open 2026', 'game' => 'Basketball', 'start_date' => '2026-11-01']);
        $b = Tournament::create(['name' => 'Baltic Cup', 'game' => 'Football', 'start_date' => '2026-12-05']);
        $teams = [
            [$a, 'Riga Rockets', 'RRK', 'Riga', 5], [$a, 'Liepaja Waves', 'LPW', 'Liepaja', 3],
            [$a, 'Jelgava Bears', 'JLB', 'Jelgava', 4], [$a, 'Daugavpils Hawks', 'DGH', 'Daugavpils', 2],
            [$b, 'Ventspils FC', 'VFC', 'Ventspils', 6], [$b, 'Valmiera United', 'VAU', 'Valmiera', 4],
            [$b, 'Tallinn Titans', 'TLT', 'Tallinn', 3], [$b, 'Kaunas Lions', 'KAL', 'Kaunas', 5],
        ];
        foreach ($teams as [$t, $n, $tag, $city, $w]) {
            Team::create(['tournament_id' => $t->id, 'name' => $n, 'tag' => $tag, 'city' => $city, 'wins' => $w]);
        }
    }
}
