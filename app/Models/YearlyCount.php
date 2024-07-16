<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class YearlyCount extends Model
{
    use HasFactory;
    
    protected $fillable = ['year', 'count'];
}
