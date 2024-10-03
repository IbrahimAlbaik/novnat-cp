<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SliderResource extends JsonResource
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
            'media' => asset('upload/sliders/' . $this->image),
            'desc' => $this->desc,
            'extra_desc' => $this->extra_desc,
            'youtube_video_url' => $this->youtube_video_url,
            'youtube_video_title' => $this->youtube_video_title,
            'about_youtube_video' => $this->about_youtube_video,
            'cover_youtube_image' => asset('upload/sliders/' . $this->cover_youtube_image),
            'created_at' => $this->created_at->toDateTimeString(),
            'updated_at' => $this->updated_at->toDateTimeString(),
        ];
    }
}
