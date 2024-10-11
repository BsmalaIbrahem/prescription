<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prescription extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'patient_id', 'symptoms', 'consultation_time', 'tests', 'medicines'];

    protected $casts = [
        'symptoms' => "array",
        "tests" => "array",
        "consultation_time" => "date",
        "medicines" => "array",
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }
}
