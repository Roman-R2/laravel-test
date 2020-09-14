<?php

declare(strict_types=1);

namespace App\Services;

use App\Dto\ImageDTO;
use App\Entity\Advert;
use App\Jobs\Advert\SaveImageURL;
use Illuminate\Http\Request;

class AdvertService
{
    const SORT_BY_ASC = 'asc';
    const SORT_BY_DESC = 'desc';

    const CREATED_AT_FIELD = 'created_at';
    const PRICE_FIELD = 'advert_price';

    public function getQueryOfAdvertsList(Request $request, int $pagination)
    {
        $request->get('sort') == 'desc' ? $sortBy = self::SORT_BY_ASC : $sortBy = self::SORT_BY_DESC;
        $request->get('field') == 'created_at' ? $sortField = self::CREATED_AT_FIELD : $sortField = self::PRICE_FIELD;

        $query = Advert::orderBy($sortField, $sortBy);

        return $query->paginate($pagination);
    }

    public function addNewAdvert(Request $request)
    {

        $advert = Advert::make([
            'advert_name' => $request['title'],
            'advert_description' => $request['description'],
            'advert_images' => [],
            'advert_price' => $request['price']
        ]);

        $advert->saveOrFail();

        $images = $this->getImageDTO($request);

        $this->sendToQueue($advert, $images);

        return $advert->id;
    }

    public function sendToQueue(Advert $advert, ImageDTO $images)
    {
        try {
            SaveImageURL::dispatch($advert, $images);
        } catch (\Exception $e) {
            throw new \DomainException(
                'Queue error. Code: ' . $e->getCode() .
                '/nMessage' . $e->getMessage() .
                '/nTrace: ' . $e->getTrace()
            );
        }
    }

    public function getImageDTO(Request $request): ImageDTO
    {
        $images = [];

        empty($request['photo1']) ?: $images[] = $request['photo1'];
        empty($request['photo2']) ?: $images[] = $request['photo2'];
        empty($request['photo3']) ?: $images[] = $request['photo3'];

        return new ImageDTO($images);
    }
}
