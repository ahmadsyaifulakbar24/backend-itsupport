<?php

namespace App\Http\Resources\History;

use Illuminate\Http\Resources\Json\JsonResource;

class HistoryResource extends JsonResource
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
            'helpdesk_step_id' => $this->helpdesk_step_id,
            'monitoring_id' => $this->monitoring_id,
            'action_by' => [
                'id' => $this->user->id,
                'name' => $this->user->name,
            ],
            'history' => $this->history,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
