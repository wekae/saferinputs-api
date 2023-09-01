<?php

namespace App\Http\Resources\Cms;

use Illuminate\Http\Resources\Json\JsonResource;

class EntityResource extends JsonResource
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
            'media' => MediaResource::collection($this->media),
            'downloads' => DownloadsResource::collection($this->downloads),
            'posts' => PostsResource::collection($this->posts),
        ];
    }
}
