<?php

declare(strict_types=1);

namespace App\Faker\Provider\en_KE;

class PhoneNumber extends \Faker\Provider\PhoneNumber
{
    protected static $formats = [
        '+254 7## ### ###',
        '+2547########',
        '+254 1## ### ###',
        '+2541########',
        '07## ### ###',
        '07########',
        '07## ### ###',
        '07########'
    ];
}
