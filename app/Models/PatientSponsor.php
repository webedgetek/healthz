<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PatientSponsor extends Model
{
    use HasFactory;
    protected $table = 'patient_sponsor';
    // protected $primaryKey = 'patient_id';
    public $timestamps = false;
    protected $keyType = 'string';
    public $incrementing= false;

    protected $fillable = [
        'patient_id',
        'opd_number',
        'member_no',
        'sponsor_type',
        'sponsor_name',
        'start_date',
        'end_date',
        'dependant',
        'records_id',
        'user_id',
        'added_id',
        'added_date',
        'udpated_by',
        'status',
        'archived',
        'archived_id',
        'archived_by',
        'archived_date',
        '_token'
    ];
}
