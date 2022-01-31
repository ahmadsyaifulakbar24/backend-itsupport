<?php

namespace App\Http\Resources\User;

use App\Http\Resources\Params\ParamResource;
use Illuminate\Http\Resources\Json\JsonResource;

class UserDetailResouce extends JsonResource
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
            'nip' => $this->nip,
            'email' => $this->email,
            'phone_number' => $this->phone_number,
            'eselon1' => new ParamResource($this->eselon1),
            'eselon2' => new ParamResource($this->eselon2),
            'position' => $this->position,
            'role' => $this->role,
            'path_photo' => (!empty($this->photo)) ? $this->path_photo : null,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
