<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TeamMatch extends Model
{
    protected $fillable = ['match_id', 'team_id', 'points'];

    public function match()
    {
        return $this->belongsTo(Match::class, 'match_id');
    }


    public function team()
    {
        return $this->belongsTo(Team::class, 'team_id');
    }

}


