<?php

namespace App\Utility;

use DateInterval;
use Exception;

class Duration
{
    public static function humanize(?string $duration = null, ?string $format = '%i minutes'): string
    {
        if (is_null($duration)) return '';

        try {
            $interval = new DateInterval($duration);
            return $interval->format($format);
        } catch (Exception $e) {
            return '';
        }
    }
}
