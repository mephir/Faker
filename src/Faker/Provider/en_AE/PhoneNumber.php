<?php

namespace Faker\Provider\en_AE;

class PhoneNumber extends \Faker\Provider\PhoneNumber
{
    protected static $formats = array(
        '+971 %########',
        '00971 %########',
        '%########',
        '0%########',
    );
}
