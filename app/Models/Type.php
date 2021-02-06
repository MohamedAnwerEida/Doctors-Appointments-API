<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    use HasFactory;

    const Admin     = 'Admin';
    const Doctor    = 'Doctor';
    const Patient   = 'Patient';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
    ];

    public static function GetTypesArray()
    {
        return [
            self::Admin,
            self::Doctor,
            self::Patient,
        ];
    }
    public static function GetTypeId($type)
    {
        return self::where('name', $type)->first()->id;
    }
}
