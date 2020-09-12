<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PlateResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // Map Domain Plate model values
        return [
            'data' => [
                'name' => $this->name()->value(),
                'description' => $this->description()->value(),
                'precio' => $this->precio()->value(),
            ]
        ];
    }
}