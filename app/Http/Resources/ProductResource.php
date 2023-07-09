<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'type' => $this->type,
            'color' => $this->color,
            'quantity' => $this->quantity,
            'description' => $this->description,
            'price' => $this->price,
            'picture' => $this->picture,
            //
            'supplierable_type'=> $this->supplierable_type,
            'supplierable_id'=> $this->supplierable_id,
            'supplier_id'=> $this->supplier_id

        ];
    }
}
