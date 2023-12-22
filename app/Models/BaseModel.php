<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BaseModel extends Model
{
    use HasFactory, SoftDeletes;

    public $timestamps = true;

    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
    ];

    public function getModelName()
    {
        preg_match_all('/(?:^|[A-Z])[a-z]+/', class_basename($this), $matches);

        return implode(
            ' ',
            $matches[0]
        );
    }

}
