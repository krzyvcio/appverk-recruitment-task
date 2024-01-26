<?php

namespace App\Data;

class GenerateFilesInputDTO
{
    private ?string $selectedModule;
    private ?string $clickout;

    private ?string $width;
    private ?string $height;
    private ?string $top;
    private ?string $left;

    public function __construct()
    {

    }

    public function getSelectedModule(): string
    {
        return $this->selectedModule;
    }

    public function setSelectedModule(string $selectedModule): void
    {
        $this->selectedModule = (string)$selectedModule;
    }

    public function getClickout(): string
    {
        return $this->clickout;
    }

    public function setClickout(string $clickout): void
    {
        $this->clickout = (string)$clickout;
    }

    public function getWidth(): string
    {
        return $this->width;
    }

    public function setWidth(string $width): void
    {
        $this->width = (string)$width;
    }

    public function getHeight(): string
    {
        return $this->height;
    }

    public function setHeight(string $height): void
    {
        $this->height = (string)$height;
    }

    public function getTop(): string
    {
        return $this->top;
    }

    public function setTop(string $top): void
    {
        $this->top = (string)$top;
    }

    public function getLeft(): string
    {
        return $this->left;
    }

    public function setLeft(string $left): void
    {
        $this->left = (string)$left;
    }

}
