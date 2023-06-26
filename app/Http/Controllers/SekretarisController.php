<?php

namespace App\Http\Controllers;

use App\Models\SekretarisModel;
use App\Http\Requests\StoreSekretarisRequest;
use App\Http\Requests\UpdateSekretarisRequest;
use App\Models\SenseiModel;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
    public final function store(StoreSekretarisRequest $request, SekretarisModel $sekretarisModel): RedirectResponse
    {
        $basicValidate = $request->validated();
        if ($basicValidate){
            $uniqueRule = [
                'username' => 'required||unique:sekretaris,username',
            ];
            $uniqueValidate = $request->validate($uniqueRule);
            if ($uniqueValidate){
                $query = $sekretarisModel->insertSekretaris($request->all());
                if ($query)
                    return back()->with('sukses', 'Data Sensei telah ditambahkan!');
                else
                    return back()->with('error', 'Sistem error! Data Sensei gagal ditambahkan.');
            }
            else
                return back()->with('error', 'Username telah digunakan!');
        }
        else
            return back()->with('error', 'Data tidak valid. Mohon cek kembali input anda!');
    }
    /**
     * Display the specified resource.
     */
    public function show(SekretarisModel $sekretarisModel)
    {
        //
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SekretarisModel $sekretarisModel)
    {
        //
    }
    /**
     * Update the specified resource in storage.
     */
    public final function update(UpdateSekretarisRequest $request, SekretarisModel $sekretarisModel): RedirectResponse
    {
        $basicValidate = $request->validated();
        if ($basicValidate){
            $isSameUsername = $sekretarisModel->sameUsernameCheck([
                'id_sekretaris' => $request->input('id_sekretaris'),
                'username' => $request->input('username'),
            ]);
            if (!$isSameUsername)
            {
                $uniqueRule = [ 'username' => 'required||unique:sekretaris,username',];
                $uniqueValidate = $request->validate($uniqueRule);
                if (!$uniqueValidate)
                    return back()->with('error', 'Username telah digunakan!');
            }
            $query = $sekretarisModel->updateSekretaris($request->all());
            if ($query)
                return back()->with('sukses', 'Data Sensei telah ditambahkan!');
            else
                return back()->with('error', 'Sistem error! Data Sensei gagal ditambahkan.');
        }
        else
            return back()->with('error', 'Data tidak valid. Mohon cek kembali input anda!');
    }
    /**
     * Remove the specified resource from storage.
     */
    public final function destroy(Request $request, SekretarisModel $sekretarisModel): RedirectResponse
    {
        dd($request->all());
        $validatedData = $request->validate([ 'password' => 'required', ]);
        if ($validatedData){
            $inputPw = $request->input('password');
            $schaleUser = Auth::guard('schale')->user();
            if (!Hash::check($inputPw, $schaleUser->getAuthPassword()))
                return back()->with('error', 'Password yang anda masukkan Salah!');
            else {
                $query = $sekretarisModel->deleteSekretaris($request->input('id_sekretaris'));
                if ($query)
                    return back()->with('sukses', 'Data Sensei berhasil dihapus!');
                else
                    return back()->with('error', 'Sistem error! Data Sensei gagal dihapus.');
            }
        }
        else
            return back()->with('error', 'Masukkan password untuk konfirmasi!');
    }
    public final function resetPassword(Request $request, SekretarisModel $sekretarisModel){
        $validatedData = $request->validate([ 'password' => 'required', ]);
        if ($validatedData){
            $inputPw = $request->input('password');
            $schaleUser = Auth::guard('schale')->user();
            if (!Hash::check($inputPw, $schaleUser->getAuthPassword()))
                return back()->with('error', 'Password yang anda masukkan Salah!');
            else {
                $query = $sekretarisModel->resetPwSekretaris($request->input('id_sensei'));
                if ($query)
                    return back()->with('sukses', 'Password Sensei berhasil direset!');
                else
                    return back()->with('error', 'Sistem error! Password Sensei gagal direset.');
            }
        }
        else
            return back()->with('error', 'Masukkan password untuk konfirmasi!');
    }
}
