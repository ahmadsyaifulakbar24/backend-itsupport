<?php

namespace App\Http\Resources\Client;

use Illuminate\Http\Resources\Json\JsonResource;

class ClientResource extends JsonResource
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
            'name' => $this->name,
            'category' => [
                'id' => $this->category_id,
                'category' => $this->category,
            ],
            'lock' => ($this->budged_activity()->count() > 0 ) ? true : false,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
