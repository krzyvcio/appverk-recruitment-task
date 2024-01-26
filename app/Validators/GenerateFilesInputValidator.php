<?php

namespace App\Validators;

use App\Data\GenerateFilesInputDTO;
use Exception;

class GenerateFilesInputValidator
{
    private GenerateFilesInputDTO $inputDTO;

    public function __construct()
    {
    }

    public function validate(GenerateFilesInputDTO $inputDTO): bool
    {
        $this->inputDTO = $inputDTO;
        $this->validateSelectedModule();
        $this->validateClickout();
        $this->validateWidth();
        $this->validateHeight();
        $this->validateTop();
        $this->validateLeft();

        return true;
    }

    private function validateSelectedModule(): void
    {
        if (empty($this->inputDTO->getSelectedModule())) {
            throw new Exception('selectedModule is required');
        }
    }

    private function validateClickout(): void
    {
        if (empty($this->inputDTO->getClickout())) {
            throw new Exception('clickout is required');
        }
    }

    private function validateWidth(): void
    {
        if (empty($this->inputDTO->getWidth())) {
            throw new Exception('width is required');
        }
    }

    private function validateHeight(): void
    {
        if (empty($this->inputDTO->getHeight())) {
            throw new Exception('height is required');
        }
    }

    private function validateTop(): void
    {
        if (empty($this->inputDTO->getTop())) {
            throw new Exception('top is required');
        }
    }

    private function validateLeft(): void
    {
        if (empty($this->inputDTO->getLeft())) {
            throw new Exception('left is required');
        }
    }
}
