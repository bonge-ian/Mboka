<?php

declare(strict_types=1);

namespace App\Faker\Provider\en_KE;

class Internet extends \Faker\Provider\Internet
{
    protected static $freeEmailDomain = ['gmail.com', 'yahoo.com', 'hotmail.com', 'gmail.co.ke', 'yahoo.co.ke', 'hotmail.co.ke'];

    protected static $tld = ['com', 'com', 'com', 'com', 'com', 'com', 'biz', 'info', 'net', 'org', 'co.ke', 'ke', 'org.ke'];
}
