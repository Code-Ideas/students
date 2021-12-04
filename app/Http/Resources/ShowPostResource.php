<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ShowPostResource extends PostsListResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return array_merge(parent::toArray($request), [
            'body' => $this->body,
            'gallery' => $this->gallery->map(function ($image) {
                return [
                    'image' => asset('storage/' . $image->path)
                ];
            }),
        ]);
    }
}
