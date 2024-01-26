<?php

namespace App\Services\GenerateFiles;

use App\Data\FileDTO;
use App\Data\GenerateFilesInputDTO;
use App\Helpers\CreateCSSTemplateHelper;
use App\Helpers\CreateHTMLTemplateHelper;
use App\Helpers\CreateJSTemplateHelper;
use App\Services\LogService\LoggerServiceInterface;
use Exception;
use Throwable;
use ZipArchive;

class GenerateFilesService implements GenerateFilesServiceInterface
{
    private $tempFolder;

    public function __construct(
        private readonly CreateHTMLTemplateHelper $createHTMLTemplateHelper,
        private readonly CreateCSSTemplateHelper  $createCSSTemplateHelper,
        private readonly CreateJSTemplateHelper   $createJSTemplateHelper,
        private readonly LoggerServiceInterface   $loggerService
    )
    {
        $this->tempFolder = config('temp.folder');
    }

    public function generateFiles(GenerateFilesInputDTO $inputDTO): string
    {
        try {
            $html = $this->createHTMLFile($inputDTO);
            $css = $this->createCSSFile($inputDTO);
            $js = $this->createJSFile($inputDTO);

            $zip = new ZipArchive();
            $zipFileName = sys_get_temp_dir() . '/module.zip';
            $zip->open($zipFileName, ZipArchive::CREATE | ZipArchive::OVERWRITE);
            $zip->addFile($html->getPath(), 'index.html');
            $zip->addFile($css->getPath(), 'style.css');
            $zip->addFile($js->getPath(), 'script.js');

            $zip->close();

            $path = realpath($zipFileName);
            if (!file_exists($zipFileName)) {
                throw new Exception('File does not exist: ' . $zipFileName);
            }

            if (!is_readable($zipFileName)) {
                throw new Exception('File is not readable: ' . $zipFileName);
            }
            $this->loggerService->info('Zip file created');
            return $path;
        } catch (Throwable $e) {
            $this->loggerService->logError($e->getMessage());
            throw new Exception($e->getMessage());
        }
    }

    private function createHTMLFile(GenerateFilesInputDTO $inputDTO): FileDTO
    {
        $html = $this->createHTMLTemplateHelper->createHTMLTemplate($inputDTO);
        $htmlFilePath = sys_get_temp_dir() . '/index.html';
        file_put_contents($htmlFilePath, $html);
        return new FileDTO($html, $htmlFilePath);
    }

    private function createCSSFile(GenerateFilesInputDTO $inputDTO): FileDTO
    {
        $css = $this->createCSSTemplateHelper->createCSSTemplate($inputDTO);
        $cssFilePath = sys_get_temp_dir() . '/style.css';
        file_put_contents($cssFilePath, $css);
        return new FileDTO($css, $cssFilePath);
    }

    private function createJSFile(GenerateFilesInputDTO $inputDTO): FileDTO
    {
        $js = $this->createJSTemplateHelper->createJSTemplate($inputDTO);
        $jsFilePath = sys_get_temp_dir() . '/script.js';
        file_put_contents($jsFilePath, $js);
        return new FileDTO($js, $jsFilePath);
    }
}
