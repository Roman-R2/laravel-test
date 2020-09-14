<?php

declare(strict_types=1);

namespace App\Http\Serializers;

use App\Entity\Advert;
use Illuminate\Pagination\LengthAwarePaginator;

class AdvertSerializer
{
    public function advert(Advert $advert): array
    {
        return $this->simpleAdvert($advert);
    }

    /**
     * @param LengthAwarePaginator $query
     * @return array
     */
    public function advertList($query): array
    {

        $data = [];

        foreach ($query as $key => $item) {
            $data[$key] = $this->simpleAdvert($item);
        }

        return [
            'total' => $query->total(),
            'next_page' => $query->nextPageUrl(),
            'previous_page' => $query->previousPageUrl(),
            'data' => $data,
        ];
    }

    public function simpleAdvert(Advert $advert): array
    {
        return [
            'name' => $advert->getAttribute('advert_name'),
            'price' => $advert->getAttribute('advert_price'),
            'main_image' => $advert->getAttribute('advert_images')[0]
        ];
    }

    public function advertAddSuccess($advert_id): array
    {
        return $this->advertAddAnswer($advert_id);
    }

    public function advertAddError($advert_id, $error): array
    {
        return $this->advertAddAnswer($advert_id, $error);
    }

    public function advertAddAnswer($advert_id, $errors = false): array
    {
        return [
            'advert_id' => $advert_id,
            'errors' => $errors,
        ];
    }
}
