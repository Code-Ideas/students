<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ServiceLayersResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'content_type' => $this->content_type,
            'content' => $this->content,
            'priority' => $this->priority,
            'department' => $this->department ? new SelectedValueResource($this->department) : null,
            'year' => $this->year ? new SelectedValueResource($this->year) : null,
            'service' => $this->service ? new SelectedValueResource($this->service) : null,
            'attachments' => $this->attachments ? $this->attachments->map(function ($attachment) {
                return [
                    'name' => $attachment->file_name ?: null,
                    'type' => $attachment->type ?: null,
                    'path' => asset('storage/' . $attachment->path)
                ];
            }) : [],
        ];
    }
}
