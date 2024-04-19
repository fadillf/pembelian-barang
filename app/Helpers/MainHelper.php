<?php

namespace App\Helpers;

use Carbon\Carbon;

class MainHelper
{
    public static function convertDateToIndonesianFormat($date, $withTime = false)
    {
        $date = Carbon::parse($date);
        $formattedDate = $date->format('j F Y');
        if ($withTime) {
            $formattedDate .= ' ' . $date->format('H:i:s');
        }
        return $formattedDate;
    }
}
