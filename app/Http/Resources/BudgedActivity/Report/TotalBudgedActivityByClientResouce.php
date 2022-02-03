<?php

namespace App\Http\Resources\BudgedActivity\Report;

use App\Http\Resources\Client\ClientResource;
use Illuminate\Http\Resources\Json\JsonResource;

class TotalBudgedActivityByClientResouce extends JsonResource
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
            // 'client_id' => $this->client_id,
            'client' => new ClientResource($this->client) ,
            'total' => $this->total,
        ];
    }
}
