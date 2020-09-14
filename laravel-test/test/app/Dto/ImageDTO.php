<?php

declare(strict_types=1);

namespace App\Dto;

class ImageDTO
{
    public $imageArr = [];

    public function __construct($imageArr)
    {
        $this->imageArr = $imageArr;
    }

    public function getImages()
    {
        return $this->imageArr;
    }
}
