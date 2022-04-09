<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductoResource extends JsonResource
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
            , 'categoria_id' => $this->categoria_id
            , 'producto' => $this->producto
            , 'costo_unitario' => $this->costo_unitario
            , 'precio_unitario' => $this->precio_unitario
            , 'existencias' => $this->existencias
            , 'descripcion' => $this->descripcion
            , 'estatus' => $this->estatus
        ];
    }
}
