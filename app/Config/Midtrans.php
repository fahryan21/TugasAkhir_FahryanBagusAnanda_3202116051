<?php
// File: app/Config/Midtrans.php

namespace App\Config;

class Midtrans
{
    public static function getConfig()
    {
        \Midtrans\Config::$serverKey = 'SB-Mid-server-PLy_6ayyk5PoE0Jque_o5U8W';
        \Midtrans\Config::$isProduction = false;  // Set to true if you are using production environment
        \Midtrans\Config::$isSanitized = true;
        \Midtrans\Config::$is3ds = true;
    }
}
