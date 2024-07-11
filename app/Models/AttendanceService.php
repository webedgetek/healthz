<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttendanceService extends Model
{
    use HasFactory;
    protected $table = 'attendance_services';
    protected $primaryKey = 'att_service_id';
    public $timestamps = false;
    protected $keyType = 'string';
    public $incrementing= false;

    protected $fillable = [
        'att_service_id',
        'description',
        'gender_id',
        'age_id',
        'child_code',
        'adult_code',
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
