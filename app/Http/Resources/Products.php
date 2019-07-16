<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Products extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return $this->resource->only([
            'id',
            'name' ,
            'price',
            'image_url' ,
            'detail',
            'category_id',
            'created_at',
            'updated_at' ,
        ]);
    }
}
