<?php
/*
 *
 * Created by Waldemar Graban 2022
 *
 */

namespace Waldekgraban\GtinCodeValidator;

require_once "../vendor/autoload.php";

use Waldekgraban\GtinCodeValidator\Gtin\GtinCode;

$code = "012345678905";

$gtin = new GtinCode($code);

//Example of use
if( $gtin->isValid() ){
    echo 'OK - The case where the Code is correct';
} else {
    echo 'Ups - The case where the Code is bad';
}
