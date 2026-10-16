<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Team extends Model {
    protected $fillable = ['tournament_id', 'name', 'tag', 'city', 'wins'];
    public function tournament() { return $this->belongsTo(Tournament::class); }
}
