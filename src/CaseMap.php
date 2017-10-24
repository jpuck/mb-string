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
        $this->map($string);
    }

    protected function map(string $string)
    {
        $this->map = [];

        for ($i = 0; $i < mb_strlen($string); $i++) {
            $char = mb_substr($string, $i, 1);
            $this->map []= $this->isUpper($char);
        }
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

    public function transform(string $input) : string
    {
        $string = '';

        for ($i = 0; $i < mb_strlen($input); $i++) {
            $char = mb_substr($input, $i, 1);
            $string .= $this->convertCase($char, $i);
        }

        return $string;
    }

    protected function convertCase(string $char, int $index)
    {
        if (!isset($this->map[$index])) {
            return $char;
        }

        if ($this->map[$index]) {
            return mb_convert_case($char, MB_CASE_UPPER);
        }

        return mb_convert_case($char, MB_CASE_LOWER);
    }
}
