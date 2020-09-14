<?php

declare(strict_types=1);

namespace App\Entity;

use Eloquent;

class Advert extends Eloquent
{

    protected $fillable = [
        'advert_name', 'advert_description', 'advert_images', 'advert_price'
    ];

    protected $hidden = [

    ];

    protected $casts = [
        'advert_images' => 'array'
    ];
}
