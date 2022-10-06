<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PropertyResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        [
            'id' => $this->id,
            'name' => $this->name,
            'city' => $this->city,
            'adress'=> $this->adress,
            'price'=> $this ->price,
            'm2'=> $this ->m2,
            'house_type'=> $this ->house_type,
            'house_subtype'=> $this ->subtype,
            'for_sale_rent'=> $this ->for_sale_rent,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at

        ];
    }
}
