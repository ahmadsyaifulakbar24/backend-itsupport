<?php

namespace App\Http\Resources\Helpdesk;

use Illuminate\Http\Resources\Json\JsonResource;

class HelpdeskStepResource extends JsonResource
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
            'service_category_step_id' => $this->service_category_step_id,
            'name' => $this->name,
            'status' => $this->status,
            'order' => $this->order,
            'finish_date' => $this->finish_date,
        ];
    }
}
