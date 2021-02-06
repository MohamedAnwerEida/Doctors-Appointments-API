<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;
    const Status_Pending    = 'Pending';
    const Status_Completed  = 'Completed';
    const Status_Canceled   = 'Canceled';

    protected $fillable = [
        'Status',
        'Patient',
        'Doctor',
    ];

    protected $dates = [
        'Start_date',
        'End_date'
    ];

    public static function GetStatusArray()
    {
        return [
            self::Status_Pending,
            self::Status_Completed,
            self::Status_Canceled,
        ];
    }
}
