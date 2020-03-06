<?php
/**
 * Created by PhpStorm.
 * User: alceste
 * Date: 28/02/20
 * Time: 19.48
 */
namespace App\Http\Controllers\StandardRouting;
use App\Models\Esercizio;
class EsercizioController extends \Illuminate\Routing\Controller
{
    public function esercizi(){
        return response()->json(['esercizi'=>Esercizio::all()]);
    }
}