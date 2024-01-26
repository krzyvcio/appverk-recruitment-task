<?php

namespace App\Services\LogService;

use Illuminate\Support\Facades\Log;


class LoggerService implements LoggerServiceInterface
{
    public function logInfo($message)
    {
        Log::info($message);
    }

    public function logError($message)
    {
        Log::error($message);
    }

    public function info($message)
    {
        Log::info($message);
    }
}
