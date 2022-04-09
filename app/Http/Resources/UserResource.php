<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            , 'name' => $this->name
            , 'primer_apellido' => $this->primer_apellido
            , 'segundo_apellido' => $this->segundo_apellido
            , 'fecha_nacimiento' => $this->fecha_nacimiento
            , 'sexo' => $this->sexo
            , 'rol' => $this->rol
            , 'estatus' => $this->estatus
            , 'email' => $this->email
            , 'password' => $this->password
        ];  
    }
}
