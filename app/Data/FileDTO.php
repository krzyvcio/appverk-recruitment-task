<?php
namespace App\Data;

class FileDTO
{
    private string $content;
    private string $path;

    public function __construct(string $content, string $path)
    {
        $this->content = $content;
        $this->path = $path;
    }

    public function getContent(): string
    {
        return $this->content;
    }

    public function getPath(): string
    {
        return $this->path;
    }
}
?>