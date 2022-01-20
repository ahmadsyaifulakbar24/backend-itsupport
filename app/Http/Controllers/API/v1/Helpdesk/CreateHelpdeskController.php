<?php

namespace App\Http\Controllers\API\v1\Helpdesk;

use App\Helpers\FileHelpers;
use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Http\Resources\Helpdesk\HelpdeskResource;
use App\Models\Helpdesk;
use App\Models\ServiceCategory;
use App\Models\ServiceCategoryStep;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;

class CreateHelpdeskController extends Controller
{
    public function __invoke(Request $request)
    {
        $request->validate([
            'service_category_alias' => ['required', 'exists:service_categories,alias']
        ]);

        $service_category = ServiceCategory::where('alias', $request->service_category_alias)->first();
        $sc_id = $service_category->alias;

        $input['user_id'] = $request->user()->id;
        $input['ticket_number'] = Str::upper(Str::random(9));
        $input['service_category_id'] = $service_category->id;
        $input['status'] = 'pending';

        if($sc_id == 'C1') {
            $request->validate([
                'title' => ['required', 'string'],
                'email_type_id' => [
                    'required', 
                    Rule::exists('params', 'id')->where(function ($query) {
                        return $query->where('category', 'email_type');
                    })
                ],
                'approval_document' => ['required', 'array'],
                'approval_document.*' => ['required', 'file']
            ]);

            $input['title'] = $request->title;
            $input['email_type_id'] = $request->email_type_id;
            return $this->createFile($input, $request->approval_document, 'approval_document', $service_category->id);

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
            return $this->create($input, $service_category->id);

        } else if($sc_id == 'C3') {
            $request->validate([
                'title' => ['required', 'string'],
                'flayer' => ['required', 'array'],
                'flayer.*' => ['required', 'image', 'mimes:jpg,jpeg,png,gif'],
                'signature_id' => [
                    'required',
                    Rule::exists('params', 'id')->where(function ($query) {
                        return $query->where('category', 'signature');
                    })
                ]
            ]);

            $input['title'] = $request->title;
            $input['signature_id'] = $request->signature_id;
            return $this->createFile($input, $request->flayer, 'flayer', $service_category->id);

        } else if($sc_id == 'C4') {
            $request->validate([
                'title' => ['required', 'string'],
                'flayer' => ['required', 'array'],
                'flayer.*' => ['required', 'image', 'mimes:jpg,jpeg,png,gif'],
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
            return $this->createFile($input, $request->flayer, 'flayer', $service_category->id);

        } else if($sc_id == 'C5') {
            $request->validate([
                'title' => ['required', 'string'],
                'update_type_id' => [
                    'required',
                    Rule::exists('params', 'id')->where(function ($query) {
                        return $query->where('category', 'update_type');
                    })
                ],
                'document' => ['required', 'array'],
                'document.*' => ['required', 'file']
            ]);

            $input['title'] = $request->title;
            $input['update_type_id'] = $request->update_type_id;
            return $this->createFile($input, $request->document, 'document', $service_category->id);

        } else if($sc_id == 'C6' || $sc_id == 'C7' || $sc_id == 'C8' || $sc_id == 'C9' || $sc_id == 'C10' || $sc_id == 'C12') {
            $request->validate([
                'title' => ['required', 'string'],
                'latter' => ['required', 'array'],
                'latter.*' => ['required', 'file']
            ]);
            $input['title'] = $request->title;
            return $this->createFile($input, $request->latter, 'latter', $service_category->id);

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
            return $this->create($input, $service_category->id);
        }
    }

    public function createFile($input, $array_file, $file_type, $service_category_id)
    {
        foreach($array_file  as $file_input) {
            $path = FileHelpers::upload_file('helpdesk', $file_input);
            $file_name = $file_input->getClientOriginalName();
            $file['type'] = $file_type;
            $file['file_name'] = $file_name;
            $file['path'] = $path;

            $new_files[] = $file;
        }
        $steps = $this->service_category_step($service_category_id);
        
        $result = DB::transaction(function () use ($input, $new_files, $steps) {
            $helpdesk = Helpdesk::create($input);
            $helpdesk->service_category_step()->sync($steps);
            $helpdesk->file()->createMany($new_files);
            return ResponseFormatter::success(new HelpdeskResource($helpdesk), 'create helpdesk data success');
        });
        
        return $result;
    }

    public function create($input, $service_category_id)
    {
        $steps = $this->service_category_step($service_category_id);
        $result = DB::transaction(function () use ($input, $steps) {
            $helpdesk = Helpdesk::create($input);
            $helpdesk->service_category_step()->sync($steps);
            return ResponseFormatter::success(new HelpdeskResource($helpdesk), 'create helpdesk data success');
        });

        return $result;
    }    

    public function service_category_step ($service_category_id) 
    {
        $service_category_step = ServiceCategoryStep::where('service_category_id', $service_category_id)->orderBy('order', 'asc')->get('id');
        foreach($service_category_step as $step) {
            $steps[] = [
                'id' => Str::uuid()->toString(),
                'service_category_step_id' => $step->id,
                'status' => 'open',
                'created_at' => now(),
                'updated_at' => now()
            ];
        }
        return $steps;
    }
}
