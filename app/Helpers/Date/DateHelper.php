<?php

namespace App\Helpers\Date;

use Carbon\Carbon;

class DateHelper{

    /**
     * Format get date in n days ago
     * 
     * @param string $format
     * @param int $days
     * @return string
     */
    public static function getDateInManyDaysAgo($format, $days) {
        
        $range = Carbon::now()->subDays($days);
        
        return date($format, strtotime($range));
    }
}