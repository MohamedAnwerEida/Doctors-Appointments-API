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
        'Start_date',
        'End_date',
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

    public function Doc()
    {
        return $this->belongsTo(User::class , 'Doctor', 'id');
    }

    public function Pat()
    {
        return $this->belongsTo(User::class , 'Patient', 'id');
    }

    public static function rules($request,$id = NULL)
    {
        $rules = [
            'Start_date'                    => 'required|date',
            'End_date'                      => 'required|date',
            'Doctor'                        => 'required|integer',
            'Patient'                       => 'required|integer',
        ];
        return $rules;
    }
    public static function credentials($request,$id1 = NULL,$id2 = NULL)
    {
        $credentials = [
            'Start_date'                => $request->Start_date,
            'End_date'                  => $request->End_date,
            'Patient'                   => $request->Patient,
            'Doctor'                    => $request->Doctor,
        ];
        return $credentials;
    }
}
