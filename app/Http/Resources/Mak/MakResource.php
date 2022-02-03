<?php

namespace App\Http\Resources\Mak;

use Illuminate\Http\Resources\Json\JsonResource;

class MakResource extends JsonResource
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
            'code_mak' => $this->code_mak,
            'budged' => $this->budged,
            'status' => $this->status,
            'progress' => $this->progress,
            'lock' => $this->monitoring->isNotEmpty() ? true : false,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
