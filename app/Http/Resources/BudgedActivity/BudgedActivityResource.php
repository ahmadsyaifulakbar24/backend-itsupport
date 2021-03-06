<?php

namespace App\Http\Resources\BudgedActivity;

use App\Http\Resources\Client\ClientResource;
use App\Http\Resources\Mak\MakResource;
use Illuminate\Http\Resources\Json\JsonResource;

class BudgedActivityResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $data['id'] = $this->id;
        $data['activity_name'] = $this->activity_name;
        $data['category'] = [
            'id' => $this->category->id,
            'category' => $this->category->param,
        ];
        $data['client'] = new ClientResource($this->client);

        if($this->category->alias == 'kontraktual') {
            $data['mak'] = new MakResource($this->mak[0]);
        }

        $data['total_budged'] = $this->total_budged;
        $data['progress'] = $this->progress;
        $data['min_date'] = $this->min_date;
        $data['max_date'] = $this->max_date;
        $data['status'] = $this->status;
        $data['created_at'] = $this->created_at;
        $data['updated_at'] = $this->updated_at;

        return $data;
    }
}
