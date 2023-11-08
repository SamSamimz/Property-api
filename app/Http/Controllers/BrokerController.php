<?php

namespace App\Http\Controllers;

use App\Http\Requests\BrokerStoreRequest;
use App\Http\Resources\BrokersResource;
use App\Models\Broker;
use App\Traits\HttpResponses;
use Illuminate\Http\Request;

use function Laravel\Prompts\error;

class BrokerController extends Controller
{
    use HttpResponses;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $brokers = Broker::all();
        return BrokersResource::collection($brokers);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BrokerStoreRequest $request)
    {
        $request->validated();
        $broker = Broker::create([
            'name' => $request->name,
            'address' => $request->address,
            'city' => $request->city,
            'zip_code' => $request->zip_code,
            'phone_number' => $request->phone_number,
            'logo_path' => $request->logo_path,
        ]);
        return new BrokersResource($broker);
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Broker $broker)
    {
        return new BrokersResource($broker);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Broker $broker)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BrokerStoreRequest $request, Broker $broker)
    {
        $broker->update($request->only([
            'name',
            'address',
            'city',
            'zip_code',
            'phone_number',
            'logo_path',
        ]));
        return new BrokersResource($broker);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Broker $broker)
    {
        $broker->delete();
        return $this->success(['',"Broker has been deleted",200]);
    }


}
