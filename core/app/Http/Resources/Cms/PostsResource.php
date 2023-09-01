<?php

namespace App\Http\Resources\Cms;

use Illuminate\Http\Resources\Json\JsonResource;

class PostsResource extends JsonResource
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
            'entity_id' => $this->entity_id,
            'id' => $this->id,
            'name' => $this->name,
            'content' => $this->content,
            'summary' => $this->summary,
            'standalone' => $this->standalone,
            'tags' => $this->tags,
            'status' => $this->status,
            'image_token' => $this->image_token,
            'media' => $this->entity->media,
            'downloads' => $this->entity->downloads,
        ];
    }
}
