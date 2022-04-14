<?php

namespace App\Http\Resources\Product;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
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
            'name'        => $this->name,
            'description' => $this->detail,
            'price'       => $this->price,
            'stock'       => $this->stock == 0 ? 'No Stock' : $this->stock,
            'discount'    => $this->discount,
            'rating'      => $this->reviews->sum('star'),
            'href'        => ['reviews' => route('reviews.index', $this->id)]
        ];
    }
}
