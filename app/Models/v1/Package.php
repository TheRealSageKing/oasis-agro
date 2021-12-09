<?php

namespace App\Models\v1;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $dates= ['created_at'];

    public function investments()
    {
        return $this->hasMany(Investment::class);
    }
}
