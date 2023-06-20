<?php

namespace App\Http\Controllers;

use App\Models\SekretarisModel;
use App\Http\Requests\StoreSekretarisRequest;
use App\Http\Requests\UpdateSekretarisRequest;

class SekretarisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
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
    public function store(StoreSekretarisRequest $request, SekretarisModel $sekretarisModel)
    {
        //
        $validatedData = $request->validated();

        if ($validatedData) {
            $sekretarisModel->create([
                'nama' => $validatedData['nama'],
                'username' => $validatedData['username'],
                'password' => $validatedData['password'],
            ]);
            return back()->with('sukses', 'Data Sekretaris berhasil ditambahkan!');
        } else
            return back()->with('error', 'Data tidak valid! Priksa kembali input Anda.');
    }

    /**
     * Display the specified resource.
     */
    public function show(SekretarisModel $sekretaris)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SekretarisModel $sekretaris)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSekretarisRequest $request, SekretarisModel $sekretarisModel)
    {
        //
        $validateData = $request->validated();
        if ($validateData) {
            if ($sekretarisModel->findOrFail($validateData['id']))
            $sekretarisModel->update([
                'nama' => $validateData['nama'],
                'username' => $validateData['username'],
                'password' => $validateData['password'],
            ]);
            return back()->with('sukses', 'Data Sekretaris berhasil diperbarui!');
        }
        else
            return back()->with('error', 'Data gagal diperbarui! Mohon periksa kembali input Anda.');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SekretarisModel $sekretaris)
    {
        //
    }
}
