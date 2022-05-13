<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ServicesResource extends JsonResource
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
            'type' => $this->type,
            'link' => $this->link ?: null,
            'icon' => $this->icon_class ?: null,
            //'sub_services' => $this->subServices()->get(['id', 'name']),
        ];
    }
}
