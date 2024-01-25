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
        $this->selectedModule = null;
        $this->clickout = null;
        $this->width = null;
        $this->height = null;
        $this->top = null;
        $this->left = null;
    }

    public function getSelectedModule(): string
    {
        return $this->selectedModule;
    }

    public function setSelectedModule(string $selectedModule): void
    {
        $this->selectedModule = $selectedModule;
    }

    public function getClickout(): string
    {
        return $this->clickout;
    }

    public function setClickout(string $clickout): void
    {
        $this->clickout = $clickout;
    }

    public function getWidth(): string
    {
        return $this->width;
    }

    public function setWidth(string $width): void
    {
        $this->width = $width;
    }

    public function getHeight(): string
    {
        return $this->height;
    }

    public function setHeight(string $height): void
    {
        $this->height = $height;
    }

    public function getTop(): string
    {
        return $this->top;
    }

    public function setTop(string $top): void
    {
        $this->top = $top;
    }

    public function getLeft(): string
    {
        return $this->left;
    }

    public function setLeft(string $left): void
    {
        $this->left = $left;
    }

}
