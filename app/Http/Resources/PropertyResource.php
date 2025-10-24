<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PropertyResource extends JsonResource
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
            'description' => $this->description,
            'surface' => $this->surface,
            'rooms' => $this->rooms,
            'bedrooms' => $this->bedrooms,
            'floor' => $this->floor,
            'price' => $this->price,
            'city' => $this->city,
            'address' => $this->address,
            'postal_code' => $this->postal_code,
            'sold' => $this->sold,
            'options' => OptionResource::collection($this->whenLoaded('options')),
            'created_at' => $this->created_at?->toISOString(),
            'updated_at' => $this->updated_at?->toISOString(),
        ];
    }
}
