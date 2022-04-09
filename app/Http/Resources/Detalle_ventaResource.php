<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Detalle_ventaResource extends JsonResource
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
            , 'producto_id' => $this->producto_id
            , 'costo_unitario' => $this->costo_unitario
            , 'precio_unitario' => $this->precio_unitario
            , 'cantidad' => $this->cantidad
        ];   
    }
}
