<?php

namespace App\Http\Resources\Lookups;

use Illuminate\Http\Resources\Json\JsonResource;

class Country extends JsonResource
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
            'name' => $this->name,
            'phoneCode' => $this->phone_code,
            'countryCode' => $this->country_code

        ];
    }
}
