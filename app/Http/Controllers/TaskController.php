<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoretasksRequest;
use App\Http\Requests\UpdatetasksRequest;
use App\Models\tasks;

class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoretasksRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoretasksRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\tasks  $tasks
     * @return \Illuminate\Http\Response
     */
    public function show(tasks $tasks)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\tasks  $tasks
     * @return \Illuminate\Http\Response
     */
    public function edit(tasks $tasks)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatetasksRequest  $request
     * @param  \App\Models\tasks  $tasks
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatetasksRequest $request, tasks $tasks)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\tasks  $tasks
     * @return \Illuminate\Http\Response
     */
    public function destroy(tasks $tasks)
    {
        //
    }
}