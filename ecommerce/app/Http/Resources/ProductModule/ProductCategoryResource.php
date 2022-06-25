<?php

namespace App\Http\Resources\ProductModule;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductCategoryResource extends JsonResource
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
            'id' => $this->id,
            'code' => $this->code,
            'name' => $this->name,
            'description' => $this->description,
            'product_category_id' => $this->product_category_id,
            'show' => $this->show,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
