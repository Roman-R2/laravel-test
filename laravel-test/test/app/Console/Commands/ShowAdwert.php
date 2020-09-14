<?php

namespace App\Console\Commands;

use App\Entity\Advert;
use Illuminate\Console\Command;

class ShowAdwert extends Command
{
    protected $signature = 'advert:show {id}';

    protected $description = 'Show ad by its ID';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $id = $this->argument('id');

        if (!$advert = Advert::where('id', $id)->first()) {
            $this->error('No ad with this ID found');
            return false;
        };

        $images = $advert->getAttribute('advert_images');

        $this->line('---------------- Show advert with id ' . $id . ' ---------------------');
        $this->line('Advert title: ' . $advert->getAttribute('advert_name'));
        $this->line('Advert description: ' . $advert->getAttribute('advert_description'));
        $this->line('Advert price: ' . $advert->getAttribute('advert_price'));
        $this->line('Advert images: ');
        $this->getAdvertImages($images);
        $this->line('------------------------------------------------------------');
        $this->info('Success! Command close.');
        return true;
    }

    private function getAdvertImages($imageUrlArray)
    {
        !empty($imageUrlArray) ?: $this->line('This ad has no images');

        foreach ($imageUrlArray as $key => $image) {
            $this->line('    ['. $key . '] --> '. $image);
        }
    }
}
