<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DireccionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id
            , 'usuario_id' => $this->usuario_id
            , 'estado_id' => $this->estado_id
            , 'municipio_id' => $this->municipio_id
            , 'localidad' => $this->localidad
            , 'calle' => $this->calle
            , 'numero_exterior' => $this->numero_exterior
            , 'codigo_postal' => $this->codigo_postal
            , 'referencias' => $this->referencias
        ];   
    }
}
