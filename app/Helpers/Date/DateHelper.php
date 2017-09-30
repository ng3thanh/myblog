<?php

namespace App\Helpers\Date;

class DateHelper{

    public static function getDateInManyDaysAgo($format, $days) {
        return date($format, strtotime('-'.$days.' days', time()));
    }
}