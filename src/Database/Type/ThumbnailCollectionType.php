<?php

namespace App\Database\Type;

use App\Model\Helper\ThumbnailCollection;
use Cake\Database\DriverInterface;
use Cake\Database\Type\BaseType;
use PDO;

class ThumbnailCollectionType extends BaseType
{
    /**
     * Casts given value from a PHP type to one acceptable by a database.
     *
     * @param ThumbnailCollection $value Value to be converted to a database equivalent.
     * @param DriverInterface $driver Object from which database preferences and configuration will be extracted.
     * @return string Given PHP type casted to one acceptable by a database.
     */
    public function toDatabase($value, DriverInterface $driver): string
    {
        return json_encode($value);
    }

    /**
     * Marshals flat data into PHP objects.
     *
     * Most useful for converting request data into PHP objects,
     * that make sense for the rest of the ORM/Database layers.
     *
     * @param mixed $value The value to convert.
     * @return ThumbnailCollection|null Converted value.
     */
    public function marshal($value): ?ThumbnailCollection
    {
        if ($value instanceof ThumbnailCollection || $value === null) return $value;
        if (is_string($value)) return $this->toPHP($value);
        if (is_array($value)) return new ThumbnailCollection($value);

        return null;
    }

    /**
     * Casts given value from a database type to a PHP equivalent.
     *
     * @param mixed $value Value to be converted to PHP equivalent
     * @param DriverInterface|null $driver Object from which database preferences and configuration will be extracted
     * @return ThumbnailCollection|null Given value casted from a database to a PHP equivalent.
     */
    public function toPHP($value, ?DriverInterface $driver = null): ?ThumbnailCollection
    {
        if ($value === null) {
            return null;
        }
        $data = json_decode($value, true);

        return new ThumbnailCollection($data);
    }

    /**
     * Casts given value to its Statement equivalent.
     *
     * @param mixed $value Value to be converted to PDO statement.
     * @param DriverInterface $driver Object from which database preferences and configuration will be extracted.
     * @return int Given value casted to its Statement equivalent.
     */
    public function toStatement($value, DriverInterface $driver): int
    {
        if ($value === null) {
            return PDO::PARAM_NULL;
        }
        return PDO::PARAM_STR;
    }

}
