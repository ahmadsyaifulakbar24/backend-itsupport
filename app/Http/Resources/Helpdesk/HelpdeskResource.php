<?php

namespace App\Http\Resources\Helpdesk;

use App\Http\Resources\Params\ParamResource;
use Illuminate\Http\Resources\Json\JsonResource;

class HelpdeskResource extends JsonResource
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
            'user' => [
                'user_id' => $this->user->id,
                'name' => $this->user->name,
            ],
            'ticket_number' => $this->ticket_number,
            'service_category' => $this->service_category,
            'title' => $this->title,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
