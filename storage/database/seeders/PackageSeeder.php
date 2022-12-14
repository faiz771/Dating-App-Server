<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Package;
use App\Models\PackageService;
class PackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $service_ids = array();
        for($j = 1; $j <= 5; $j++){
            $service = PackageService::findOrFail($j);
            array_push($service_ids,$service->id);
        }
        for ($i=1; $i <= 5; $i++) {
            $package = new Package;
            $package->service_ids   =   json_encode($service_ids);
            $package->name          =   "Package-".$i;
            $package->price         =   100+$i;
            $package->type          =   "type-".$i;
            $package->description   =   "desc-".$i;
            $package->discount      =   NULL;
            $package->save();
        }
    }
}
