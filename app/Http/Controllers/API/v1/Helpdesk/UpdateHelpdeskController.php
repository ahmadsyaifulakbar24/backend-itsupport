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
            ]);

            $input['title'] = $request->title;
            $input['email_type_id'] = $request->email_type_id;
            return $this->update($helpdesk, $input);
            
        } else if($sc_id == 'C2') {
            $request->validate([
                'title' => ['required', 'string'],
                'from_date' => ['required', 'date'],
                'till_date' => ['required', 'date', 'after:from_date'],
                'execution_time' => ['required', 'date_format:H:i'],
                'duration' => ['required', 'string'],
                'participant_capacity' => ['required', 'numeric'],
            ]);

            $input['title'] = $request->title;
            $input['from_date'] = $request->from_date;
            $input['till_date'] = $request->till_date;
            $input['execution_time'] = $request->execution_time;
            $input['duration'] = $request->duration;
            $input['participant_capacity'] = $request->participant_capacity;
            return $this->update($helpdesk, $input);

        } else if($sc_id == 'C3') {
            $request->validate([
                'title' => ['required', 'string'],
                'signature_id' => [
                    'required',
                    Rule::exists('params', 'id')->where(function ($query) {
                        return $query->where('category', 'signature');
                    })
                ]
            ]);

            $input['title'] = $request->title;
            $input['signature_id'] = $request->signature_id;
            return $this->update($helpdesk, $input);

        } else if($sc_id == 'C4') {
            $request->validate([
                'title' => ['required', 'string'],
                'from_date' => ['required', 'date'],
                'till_date' => ['required', 'date', 'after:from_date'],
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

        } else if($sc_id == 'C6' || $sc_id == 'C7' || $sc_id == 'C8' || $sc_id == 'C9' || $sc_id == 'C10' || $sc_id == 'C12') {
            $request->validate([
                'title' => ['required', 'string'],
            ]);
            $input['title'] = $request->title;
            return $this->update($helpdesk, $input);
            
        } else if($sc_id == 'C11') {
            $request->validate([
                'title' => ['required', 'string'],
                'complaint_type_id' => [
                    'required',
                    Rule::exists('params', 'id')->where(function ($query) {
                        return $query->where('category', 'complaint_type');
                    })
                ],
                'description' => ['required', 'string']
            ]);

            $input['title'] = $request->title;
            $input['complaint_type_id'] = $request->complaint_type_id;
            $input['description'] = $request->description;
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
    
    public function update($helpdesk, $input)
    {
        $helpdesk->update($input);
        return ResponseFormatter::success(new HelpdeskResource($helpdesk), 'update helpdesk data success');
    }
}
