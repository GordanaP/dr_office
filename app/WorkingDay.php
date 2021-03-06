<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WorkingDay extends Model
{
    public function profiles()
    {
        return $this->belongsToMany(Profile::class)->as('work')->withPivot('start_at', 'end_at');
    }
}
