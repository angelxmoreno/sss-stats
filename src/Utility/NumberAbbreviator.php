<?php

namespace App\Utility;

class NumberAbbreviator
{
    protected const A_THOUSAND = 1000;
    protected const A_MILLION = self::A_THOUSAND * self::A_THOUSAND;
    protected const A_BILLION = self::A_MILLION * self::A_THOUSAND;
    protected const A_TRILLION = self::A_BILLION * self::A_THOUSAND;

    protected static array $data = [
        [self::A_THOUSAND, self::A_MILLION, 'K+'],
        [self::A_MILLION, self::A_BILLION, 'M+'],
        [self::A_BILLION, self::A_TRILLION, 'B+'],
    ];

    public static function shorten(int $number): string
    {
        foreach (self::$data as $row) {
            [$little, $big, $suffix] = $row;
            if ($number > $little && $number < $big) {
                return sprintf('%d%s', floor($number / $little), $suffix);
            }
        }
        return (string)$number;
    }
}
