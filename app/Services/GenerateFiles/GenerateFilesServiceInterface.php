<?php

namespace App\Services\GenerateFiles;

use APP\Data\GenerateFilesInputDTO;

interface GenerateFilesServiceInterface
{
    public function generateFiles(GenerateFilesInputDTO $inputDTO): string;


}
