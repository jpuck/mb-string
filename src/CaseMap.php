<?php

namespace jpuck\mbstring;

use InvalidArgumentException;

class CaseMap
{
    protected $string = '';
    protected $map = [];

    public function __construct(string $string = null)
    {
        if (isset($string)) {
            $this->setString($string);
        }
    }

    public function setString(string $string)
    {
        $this->string = $string;
    }

    public function isUpper(string $char) : bool
    {
        if (mb_strlen($char) !== 1) {
            throw new InvalidArgumentException('Only one character is allowed.');
        }

        $upper = mb_convert_case($char, MB_CASE_UPPER);
        $lower = mb_convert_case($char, MB_CASE_LOWER);

        if ($upper === $lower) {
            return false;
        }

        return $upper === $char;
    }
}
