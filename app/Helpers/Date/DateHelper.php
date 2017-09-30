<?php

namespace App\Helpers\Date;

class DateHelper{

    /**
     * Format get date in n days ago
     * 
     * @param string $format
     * @param int $days
     * @return string
     */
    public static function getDateInManyDaysAgo($format, $days) {
        return date($format, strtotime('-'.$days.' days', time()));
    }
}