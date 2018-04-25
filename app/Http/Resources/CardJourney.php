<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Journey as JourneyResource;

class CardJourney extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // Eager Load
        $this->resource->load('journeys');

        return $this->resource->map(function ($item) {
            return [
                'balance' => $item->balance,
                'current_balance' => $item->current_balance,
                'journeys' => new JourneyResource($item->journeys)
            ];
        });

        return parent::toArray($request);
    }
}
