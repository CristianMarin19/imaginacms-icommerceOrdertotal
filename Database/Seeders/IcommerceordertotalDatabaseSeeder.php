<?php

namespace Modules\Icommerceordertotal\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Isite\Jobs\ProcessSeeds;

class IcommerceordertotalDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        ProcessSeeds::dispatch([
            "baseClass" => "\Modules\Icommerceordertotal\Database\Seeders",
            "seeds" => ["IcommerceordertotalModuleTableSeeder", "IcommerceordertotalSeeder"]
        ]);

    }

    

}
