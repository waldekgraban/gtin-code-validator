<?php
/*
 *
 * Created by Waldemar Graban 2022
 *
 */

namespace Waldekgraban\GtinCodeValidator\Validator;

abstract class Validator
{
    const CORRECT_CODE_LENGTHS = [8,12,13,14,17,18];

    public function isContainsOnlyDigits(): bool
    {
        return preg_match("/^[0-9]+$/", $this->code)
            ? true
            : false;
    }

    public function isCorrectLength(): bool
    {
        return in_array($this->getLength(), self::CORRECT_CODE_LENGTHS) 
            ? true
            : false;
    }

    public function isChecksumCorrect(): bool
    {
        $sum_even = $sum_odd = 0;
        $even = true;

        $codeToValid = $this->getCodeWithoutLastDigit();
        while(strlen( $codeToValid ) > 0 )
        {
            $digit = substr($codeToValid, -1);
            
            if($even)
                $sum_even += 3 * $digit;
            else 
                $sum_odd += $digit;
            
            $even = !$even;
            
            $codeToValid = substr($codeToValid, 0, -1);
        }

        $sum = $sum_even + $sum_odd;
        $sum_rounded_up = ceil($sum/10) * 10;
        
        return ($this->getLastDigitOfCode() == ($sum_rounded_up - $sum));       
    }

    public function isValid(): bool
    {
        if(!$this->isContainsOnlyDigits()){
            return false;
        }

        return $this->isContainsOnlyDigits()
            && $this->isCorrectLength()
            && $this->isChecksumCorrect();
    }
}
