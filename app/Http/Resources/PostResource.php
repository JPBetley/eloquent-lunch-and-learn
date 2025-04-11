<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
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
            //'body' => $this->when($request->user()->isAdmin(), $this->body)
            'body' => $this->when(true, $this->body),
            'tags' => PostTagResource::collection($this->whenLoaded('postTags')),
        ];
    }
}
