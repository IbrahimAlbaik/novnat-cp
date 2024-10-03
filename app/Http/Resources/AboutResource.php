<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AboutResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // return parent::toArray($request);
        // Map the necessary fields from the About model
        return [
            'id' => $this->id,
            'email' => $this->email,
            'partnering_email' => $this->partnering_email,
            'linkedin_url' => $this->linkedin_url,
            'bio' => $this->bio,
            'created_at' => $this->created_at->toDateTimeString(),
            'updated_at' => $this->updated_at->toDateTimeString(),
        ];
    }
}
