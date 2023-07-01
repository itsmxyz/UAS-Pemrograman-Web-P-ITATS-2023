<?php

namespace App\Http\Controllers;

use App\Models\KelasModel;
use App\Http\Requests\StoreKelasRequest;
use App\Http\Requests\UpdateKelasRequest;

class KelasController extends Controller
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
    public function store(StoreKelasRequest $storeKelasRequest, KelasModel $kelasModel)
    {
        $inputData = [
            'id_kelas' => $storeKelasRequest->input('kode_kelas'),
            'nama_kelas' => $storeKelasRequest->input('nama_kelas'),
            'wali_kelas' => $storeKelasRequest->input('wali_kelas'),
        ];
        $query = $kelasModel->insertKelas($inputData);
        if ($query)
            return back()->with('sukses','Data Kelas berhasil ditambahkan!');
        else
            return back()->withErrors(['error' => 'Data Kelas gagal ditambahkan!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(KelasModel $kelas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(KelasModel $kelas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateKelasRequest $request, KelasModel $kelas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(KelasModel $kelas)
    {
        //
    }
}
