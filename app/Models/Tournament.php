<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Tournament extends Model {
    protected $fillable = ['name', 'game', 'start_date'];
    public function teams() { return $this->hasMany(Team::class); }
}
