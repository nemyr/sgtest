<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PrizeMoney extends Model
{
    const convertCoef = 10;
    //
    public static function convertToBonus($amount){
        return $amount * self::convertCoef;
    }

}
