<?php

namespace App\Jobs\Advert;

use App\Dto\ImageDTO;
use App\Entity\Advert;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class SaveImageURL implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $advert;
    private $dto;

    public function __construct(Advert $advert, ImageDTO $dto)
    {
        $this->advert = $advert;
        $this->dto = $dto;
    }

    public function handle()
    {

        try {
            $this->advert->update(['advert_images' => $this->dto->getImages()]);
            $this->advert->save();
        } catch (\Exception $e) {
            Log::error(
                'Error! /n' .
                'Image array: ' . print_r($this->dto->getImages(), 1) . '/n' .
                'Error code: ' . $e->getCode() . '/n' .
                'Error message: ' . $e->getMessage() . '/n' .
                'Error trace: ' . $e->getTraceAsString()
            );

        }

    }
}
