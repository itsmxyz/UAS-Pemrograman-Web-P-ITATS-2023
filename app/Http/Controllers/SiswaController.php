<?php

namespace App\Http\Controllers;

use App\Models\SiswaModel;
use App\Http\Requests\StoreSiswaRequest;
use App\Http\Requests\UpdateSiswaRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
    public function update(StoreSiswaRequest $request, SiswaModel $siswa)
    {
        //
        dd($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request,SiswaModel $siswaModel)
    {
        //
        $validatedData = $request->validate(['password' => 'required',]);
        if ($validatedData){
            $inputPw = $request->input('password');
            $schaleUser = Auth::guard('schale')->user();
            if (!Hash::check($inputPw, $schaleUser->getAuthPassword()))
                return back()->withErrors('Password yang anda masukkan Salah!')
                    ->withErrors('Password yang anda masukkan Salah!');
            else {
                $query = $siswaModel->deleteSiswa($request->input('id_siswa'));
                if ($query) {
                    return back()->with('sukses', 'Data telah dihapus!');
                }
                else
                    return back()->withErrors('Sistem error! Data Sensei gagal dihapus.')
                        ->withErrors('Sistem error! Data Sensei gagal dihapus.');
            }
        }
        else
            return back()->withErrors('error', 'Masukkan password untuk konfirmasi!')
                ->withErrors('error', 'Masukkan password untuk konfirmasi!');
    }
}
