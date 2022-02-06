<?php

namespace App\Http\Resources\Helpdesk;

use Illuminate\Http\Resources\Json\JsonResource;

class EmailNameResource extends JsonResource
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
            'email_name' => $this->email_name
        ];
    }
}
