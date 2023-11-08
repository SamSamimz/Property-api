<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTasksRequest;
use App\Http\Resources\TasksResource;
use App\Models\Task;
use App\Traits\HttpResponses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use function Laravel\Prompts\error;

class TaskController extends Controller
{
    use HttpResponses;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        // $tasks = Task::all();
        $tasks = Auth::user()->tasks;
        return TasksResource::collection($tasks);
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
    public function store(StoreTasksRequest $request)
    {
        $request->validated($request->all());
        $task = $request->user()->tasks()->create([
            'name' => $request->name,
            'description' => $request->description,
            'priority' => $request->priority,
        ]);
        return new TasksResource($task);
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        return $this->isNotAuthenticated($task) ? $this->isNotAuthenticated($task) :  new TasksResource($task);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreTasksRequest $request, Task $task)
    {
        $request->validated($request->all());
        if($task->user_id !== Auth::user()->id) {
            return $this->error('','Unauthorized',403);
        }    
        $task->update($request->all());
        return new TasksResource($task);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        return $this->isNotAuthenticated($task) ? $this->isNotAuthenticated($task) : $task->delete();
    }

    // IsNotAuthenticated
    private function isNotAuthenticated($task) {
        if($task->user_id !== Auth::user()->id) {
            return $this->error('','Unauthorized',403);
        }
    }

}
