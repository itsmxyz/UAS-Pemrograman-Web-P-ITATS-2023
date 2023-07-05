<?php

namespace App\Http\Controllers;

use App\Models\SiswaModel;
use App\Http\Requests\StoreSiswaRequest;
use App\Http\Requests\UpdateSiswaRequest;
use Illuminate\Support\Facades\Hash;
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
    public function store(StoreSiswaRequest $request, SiswaModel $siswaModel)
    {
        //
        $validatedData = [
            'nama_siswa' => $request->input('nama_siswa'),
            'jenis_kelamin' => $request->input('jenis_kelamin'),
            'kelas_id' => '00000',
        ];
        $query = $siswaModel->insertNewSiswa($validatedData);
        if ($query)
            return back()->with('sukses','Data Siswa berhasil ditambahkan!');
        else
            return back()->withErrors(['error' => 'Data Siswa gagal ditambahkan!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(SiswaModel $siswaModel)
    {
        //
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
    public function destroy(SiswaModel $siswaModel)
    {
        //

    }
}
