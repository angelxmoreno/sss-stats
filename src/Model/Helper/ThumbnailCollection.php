<?php

namespace App\Model\Helper;

class ThumbnailCollection
{
    public Thumbnail $default;
    public Thumbnail $medium;
    public Thumbnail $high;
    public Thumbnail $standard;
    public Thumbnail $maxres;

    public function __construct(array $data)
    {
        foreach ($data as $prop => $datum) {
            $this->{$prop} = new Thumbnail();
            foreach ($datum as $key => $val) {
                $this->{$prop}->{$key} = $val;
            }
        }
    }


}
