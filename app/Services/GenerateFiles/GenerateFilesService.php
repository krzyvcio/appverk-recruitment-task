<?php

namespace App\Services\GenerateFiles;

use App\Data\GenerateFilesInputDTO;
use App\Services\LogService\LoggerServiceInterface;
use App\Helpers\CreateHTMLTemplateHelper;
use App\Helpers\CreateCSSTemplateHelper;
use App\Helpers\CreateJSTemplateHelper;

class GenerateFilesService implements GenerateFilesServiceInterface
{


    private $tempFolder;

    public function __construct(
        private readonly CreateHTMLTemplateHelper $createHTMLTemplateHelper,
        private readonly CreateCSSTemplateHelper $createCSSTemplateHelper,
        private readonly CreateJSTemplateHelper $createJSTemplateHelper,
        private readonly LoggerServiceInterface $loggerService
    ) {
        $this->tempFolder = config('temp.folder');

    }
    //appverk recrutment task

    public function generateFiles(GenerateFilesInputDTO $inputDTO, string $subfolder): string
    {
        try {

            $html = $this->createHTMLFile($subfolder, $inputDTO);
            $css = $this->createCSSFile($subfolder, $inputDTO);
            $js = $this->createJSFile($subfolder, $inputDTO);

            $zip = new \ZipArchive();
            $zipFileName = $subfolder . '/module.zip';
            $zip->open($zipFileName, \ZipArchive::CREATE | \ZipArchive::OVERWRITE);
            $zip->addFile($html, 'index.html');
            $zip->addFile($css, 'style.css');
            $zip->addFile($js, 'script.js');
            $zip->addFile($this->getPathCSSResetFile(), 'reset.css');

            $zip->close();

            //get path for zip file
            $path = realpath($zipFileName);
            if ($path === false) {
                throw new \Exception('Zip file does not exist: ' . $zipFileName);
            }
            $this->loggerService->info('Zip file created');
            return $path;



        } catch (\Throwable $e) {
            $this->loggerService->logError($e->getMessage());
            throw new \Exception($e->getMessage());
        }

    }

    public function removeTempFolder(string $path): void
    {
        array_map('unlink', glob($path . '/*'));
        rmdir($path);
    }


    public function getUniqueTempSubFolderForRequest(): string
    {
        $randomString = substr(str_shuffle(MD5(microtime())), 0, 10);

        $path = $this->tempFolder . '/' . $randomString;
        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }
        return realpath($path);
    }
    private function createHTMLFile(string $path, GenerateFilesInputDTO $inputDTO): string
    {
        $html = $this->createHTMLTemplateHelper->createHTMLTemplate($inputDTO);
        $htmlFilePath = $path . '/index.html';
        file_put_contents($htmlFilePath, $html);
        return $htmlFilePath;

    }

    private function createCSSFile(string $path, GenerateFilesInputDTO $inputDTO): string
    {
        $css = $this->createCSSTemplateHelper->createCSSTemplate($inputDTO);
        $cssFilePath = $path . '/style.css';
        file_put_contents($cssFilePath, $css);
        return $cssFilePath;
    }

    private function createJSFile(string $path, GenerateFilesInputDTO $inputDTO): string
    {
        $js = $this->createJSTemplateHelper->createJSTemplate($inputDTO);
        $jsFilePath = $path . '/script.js';
        file_put_contents($jsFilePath, $js);
        return $jsFilePath;
    }

    private function getPathCSSResetFile(): string
    {
        return config('files.reset');
    }


}
