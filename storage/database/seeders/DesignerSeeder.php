<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Designer;
class DesignerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 1; $i <= 10; $i++){
            $d = new Designer;
            $d->name = "Designer-".$i;
            $d->save();
        }
    }
}
