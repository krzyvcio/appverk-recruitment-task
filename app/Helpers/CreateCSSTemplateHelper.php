<?php

namespace App\Helpers;

use App\Data\GenerateFilesInputDTO;
use App\Services\LogService\LoggerServiceInterface;


class CreateCSSTemplateHelper
{

    private const string BACKGROUND_COLOR = '#FFA500';

    public function __construct(
        private readonly LoggerServiceInterface $loggerService
    ) {
    }

    public function createCSSTemplate(GenerateFilesInputDTO $inputDTO)
    {
        if (!$inputDTO) {
            throw new \Exception('InputDTO is null');
        }

        try {
            $css = file_get_contents(config('files.css'));
            $selectedModule = strtolower($inputDTO->getSelectedModule()); //BACKGROUND, TYPO

            switch ($selectedModule) {
                case 'background':
                    $css = str_replace('--orange: #FF9B00', '--orange: #' . self::BACKGROUND_COLOR, $css);
                    break;
                case 'typo':
                    //add to the end of the file .html{font-size: 24px !important!;}
                    $css = $css . '.html{font-size: 24px !important;}';
                    break;
                default:
                    break;
            }
        } catch (\Throwable $e) {
            $this->loggerService->logError($e->getMessage());

            throw new \Exception($e->getMessage());
        }
        return $css;

    }
}
