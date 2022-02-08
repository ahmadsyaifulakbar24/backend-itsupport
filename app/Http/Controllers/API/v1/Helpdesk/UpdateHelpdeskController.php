<?php

namespace App\Http\Controllers\API\v1\Helpdesk;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Http\Resources\Helpdesk\HelpdeskResource;
use App\Models\Helpdesk;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UpdateHelpdeskController extends Controller
{
    public function update_data(Request $request) 
    {
        $request->validate([
            'id' => ['required', 'exists:helpdesks,id']
        ]);

        $helpdesk = Helpdesk::find($request->id);
        $sc_id = $helpdesk->service_category->alias;

        if($sc_id == 'C1') {
            $request->validate([
                'title' => ['required', 'string'],
                'email_type_id' => [
                    'required', 
                    Rule::exists('params', 'id')->where(function ($query) {
                        return $query->where('category', 'email_type');
                    })
                ],
                'email' => ['required', 'array'],
                'email.*.email_name' => ['required', 'string'],
            ]);

            $input['title'] = $request->title;
            $input['email_type_id'] = $request->email_type_id;
            $input['email'] = $request->email;
            return $this->update($helpdesk, $input, 'C1');
            
        } else if($sc_id == 'C2') {
            $request->validate([
                'title' => ['required', 'string'],
                'from_date' => ['required', 'date_format:Y/m/d H:i:s'],
                'till_date' => ['required', 'date_format:Y/m/d H:i:s'],
                'participant_capacity' => ['required', 'string'],
                'description' => ['required', 'string'],
            ]);

            $input['title'] = $request->title;
            $input['from_date'] = $request->from_date;
            $input['till_date'] = $request->till_date;
            $input['execution_time'] = $request->execution_time;
            $input['participant_capacity'] = $request->participant_capacity;
            $input['description'] = $request->description;
            return $this->update($helpdesk, $input);

        } else if($sc_id == 'C3') {
            $request->validate([
                'title' => ['required', 'string'],
                'from_date' => ['required', 'date_format:Y/m/d H:i:s'],
                'till_date' => ['required', 'date_format:Y/m/d H:i:s'],
                'signature' => ['required', 'string'],
            ]);

            $input['title'] = $request->title;
            $input['from_date'] = $request->from_date;
            $input['till_date'] = $request->till_date;
            $input['signature'] = $request->signature;
            return $this->update($helpdesk, $input);

        } else if($sc_id == 'C4') {
            $request->validate([
                'title' => ['required', 'string'],
                'from_date' => ['required', 'date_format:Y/m/d H:i:s'],
                'till_date' => ['required', 'date_format:Y/m/d H:i:s'],
                'zoom_option' => ['required', 'boolean'],
                'participant_capacity' => [
                    Rule::requiredIf($request->zoom_option == 1),
                    'string'
                ],
                'zoom_link' => [
                    Rule::requiredIf($request->zoom_option == 0), 
                    'string'
                ],
                'presence' => ['required', 'boolean'],
                'signature' => [
                    Rule::requiredIf($request->presence == 1),
                    'string'
                ],
                'class_type_id' => [
                    'required',
                    Rule::exists('params', 'id')->where(function ($query) {
                        return $query->where('category', 'class_type');
                    })
                ]
            ]);

            $input['title'] = $request->title;
            $input['from_date'] = $request->from_date;
            $input['till_date'] = $request->till_date;
            $input['zoom_option'] = $request->zoom_option;
            ($request->zoom_option == 1) ? $input['participant_capacity'] = $request->participant_capacity : $input['zoom_link'] = $request->zoom_link;
            $input['presence'] = $request->presence;
            ($request->presence == 1) && $input['signature'] = $request->signature;
            $input['class_type_id'] = $request->class_type_id;
            return $this->update($helpdesk, $input);

        } else if($sc_id == 'C5') {
            $request->validate([
                'title' => ['required', 'string'],
                'update_type_id' => [
                    'required',
                    Rule::exists('params', 'id')->where(function ($query) {
                        return $query->where('category', 'update_type');
                    })
                ],
            ]);

            $input['title'] = $request->title;
            $input['update_type_id'] = $request->update_type_id;
            return $this->update($helpdesk, $input);

        } else if($sc_id == 'C6') {
            $request->validate([
                'title' => ['required', 'string'],
                'koperasi_name' => ['required', 'string'],
                'nik_koperasi' => ['required', 'string'],
            ]);
            $input['title'] = $request->title;
            $input['koperasi_name'] = $request->koperasi_name;
            $input['nik_koperasi'] = $request->nik_koperasi;
            return $this->update($helpdesk, $input);
            
        } else if($sc_id == 'C7') { 
            $request->validate([
                'title' => ['required', 'string'],
                'domain_name' => ['required', 'string'],
                'need_hosting' => ['required', 'boolean'],
                'ip_address' => [
                    Rule::requiredIf($request->need_hosting == 1),
                    'string'
                ],
                'ram' => [
                    Rule::requiredIf($request->need_hosting == 1),
                    'string'
                ],
                'size' => [
                    Rule::requiredIf($request->need_hosting == 1),
                    'string'
                ],
                'os' => [
                    Rule::requiredIf($request->need_hosting == 1),
                    'string'
                ],
                'processor' => [
                    Rule::requiredIf($request->need_hosting == 1),
                    'string'
                ],
            ]);
            $input['title'] = $request->title;
            $input['domain_name'] = $request->domain_name;
            $input['ip_address'] = $request->ip_address;
            $input['need_hosting'] = $request->need_hosting;
            if($request->need_hosting == 1) {
                $input['ram'] = $request->ram;
                $input['size'] = $request->size;
                $input['os'] = $request->os;
                $input['processor'] = $request->processor;
            }
            return $this->update($helpdesk, $input);
        } else if($sc_id == 'C8') { 
            $request->validate([
                'title' => ['required', 'string'],
                'domain_name' => ['required', 'string'],
                'ip_address' => ['required', 'string'],
                'ram' => ['required', 'string'],
                'size' => ['required', 'string'],
                'os' => ['required', 'string'],
                'processor' => ['required', 'string'],
                'total_vm' => ['required', 'string'],
                'ip_public' => ['required', 'boolean'],
                'latter' => ['required', 'array'],
                'latter.*' => ['required', 'file']
            ]);
            $input['title'] = $request->title;
            $input['domain_name'] = $request->domain_name;
            $input['ip_address'] = $request->ip_address;
            $input['ram'] = $request->ram;
            $input['size'] = $request->size;
            $input['os'] = $request->os;
            $input['processor'] = $request->processor;
            $input['total_vm'] = $request->total_vm;
            $input['ip_public'] = $request->ip_public;
            return $this->update($helpdesk, $input);
        } else if($sc_id == 'C9') { 
            $request->validate([
                'title' => ['required', 'string'],
                'file_sharing_type' => ['required', 'in:cloud,local'],
                'needs' => ['required', 'in:Unit Kerja,Personal'],
                'size' => ['required', 'string'],
                'total_user' => [
                    Rule::requiredIf($request->file_sharing_type == 'cloud'),
                    'string'
                ],
                'email_admin' => [
                    Rule::requiredIf($request->file_sharing_type == 'local'),
                    'string'
                ],
            ]);
            $input['title'] = $request->title;
            $input['file_sharing_type'] = $request->file_sharing_type;
            $input['needs'] = $request->needs;
            $input['size'] = $request->size;
            ($request->file_sharing_type == 'local') ? $input['total_user'] = $request->total_user : $input['email_admin'] = $request->email_admin;
            return $this->update($helpdesk, $input);
        } else if($sc_id == 'C10') { 
            $request->validate([
                'title' => ['required', 'string'],
                'integration_of' => ['required', 'string'],
                'integration_to' => ['required', 'string'],
                'description' => ['required', 'string'],
                'latter' => ['required', 'array'],
                'latter.*' => ['required', 'file']
            ]);
            $input['title'] = $request->title;
            $input['integration_of'] = $request->integration_of;
            $input['integration_to'] = $request->integration_to;
            $input['description'] = $request->description;
            return $this->update($helpdesk, $input);
        } else if($sc_id == 'C11') {
            $request->validate([
                'title' => ['required', 'string'],
                'location' => ['required', 'string'],
                'complaint_type_id' => [
                    'required',
                    Rule::exists('params', 'id')->where(function ($query) {
                        return $query->where('category', 'complaint_type');
                    })
                ],
                'description' => ['required', 'string']
            ]);

            $input['title'] = $request->title;
            $input['location'] = $request->location;
            $input['complaint_type_id'] = $request->complaint_type_id;
            $input['description'] = $request->description;
            return $this->update($helpdesk, $input);
        } else if($sc_id == 'C12') { 
            $request->validate([
                'title' => ['required', 'string'],
                'application_name' => ['required', 'string'],
            ]);
            $input['title'] = $request->title;
            $input['application_name'] = $request->application_name;
            return $this->update($helpdesk, $input);
        }
    }

    public function update_status(Request $request)
    {
        $request->validate([
            'id' => ['required', 'exists:helpdesks,id'],
            'status' => ['required', 'in:pending,process,finish,reject']
        ]);

        $helpdesk = Helpdesk::find($request->id);
        $helpdesk->update([
            'status' => $request->status
        ]);

        return ResponseFormatter::success(new HelpdeskResource($helpdesk), 'update helpdesk status success');
    }
    
    public function update($helpdesk, $input, $alias = null)
    {
        $helpdesk->update($input);
        if($alias == 'C1') {
            $helpdesk->email_name()->delete();
            $helpdesk->email_name()->createMany($input['email']);
        }
        return ResponseFormatter::success(new HelpdeskResource($helpdesk), 'update helpdesk data success');
    }
}
