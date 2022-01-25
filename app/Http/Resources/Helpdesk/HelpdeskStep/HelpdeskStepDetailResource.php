<?php

namespace App\Http\Resources\Helpdesk\HelpdeskStep;

use App\Http\Resources\Comment\CommentResource;
use App\Http\Resources\File\FileResource;
use Illuminate\Http\Resources\Json\JsonResource;

class HelpdeskStepDetailResource extends JsonResource
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
            'status' => $this->status,
            'description' => $this->description,
            'file' => FileResource::collection($this->file),
            'comment' => CommentResource::collection($this->comment),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
