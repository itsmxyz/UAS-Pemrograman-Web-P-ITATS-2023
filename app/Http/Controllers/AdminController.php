<?php

namespace App\Http\Controllers;

use App\Models\AdminModel;
use App\Http\Requests\StoreAdminRequest;
use App\Http\Requests\UpdateAdminRequest;
use App\Models\DataKelasQuery;
use App\Models\KelasModel;
use App\Models\SekretarisModel;
use App\Models\SenseiModel;
use App\Models\SiswaModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public final function loginPage() {
        if (Auth::guard('sensei')->check())  return redirect()->route('sensei.dashboard');
        elseif (Auth::guard('sekretaris')->check()) return redirect()->route('sekretaris.dashboard');
        elseif (Auth::guard('schale')->check()) return redirect()->route('schale.dashboard');

        return view('page5-admin.login-admin');
    }
    public final function index(SenseiModel $senseiModel, SekretarisModel $sekretarisModel)
    {
        return view('page5-admin.dashboard-admin', [
            'jumlahsensei' => $senseiModel->jumlahSensei(),
            'jumlahsekretaris' => $sekretarisModel->jumlahSekretaris(),
        ]);
    }
    public final function getDataSensei(SenseiModel $senseiModel, SekretarisModel $sekretarisModel){
        return view('page5-admin.data-sensei', [
            'sensei' =>$senseiModel->getAll(),
            'sekretaris' => $sekretarisModel->namaSekretaris(),
            'kantor' => $senseiModel->listKantor()
        ]);
    }
    public final function getDataSekretaris(SekretarisModel $sekretarisModel){
        return view('page5-admin.data-sekretaris', [
            'sekretaris' => $sekretarisModel->getAll()
        ]);
    }
    public final function getDataSiswa(SiswaModel $siswaModel, KelasModel $kelasModel) {
        $dataSiswa = $siswaModel->getDataSiswa();
        $namaKelas = $kelasModel->getNamaKelas();
        return view('page5-admin.data-siswa', [
            'siswa' => $dataSiswa,
            'kelas' => $namaKelas,
        ]);
    }
    public final function getAllDataKelas(DataKelasQuery $dataKelasQuery, SenseiModel $senseiModel) {
        $dataAllKelas = $dataKelasQuery->getAllKelas();
        $sensei = $senseiModel->getAllIdNamaSensei();
        return view('page5-admin.data-kelas-all', [
            'kelas' => $dataAllKelas,
            'sensei'=> $sensei,
        ]);
    }
    public final function getDataKelasbyID(DataKelasQuery $dataKelasQuery, $id_kelas) {
        $dataKelas = '';
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
    public function store(StoreAdminRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(AdminModel $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AdminModel $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAdminRequest $request, AdminModel $admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AdminModel $admin)
    {
        //
    }
}
