<?php

namespace App\Helpers;

use App\Services\LogService\LoggerServiceInterface;
use Exception;

class CreateHTMLTemplateHelper
{
    public function __construct(
        private readonly LoggerServiceInterface $loggerService
    ) {
    }
    public function createHTMLTemplate($inputDTO)
    {
        try {
            $html = file_get_contents(config('files.html'));
            $html = str_replace('<span class="selected-module-pane__module"></span>', '<span class="selected-module-pane__module">' . $inputDTO->getSelectedModule() . '</span>', $html);
            
            return $html;

        } catch (\Throwable $e) {
            $this->loggerService->logError($e->getMessage());

            throw new Exception('HTML file not found');
        }
    }
}