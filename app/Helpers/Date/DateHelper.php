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

    public static function getPeriodOfTime($datetime, $format = 'Y-m-d H:i:s', $full = false) {
        $now = Carbon::now();
        $ago = Carbon::createFromFormat($format, $datetime);
        $diff = $now->diff($ago);

        $diff->w = floor($diff->d / 7);
        $diff->d -= $diff->w * 7;

        $string = array(
            'y' => 'year',
            'm' => 'month',
            'w' => 'week',
            'd' => 'day',
            'h' => 'hour',
            'i' => 'minute',
            's' => 'second',
        );
        foreach ($string as $k => &$v) {
            if ($diff->$k) {
                $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
            } else {
                unset($string[$k]);
            }
        }

        if (!$full) $string = array_slice($string, 0, 1);
        return $string ? implode(', ', $string) : 'just now';
    }
}