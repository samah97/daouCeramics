<?php


namespace App\Helpers;


use Illuminate\Support\Facades\Crypt;

class SecurityUtil
{
    const ENCRYPTION_SALT = "سكيورتي_سالت";
    const CART_ENCRYPTION_SALT = "$!@EQA9.-#!CART_سكيورتي";

    public static function encrypt($text)
    {
        return $text;//encrypt($text);
    }

    public static function decrypt($text)
    {
        return $text;//decrypt($text);
    }

    public static function encryptId($text){
        return Crypt::encryptString($text.self::ENCRYPTION_SALT);
    }

    public static function decryptId($encryptedText){
        $decrypted = Crypt::decryptString($encryptedText);

        return str_replace(self::ENCRYPTION_SALT,'',$decrypted);
    }
}
