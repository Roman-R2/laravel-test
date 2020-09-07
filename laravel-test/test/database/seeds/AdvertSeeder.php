<?php

use Illuminate\Database\Seeder;
use App\Entity\Advert;

class AdvertSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Advert::class, 30)->create();
    }
}
