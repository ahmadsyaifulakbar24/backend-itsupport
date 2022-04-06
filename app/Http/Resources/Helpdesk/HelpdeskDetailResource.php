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
            'helpdesk_step_general_user' => HelpdeskStepResource::collection($this->helpdesk_step()->orderBy('order', 'desc')->limit(1)->get()),
            'other_status' => [
                'assigment_status' => ($this->helpdesk_assigment()->count() > 0) ? true : false
            ],
            'title' => $this->title,
            'email_type' => new ParamResource($this->email_type),
            'email' => EmailNameResource::collection($this->email_name),
            'integration_of' => $this->integration_of,
            'integration_to' => $this->integration_to,
            'from_date' => $this->from_date,
            'till_date' => $this->till_date,
            'execution_time' => $this->execution_time,
            'participant_capacity' => $this->participant_capacity,
            'signature' => $this->signature,
            'zoom_option' => $this->zoom_option,
            'zoom_link' => $this->zoom_link,
            'presence' => $this->presence,
            'class_type_id' => $this->class_type,
            'update_type_id' => $this->update_type,
            'complaint_type_id' => $this->complaint_type,
            'koperasi_name' => $this->koperasi_name,
            'nik_koperasi' => $this->nik_koperasi,
            'need_domain' => $this->need_domain,
            'domain_name' => $this->domain_name,
            'ip_address' => $this->ip_address,
            'description' => $this->description,
            'need_hosting' => $this->need_hosting,
            'ram' => $this->ram,
            'size' => $this->size,
            'os' => $this->os,
            'processor' => $this->processor,
            'total_vm' => $this->total_vm,
            'ip_public' => $this->ip_public,
            'file_sharing_type' => $this->file_sharing_type,
            'needs' => $this->needs,
            'total_user' => $this->total_user,
            'email_admin' => $this->email_admin,
            'location' => $this->location,
            'application_name' => $this->application_name,
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
