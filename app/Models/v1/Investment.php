<?php

namespace App\Models\v1;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Investment extends Model
{
    use HasFactory;

    protected $dates= ['created_at', 'maturity_date'];

    public function package()
    {
        return $this->belongsTo(Investment::class);
    }
}
