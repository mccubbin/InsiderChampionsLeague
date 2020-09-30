<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Match extends Model
{
    protected $fillable = ['team_id1', 'team_id2'];

    public function team1()
    {
        return $this->belongsTo(Team::class, 'team_id1');
    }

    public function team2()
    {
        return $this->belongsTo(Team::class, 'team_id2');
    }
}
