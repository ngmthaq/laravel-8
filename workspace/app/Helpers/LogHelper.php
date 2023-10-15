<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Log;

final class LogHelper
{
    final public static function error(string $message, array $context = [])
    {
        Log::channel("error")->error($message, $context);
    }

    final public static function query(string $message, array $context = [])
    {
        Log::channel("query")->info($message, $context);
    }

    final public static function auth(string $message, array $context = [])
    {
        Log::channel("auth")->info($message, $context);
    }

    final public static function debug(string $message, array $context = [])
    {
        Log::channel("debug")->debug($message, $context);
    }
}
