<?php

namespace App\Http\Resources;

use App\Http\Resources\Lookups\Category;
use App\Http\Resources\Lookups\Country;
use Illuminate\Http\Resources\Json\JsonResource;

class Opportunity extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'category' => new Category($this->category),
            'country' => new Country($this->country),
            'deadline' => $this->deadline->toDayDateTimeString(),
            'createdBy' => new User($this->user),
            'organizer' => $this->organizer,
            'opportunityDetail' => new OpportunityDetail($this->detail),
            'createdAt' => $this->created_at->toDateTimeString(),
            'updatedAt' => $this->updated_at->toDateTimeString(),
        ];
    }
}
