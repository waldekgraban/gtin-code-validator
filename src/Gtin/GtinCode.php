<?php
/*
 *
 * Created by Waldemar Graban 2022
 *
 */

namespace Waldekgraban\GtinCodeValidator\Gtin;

use Waldekgraban\GtinCodeValidator\Validator\Validator;

class GtinCode extends Validator
{
    public $code;

    public function __construct($code)
    {
        $this->code = $code;
    }

    public function getCode()
    {
        return $this->code;
    }

    public function getLength(): int
    {
        return strlen($this->code);
    }

    public function getLastDigitOfCode(): int
    {
        return substr($this->code, -1);
    }

    public function getCodeWithoutLastDigit(): int
    {
        return substr($this->code, 0, -1);
    }
}
