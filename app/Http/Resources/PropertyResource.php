<?php

namespace App\Http\Resources;

use App\Models\PropertyCharacteristic;
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
            'attributes' => [
                'address' => $this->address,
                'listing_type' => $this->listing_type,
                'city' => $this->city,
                'zip_code' => $this->zip_code,
                'description' => $this->description,
                'build_year' => $this->build_year,
            ],
           'author' => [
                'id' => $this->broker->id,
                'name' => $this->broker->name,
                'address' => $this->broker->address,
                'city' => $this->broker->city,
                'phone_number' => $this->broker->phone_number,
                'logo_path' => $this->broker->logo_path,
            ],
            'characteristics' => CharacteristicResource::collection($this->characteristic),
        ];
    }
}
