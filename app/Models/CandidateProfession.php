<?php

namespace App\Models;

use Carbon\Carbon;

class CandidateProfession extends BaseModel
{
    protected $guarded = [];

    public function candidate(){
        return $this->belongsTo(Candidate::class)->withTrashed();
    }

    public function getCreatedAtAttribute($key)
    {
        return Carbon::parse($key)->format('Y-m-d h:i:s');
    }
}