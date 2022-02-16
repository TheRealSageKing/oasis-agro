<?php

namespace App\Models\v1;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvestmentHistory extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $dates= ['created_at','updated_at'];

    public function Investment()
    {
        return $this->belongsTo(Investment::class);
    }
}
