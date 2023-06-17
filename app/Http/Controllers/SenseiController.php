<?php

namespace App\Http\Controllers;

use App\Models\SenseiModel;
use App\Http\Requests\StoreSenseiRequest;
use App\Http\Requests\UpdateSenseiRequest;

class SenseiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('page3-dashboard.dashboard');
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
    public function store(StoreSenseiRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(SenseiModel $sensei)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SenseiModel $sensei)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSenseiRequest $request, SenseiModel $sensei)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SenseiModel $sensei)
    {
        //
    }
}
