<?php

namespace App\Http\Resources\Helpdesk\HelpdeskStep;

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
            'helpdesk_id' => $this->helpdesk_id,
            'service_category_step_id' => $this->service_category_step_id,
            'status' => $this->status,
            'description' => $this->description,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'finish_date' => $this->finish_date,
        ];
    }
}
