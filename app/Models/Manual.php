<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Manual extends Model
{
    use HasFactory;

    // Define the relationship to the Brand model
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
}
