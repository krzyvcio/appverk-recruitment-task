<?php

namespace App\Services\LogService;

interface LoggerServiceInterface
{
    public function logInfo($message);

    public function logError($message);

    public function info($message);
}