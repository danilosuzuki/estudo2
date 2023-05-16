<?php

namespace Database\Seeders;

use App\Models\Quadros;
use Illuminate\Database\Seeder;

class QuadrosSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Quadros::factory(3)->create();
    }
}
