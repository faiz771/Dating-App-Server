<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PackageService;

class PackageServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 1; $i <= 20; $i++){
            $service = new PackageService;
            $service->name          =   "service-".$i;
            $service->description   =   "service-desc-".$i;
            $service->save();
        }
    }
}
