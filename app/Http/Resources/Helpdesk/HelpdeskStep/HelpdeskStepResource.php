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
        return parent::toArray($request);
    }
}
