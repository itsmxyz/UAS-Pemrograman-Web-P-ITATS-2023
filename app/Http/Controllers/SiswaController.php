<?php

namespace App\Http\Controllers;

use App\Models\SiswaModel;
use App\Http\Requests\StoreSiswaRequest;
use App\Http\Requests\UpdateSiswaRequest;
use Psr\Log\NullLogger;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(StoreSiswaRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(SiswaModel $siswaModel)
    {
        //
        $dataSiswa =  $siswaModel->getDataSiswa();
        return view('page5-admin.data-siswa', ['siswa' => $dataSiswa]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SiswaModel $siswa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSiswaRequest $request, SiswaModel $siswa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SiswaModel $siswa)
    {
        //
    }
}
