<?php

namespace App\Http\Controllers;

use App\Models\SenseiModel;
use App\Http\Requests\StoreSenseiRequest;
use App\Http\Requests\UpdateSenseiRequest;
use http\Exception\BadConversionException;
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
    public function store(StoreSenseiRequest $request): RedirectResponse
    {
        //
        SenseiModel::create([
            'nama' => $request->input('nama'),
            'username' => $request->input('username'),
            'password' => $request->input('password'),
            'kantor' => $request->input('kantor'),
            'sekretaris_id' => $request->input('sekretaris'),
        ]);

        return redirect()->route('schale.dashboard')->with('sukses', 'Data Sensei telah ditambahkan!');
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
    public function update(UpdateSenseiRequest $request, SenseiModel $sensei, $id)
    {
        $validateData = $request->validated();
        if ($validateData) {
            $sensei->update($validateData);
            return back()->with('sukses', 'Data Sensei berhasil diperbarui!');
        }
        else
            return back()->with('error', 'Data gagal diperbarui! Mohon periksa kembali input Anda.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SenseiModel $sensei)
    {
        if ($sensei) {
            $sensei->delete();
            return back()->with('sukses', 'Data Sensei berhasil dihapus!');
        }
        else
            return back()->with('error', 'Data Sensei gagal dihapus!');
    }
}
