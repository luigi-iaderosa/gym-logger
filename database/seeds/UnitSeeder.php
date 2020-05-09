<?php

use App\Models\UnitaMisura;
use Illuminate\Database\Seeder;

class UnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UnitaMisura::create(['descrizione'=>'minuti']);
        UnitaMisura::create(['descrizione'=>'kg']);
    }
}
