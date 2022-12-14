<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Service;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 10; $i++) {
            $service                =   new Service;
            $service->name          =   "ServiceName-".$i;
            $service->type          =   "ServiceType-".$i;
            $service->description   =   "ServiceDesc-".$i;
            $service->save();
        }
    }
}
