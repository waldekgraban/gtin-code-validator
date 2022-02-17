

# GTIN Code Validator
A simple check that the GTIN code is correct.

### Introduction
You just found a simple class to validate GTIN (EAN) codes in versions: GTIN-8, GTIN-12, GTIN-13, GTIN-14, GSIN, SSCC

![enter image description here](https://github.com/waldekgraban/gtin-code-validator/blob/main/img/GTIN%20Code%20Validation.png?raw=true)
### Installation
Install this validator to your php project by composer. 

Add to your **composer.json**:

    "repositories": [
        {
            "type": "vcs",
            "url": "https://github.com/waldekgraban/gtin-code-validator.git"
        }
    ], 

Then run:
`$ composer install`

### How it's working - step by step

We create the code for verification as an object of the GtinCode class that is extended with an abstract validator class.

    $code = "012345678905";
    $gtin = new GtinCode($code);

Then, to get a boolean value with the validation result, just run the isValid() method.

	$gtin->isValid()

That's all.


Validator checks:  
- whether the code provided only consists of digits  
- whether the given code is of the correct length  
- is the checksum correct

We can, of course, check the individual values of interest to us:
1) Whether the code provided only consists of digits:
`$gtin->isContainsOnlyDigits()`
2) Whether the given code is of the correct length:
`$gtin->isCorrectLength()`
3) Is the checksum correct:
`$gtin->isChecksumCorrect()`

However, I recommend that you use only the method `isValidate()`, the order of checking individual values is important.
