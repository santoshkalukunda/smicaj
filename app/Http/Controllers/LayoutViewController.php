<?php

namespace App\Http\Controllers;

use App\Models\LayoutView;
use App\Http\Requests\StoreLayoutViewRequest;
use App\Http\Requests\UpdateLayoutViewRequest;

class LayoutViewController extends Controller
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
     * @param  \App\Http\Requests\StoreLayoutViewRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLayoutViewRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\LayoutView  $layoutView
     * @return \Illuminate\Http\Response
     */
    public function show(LayoutView $layoutView)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LayoutView  $layoutView
     * @return \Illuminate\Http\Response
     */
    public function edit(LayoutView $layoutView)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateLayoutViewRequest  $request
     * @param  \App\Models\LayoutView  $layoutView
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateLayoutViewRequest $request, LayoutView $layoutView)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LayoutView  $layoutView
     * @return \Illuminate\Http\Response
     */
    public function destroy(LayoutView $layoutView)
    {
        //
    }
}
