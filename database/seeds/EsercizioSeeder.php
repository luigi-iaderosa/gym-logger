<?php

use App\Models\Esercizio;
use Illuminate\Database\Seeder;

class EsercizioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Esercizio::create(['descrizione'=>'cyclette','valore_assoluto_sforzo'=> 1]);
        Esercizio::create(['descrizione'=>'addominali bassi panca inclinata','valore_assoluto_sforzo'=> 3]);
        Esercizio::create(['descrizione'=>'addominali bassi panca piana','valore_assoluto_sforzo'=> 2]);
        Esercizio::create(['descrizione'=>'addominali alti panca piana','valore_assoluto_sforzo'=> 2]);
        Esercizio::create(['descrizione'=>'addominali alti panca inclinata','valore_assoluto_sforzo'=> 3]);
        Esercizio::create(['descrizione'=>'pectoral machine','valore_assoluto_sforzo'=>3]);
        Esercizio::create(['descrizione'=>'vertical traction','valore_assoluto_sforzo'=>2]);
        Esercizio::create(['descrizione'=>'cardio','valore_assoluto_sforzo'=>2]);
        Esercizio::create(['descrizione'=>'shoulder press','valore_assoluto_sforzo'=>4]);
        Esercizio::create(['descrizione'=>'ellittica','valore_assoluto_sforzo'=>1]);
    }
}
