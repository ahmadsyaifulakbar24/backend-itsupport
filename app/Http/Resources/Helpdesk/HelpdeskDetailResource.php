<?php

namespace App\Http\Resources\Helpdesk;

use App\Http\Resources\File\FileResource;
use App\Http\Resources\Params\ParamResource;
use App\Http\Resources\ServiceCategory\ServiceCategoryResource;
use Illuminate\Http\Resources\Json\JsonResource;

class HelpdeskDetailResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function fileQuery($type)
    {
        return $this->file()->where('type', $type)->get();
    }

    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'user' => [
                'user_id' => $this->user->id,
                'name' => $this->user->name,
            ],
            'ticket_number' => $this->ticket_number,
            'service_category' => $this->service_category,
            'helpdesk_step' => HelpdeskStepResource::collection($this->helpdesk_step()->orderBy('order', 'asc')->get()),
            // 'helpdesk_step' => $this->helpdesk_step()->orderBy('order', 'asc')->get(),
            'title' => $this->title,
            'email_type' => new ParamResource($this->email_type),
            'from_date' => $this->from_date,
            'till_date' => $this->till_date,
            'execution_time' => $this->execution_time,
            'duration' => $this->duration,
            'participant_capacity' => $this->participant_capacity,
            'signature' => $this->signature,
            'class_type_id' => $this->class_type,
            'update_type_id' => $this->update_type,
            'complaint_type_id' => $this->complaint_type,
            'description' => $this->description,
            'status' => $this->status,

            // file 
            'approval_document' => FileResource::collection($this->fileQuery('approval_document')),
            'flyer' => FileResource::collection($this->fileQuery('flyer')),
            'document' => FileResource::collection($this->fileQuery('document')),
            'latter' => FileResource::collection($this->fileQuery('latter')),

            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
