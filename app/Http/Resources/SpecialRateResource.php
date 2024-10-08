<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SpecialRateResource extends JsonResource
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
            $this->mergeUnless($this->relationLoaded('listing'), [
                'listing_id' => $this->listing_id,
            ]),
            $this->mergeUnless($this->relationLoaded('room'), [
                'room_id' => $this->room_id,
            ]),
            'listing' => new ListingResource($this->whenLoaded('listing')),
            'room' => new RoomResource($this->whenLoaded('room')),
            'title' => $this->title,
            'price' => floatval($this->price),
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
        ];
    }
}
