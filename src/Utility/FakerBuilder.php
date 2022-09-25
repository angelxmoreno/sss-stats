<?php

namespace App\Utility;

use Faker\Factory;
use Faker\Generator;

class FakerBuilder
{
    protected static ?Generator $faker = null;

    public static function getInstance(): Generator
    {
        if (!self::$faker) {
            $faker = Factory::create('en_US');
            self::$faker = $faker;
        }

        return self::$faker;
    }
}
