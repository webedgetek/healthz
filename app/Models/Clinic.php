<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clinic extends Model
{
    use HasFactory;

    protected $table = 'clinics';
    protected $primaryKey = 'clinic_id';
    public $timestamps = false;
    protected $keyType = 'string';
    public $incrementing = false;
    
    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function gender()
    {
        return $this->belongsTo(Gender::class. 'gender_id');
    }

    public function age()
    {
        return $this->belongsTo(Age::class, 'age_id');
    }
    
    protected $fillable = [
        'clinic_id',
        'clinic',
        'gender_id',
        'age_id',
        // 'child_code',
        // 'adult_code',
        'user_id',
        'added_id',
        'added_date',
        'udpated_by',
        'status',
        'archived',
        'archived_id',
        'archived_by',
        'archived_date'
    ];
}
