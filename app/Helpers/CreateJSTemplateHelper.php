<?php

namespace App\Helpers;

use App\Data\GenerateFilesInputDTO;

class CreateJSTemplateHelper
{

    public static function createJSTemplate(GenerateFilesInputDTO $inputDTO)
    {
        $width = $inputDTO->getWidth();
        $height = $inputDTO->getHeight();
        $top = $inputDTO->getTop();
        $left = $inputDTO->getLeft();


        $js = <<<EOT
            document.addEventListener("DOMContentLoaded", function(event) {
                document.body.style.width = "$width";
                document.body.style.height = "$height";
                document.body.style.top = "$top";
                document.body.style.left = "$left";
            });
            EOT;

        return $js;

    }
}