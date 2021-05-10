<?php


namespace App\Helpers;


use Illuminate\Support\Facades\Log;

class CustomLog
{
    const LOG_CHANNEL = 'custom-channel';
    public static $LOG_CHANNEL_ACCESS = 'access-channel';

    public static function getInstance($channel = null)
    {
        $channel = $channel == null?self::LOG_CHANNEL:$channel;
        return Log::channel($channel);
    }
}
