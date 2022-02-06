<?php

namespace App\Http\Resources\ServiceCategory;

use App\Http\Resources\ServiceCategoryStep\ServiceCategoryStepResource;
use Illuminate\Http\Resources\Json\JsonResource;

class ServiceCategoryResource extends JsonResource
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
            'category' => $this->category,
            'alias' => $this->alias,
            'group' => [
                'id' => $this->group->id,
                'param' => $this->group->param,
            ],
            'service_category_step' => ServiceCategoryStepResource::collection($this->service_category_step),
        ];
    }
}
