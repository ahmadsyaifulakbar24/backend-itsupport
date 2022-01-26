<?php

namespace App\Http\Controllers\API\v1\Client;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Http\Resources\Client\ClientResource;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ClientController extends Controller
{

    public function get (Request $request)
    {
        $request->validate([
            'id' => ['nullable', 'exists:clients,id'],
            'category_client' => ['nullable', 'in:swakelola,kontraktual'],
            'search' => ['nullable', 'string'],
        ]);

        if($request->id) {
            $client = Client::find($request->id);
            return ResponseFormatter::success(new ClientResource($client), 'get client data success');
        }

        $client = Client::joinCategory();
        if($request->category_client) {
            $client->where('alias', $request->category_client);
        }

        if($request->search){
            $client->where('name', 'like', '%'.$request->search.'%');
        }

        return ResponseFormatter::success(ClientResource::collection($client->get()), 'get client data success');
    }

    public function create (Request $request)
    {
        $request->validate([
            'name' => ['required', 'string'],
            'category_id' => [
                'required',
                Rule::exists('params', 'id')->where(function($query) {
                    return $query->where('category', 'category_client');
                })
            ]
        ]);

        $input = $request->all();
        $client = Client::create($input);
        
        return ResponseFormatter::success(new ClientResource($client), 'create client data success');
    }

    public function update (Request $request)
    {
        $request->validate([
            'id' => ['required', 'exists:clients,id'],
            'name' => ['required', 'string'],
            'category_id' => [
                'required',
                Rule::exists('params', 'id')->where(function($query) {
                    return $query->where('category', 'category_client');
                })
            ]
        ]);

        $client = Client::find($request->id);
        $count = $client->budged_activity->count();

        if($count > 0) {
            return ResponseFormatter::error([
                'message' => 'cannot update this data'
            ], 'update client data failed');
        }  else {
            $input = $request->all();
            $client->update($input);
            return ResponseFormatter::success(new ClientResource($client), 'update client data success');
        }
    }
    
    public function delete (Request $request)
    {
        $request->validate([
            'id' => ['required', 'exists:clients,id']
        ]);

        $client = Client::find($request->id);
        $count = $client->budged_activity->count();

        if($count) {
            return ResponseFormatter::error([
                'message' => 'cannot delete this data'
            ], 'delete client data failed');
        } else {
            $client->delete();
            return ResponseFormatter::success(null, 'delete client data success');
        }
    }
}
