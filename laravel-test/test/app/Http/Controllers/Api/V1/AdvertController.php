<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\V1;

use App\Entity\Advert;
use App\Http\Controllers\Controller;
use App\Http\Requests\AdvertRequest;
use App\Http\Serializers\AdvertSerializer;
use App\Services\AdvertService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AdvertController extends Controller
{
    private $serializer;
    private $service;

    public function __construct(AdvertSerializer $serializer, AdvertService $service)
    {
        $this->serializer = $serializer;
        $this->service = $service;
    }


    public function showAdvert($id)
    {
        $advert = Advert::findOrFail($id);

        return response()->json(
            $this->serializer->advert($advert),
            Response::HTTP_OK
        );
    }

    public function showListOfAdverts(Request $request)
    {
        $query = $this->service->getQueryOfAdvertsList($request, 10);

        return response()->json(
            $this->serializer->advertList($query),
            Response::HTTP_OK
        );
    }

    public function postAdvert(Request $request)
    {
        $request->headers->set('Accept', 'application/json');

        $request->validate([
            'title' => 'required|string|max:200',
            'description' => 'required|string|max:1000',
            'photo1' => 'required|url',
            'photo2' => 'nullable|url',
            'photo3' => 'nullable|url',
            'price' => 'required|numeric'
        ]);

        if ($advert_id = $this->service->addNewAdvert($request)) {
            return response()->json(
                $this->serializer->advertAddSuccess($advert_id),
                Response::HTTP_CREATED
            );
        }

        return response()->json(
            $this->serializer->advertAddError(null, true),
            Response::HTTP_BAD_REQUEST
        );
    }
}
