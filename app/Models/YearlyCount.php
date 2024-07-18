<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class YearlyCount extends Model
{
    use HasFactory;

    protected $table = 'yearly_count';
    protected $primaryKey = 'year_id';
    public $timestamps = false;
    protected $keyType = 'string';
    public $incrementing= false;
    
    protected $fillable = [
         'year',
         'count'
        ];
}
