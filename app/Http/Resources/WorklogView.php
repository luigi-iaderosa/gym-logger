<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class WorklogView extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return
            [
          'data_worklog'=>$this->data_worklog,
        'esercizio'=>$this->esercizio->descrizione ?? 'N/A',
        'serie'=>$this->serie,
        'ripetizioni'=>$this->ripetizioni,
        'sforzo'=>$this->sforzo,
        'unita_misura'=>$this->unitaMisura->descrizione ?? 'N/A',
        'valore_assoluto'=>$this->esercizio->valore_assoluto_sforzo ?? 'N/A'
        ];
    }
}
