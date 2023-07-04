<?php

namespace App\Http\Controllers;

use App\Models\DataKelasQuery;
use App\Models\KelasModel;
use App\Models\MataPelajaranModel;
use App\Models\SenseiModel;
use App\Http\Requests\StoreSenseiRequest;
use App\Http\Requests\UpdateSenseiRequest;
use Dflydev\DotAccessData\Data;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SenseiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(KelasModel $kelasModel)
    {
        $id_sensei = Auth::guard('sensei')->user()->getAuthIdentifier();
        $jumlahKelas = $kelasModel->getJumlahKelasbySensei($id_sensei);
        return view('page3-user.sensei-dashboard',compact('jumlahKelas'));
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
                $input = [
                    'nama' => $request->input('nama'),
                    'username' => $request->input('username'),
                    'password' => Hash::make($request->input('password')),
                    'kantor' => $request->input('kantor'),
                    'sekretaris_id' => $request->input('sekretaris')
                ];
                $query = $senseiModel->insertSensei($input);
                if ($query) {
                    return back()->with('sukses', 'Data telah ditambahkan!');
                }
                else
                    return back()->withErrors('Sistem error! Data Sensei gagal ditambahkan.')
                        ->withErrors('Sistem error! Data Sensei gagal ditambahkan.');
            }
            else
                return back()->withErrors('Username telah digunakan!')
                    ->withErrors('Username telah digunakan!');
        }
        else
            return back()->withErrors('Data tidak valid. Mohon cek kembali input anda!')
                ->withErrors('Data tidak valid. Mohon cek kembali input anda!');
    }
    /**
     * Display the specified resource.
     */
    public function show(DataKelasQuery $dataKelasQuery)
    {
        $id_sensei = Auth::guard('sensei')->user()->getAuthIdentifier();
        $dataKelas = $dataKelasQuery->getAllKelasBySenseiID($id_sensei);
        return view('page3-user.sensei-kelas-all', [
            'kelas' => $dataKelas,
        ]);
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
                    return back()->withErrors('Username telah digunakan!')
                        ->withErrors('Username telah digunakan!');
            }
            $query = $senseiModel->updateSensei($request->all());
            if ($query) {
                return back()->with('sukses', 'Data berhasil diubah!');
            }
            else
                return back()->withErrors('Sistem error! Data Sensei gagal ditambahkan.')
                    ->withErrors('Sistem error! Data Sensei gagal ditambahkan.');
        }
        else
            return back()->withErrors('Data tidak valid. Mohon cek kembali input anda!')
                ->withErrors('Data tidak valid. Mohon cek kembali input anda!');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, SenseiModel $senseiModel): RedirectResponse
    {
        $validatedData = $request->validate(['password' => 'required',]);
        if ($validatedData){
            $inputPw = $request->input('password');
            $schaleUser = Auth::guard('schale')->user();
            if (!Hash::check($inputPw, $schaleUser->getAuthPassword()))
                return back()->withErrors('Password yang anda masukkan Salah!')
                    ->withErrors('Password yang anda masukkan Salah!');
            else {
                $query = $senseiModel->deleteSensei($request->input('id_sensei'));
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
    public final function resetPassword(Request $request, SenseiModel $senseiModel){
        $validatedData = $request->validate([ 'password' => 'required', ]);
        if ($validatedData){
            $inputPw = $request->input('password');
            $schaleUser = Auth::guard('schale')->user();
            if (!Hash::check($inputPw, $schaleUser->getAuthPassword()))
                return back()->withErrors('Password yang anda masukkan Salah!')
                    ->withErrors('Password yang anda masukkan Salah!');
            else {
                $query = $senseiModel->resetPwSensei($request->input('id_sensei'));
                if ($query) {
                    return back()->with('sukses', 'Password berhasil direset!');
                }
                else
                    return back()->withErrors('Sistem error! Password Sensei gagal direset.')
                        ->withErrors('Sistem error! Password Sensei gagal direset.');
            }
        }
        else
            return back()->withErrors('Masukkan password untuk konfirmasi!');
    }
    public final function showKelas(DataKelasQuery $dataKelasQuery, $id_kelas) {
        $kelas = $dataKelasQuery->getDataKelasById($id_kelas);
        return view('page3-user.sensei-kelas-view', compact('kelas'));
    }
    public final function getAllMapel(MataPelajaranModel $mapel) {
        $id_sensei = Auth::guard('sensei')->user()->getAuthIdentifier();
        $dataMapel = $mapel->getMaPelSensei($id_sensei);
        return view('page3-user.sensei-mapel-all',['mapel' => $dataMapel]);
    }
    public final function getDataMapel($id_sensei,DataKelasQuery $dataKelasQuery) {
        $dataMapel = $dataKelasQuery->getDataMapelBySensei($id_sensei);
        return view('page3-user.sensei-mapel-view',compact('dataMapel'));
    }
}
