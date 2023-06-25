<?php

namespace App\Http\Controllers;

use App\Models\SenseiModel;
use App\Http\Requests\StoreSenseiRequest;
use App\Http\Requests\UpdateSenseiRequest;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
        $basicValidate = $request->validated();
        if ($basicValidate){
            $uniqueRule = [
                'username' => 'required||unique:sensei,username',
            ];
            $uniqueValidate = $request->validate($uniqueRule);
            if ($uniqueValidate){
                $query = $senseiModel->insertSensei($request->all());
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
    public function update(UpdateSenseiRequest $request, SenseiModel $senseiModel)
    {
        $basicValidate = $request->validated();
        if ($basicValidate){
            $isSameUsername = $senseiModel->sameUsernameCheck([
                'id_sensei' => $request->input('id_sensei'),
                'username' => $request->input('username'),
                ]);
            if (!$isSameUsername)
            {
                $uniqueRule = [ 'username' => 'required||unique:sensei,username',];
                $uniqueValidate = $request->validate($uniqueRule);
                if (!$uniqueValidate)
                    return back()->with('error', 'Username telah digunakan!');
            }
            $query = $senseiModel->updateSensei($request->all());
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
    public function destroy(Request $request, SenseiModel $senseiModel): RedirectResponse
    {
        dd($request->all());
        $validatedData = $request->validate([ 'password' => 'required', ]);
        if ($validatedData){
            $inputPw = $request->input('password');
            $schaleUser = Auth::guard('schale')->user();
            if (!Hash::check($inputPw, $schaleUser->getAuthPassword()))
                return back()->with('error', 'Password yang anda masukkan Salah!');
            else {
                $query = $senseiModel->deleteSensei($request->input('id_sensei'));
                if ($query)
                    return back()->with('sukses', 'Data Sensei berhasil dihapus!');
                else
                    return back()->with('error', 'Sistem error! Data Sensei gagal dihapus.');
            }
        }
        else
            return back()->with('error', 'Masukkan password untuk konfirmasi!');
    }
}
