<?php

namespace App\Services\GenerateFiles;
USE APP\Data\GenerateFilesInputDTO; 

interface GenerateFilesServiceInterface
{
    public function generateFiles(GenerateFilesInputDTO $inputDTO, string $subfolder): string;

    public function getUniqueTempSubFolderForRequest(): string;

    public function removeTempFolder(string $path): void;

}