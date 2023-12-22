<?php

namespace App\Models;

use ALajusticia\AuthTracker\Traits\AuthTracking;
use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use LaravelAndVueJS\Traits\LaravelPermissionToVueJS;
use Spatie\Permission\Traits\HasRoles;

class Candidate extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    protected $guarded = [];

    protected $hidden = [
        'api_token',
        'reset_code',
        'password',
        'remember_token',
    ];
    protected $table = 'candidates';
    protected $fillable = [
        'name',
        'email',
        'password',
        'last_login_time',
        'last_login_ip'
    ];


    public function candidate_professions(){
        return $this->hasMany(CandidateProfession::class)->withTrashed();
    }

    public function candidate_references(){
        return $this->hasMany(CandidateReference::class)->withTrashed();
    }
}
