<?php

namespace App\Http\Resources\Monitoring;

use App\Http\Resources\Params\ParamResource;
use Illuminate\Http\Resources\Json\JsonResource;

class MonitoringResouce extends JsonResource
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
            'mak_id' => $this->mak_id,
            'name' => $this->name,
            'milestone' => new ParamResource($this->milestone),
            'start_date' => $this->start_date,
            'finish_date' => $this->finish_date,
            'description' => $this->description,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
