<?php


namespace App\Helpers;


use Carbon\Carbon;

class DateUtil
{
    public static function formatDate($date,$dateFormat = null,$defaultDateNull = false){
        if($dateFormat == null){
            $dateFormat = config('custom-config.date_format');
        }
        if($date == ''){
            if($defaultDateNull){
                return Carbon::parse(null);
            }else{
                return '';
            }
        }
        return Carbon::parse($date)->format($dateFormat);
    }
}
