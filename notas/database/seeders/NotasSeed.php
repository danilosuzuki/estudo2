<?php

namespace Database\Seeders;

use App\Models\Notas;
use Illuminate\Database\Seeder;

class NotasSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Notas::factory(10)->create();
    }
}
