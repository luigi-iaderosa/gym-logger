<?php
/**
 * Created by PhpStorm.
 * User: alceste
 * Date: 29/02/20
 * Time: 10.15
 */

namespace App\Fractals;


use App\Models\Worklog;
use Illuminate\Support\Collection;
use League\Fractal\Manager;
use phpDocumentor\Reflection\Types\Iterable_;

class WorklogFractal
{


    private $fractal;
    private $data;
    public function __construct($w)
    {
        $this->fractal = new Manager();
        $this->data  = $w;
    }


    public function build() : Collection {

        $collection =  collect();
        foreach ($this->data as $item) {
            $newItem = [
                'id'=>$item->id,
                'data_worklog'=>$item->data_worklog,
                'esercizio'=>$item->esercizio->descrizione ?? 'N/A',
                'serie'=>$item->serie,
                'ripetizioni'=>$item->ripetizioni,
                'sforzo'=>$item->sforzo,
                'unita_misura'=>$item->unitaMisura->descrizione ?? 'N/A',
                'valore_assoluto'=>$item->esercizio->valore_assoluto_sforzo ?? 'N/A'
            ];

            $newItem  = (object) $newItem;
            $collection->add($newItem);
        }


        return $collection;
    }
}