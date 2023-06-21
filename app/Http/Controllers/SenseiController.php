<?php

namespace App\Http\Controllers;

use App\Models\SenseiModel;
use App\Http\Requests\StoreSenseiRequest;
use App\Http\Requests\UpdateSenseiRequest;
use Illuminate\Http\RedirectResponse;

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
    public function store(StoreSenseiRequest $request, SenseiModel $senseiModel): RedirectResponse
    {
        $validatedData = $request->validated();

        if ($validatedData) {
            $senseiModel->create([
                'nama' => $validatedData['nama'],
                'username' => $validatedData['username'],
                'password' => $validatedData['password'],
                'kantor' => $validatedData['kantor'],
                'sekretaris_id' => $validatedData['sekretaris'],
            ]);
            return back()->with('sukses', 'Data Sensei berhasil ditambahkan!');
        } else
            return back()->with('error', 'Data tidak valid! Priksa kembali input Anda.');
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
        $find = $sensei->find($request->input('id_sensei'));

        if ($request->input('username') != $find->username){
            $newRules = [
                'username' => 'required||unique:sensei,username',
            ];
            $validateData = $request->validate($newRules);
            if ($validateData) {
                $find->update([
                    'nama' => $request->input('nama'),
                    'username' => $request->input('username'),
                    'kantor' => $request->input('kantor'),
                    'sekretaris_id' => $request->input('sekretaris'),
                ]);
                return back()->with('sukses', 'Data Sensei berhasil diperbarui!');
            }
            else
                return back()->with('error', 'Data gagal diperbarui! Mohon periksa kembali input Anda.');
        }
        else
            return back()->with('error', 'Username telah diambil.');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SenseiModel $senseiModel)
    {
        if ($senseiModel) {
            $senseiModel->delete();
            return back()->with('sukses', 'Data Sensei berhasil dihapus!');
        }
        else
            return back()->with('error', 'Data Sensei gagal dihapus!');
    }
}
