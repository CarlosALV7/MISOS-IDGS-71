<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class VentaResource extends JsonResource
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
            , 'producto_id' => $this->producto_id
            , 'fecha' => $this->fecha
            , 'total' => $this->total
        ];
    }
}
