<?php

namespace App\Http\Controllers;

use App\Models\AdminModel;
use App\Http\Requests\StoreAdminRequest;
use App\Http\Requests\UpdateAdminRequest;
use App\Models\SekretarisModel;
use App\Models\SenseiModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public final function loginPage() {
        if (Auth::guard('sensei')->check())  return redirect()->route('dashboard.sensei');
        elseif (Auth::guard('sekretaris')->check()) return redirect()->route('dashboard.sekretaris');
        elseif (Auth::guard('schale')->check()) return redirect()->route('dashboard.schale');

        return view('page5-admin.login-admin');
    }
    public final function index(SenseiModel $senseiModel, SekretarisModel $sekretarisModel)
    {
        return view('page5-admin.dashboard-admin', [
            'jumlahsensei' => $senseiModel->getAll()->count(),
            'jumlahsekretaris' => $sekretarisModel->getAll()->count()
        ]);
    }
    public final function registerSekretaris(Request $request, SekretarisModel $sekretarisModel): void {
        $validatedData = $request->validate([
            'nama_sekretaris' => 'required||unique:sekretaris, nama_sekretaris',
            'password_sekretaris' => 'required',
        ]);
        $validatedData['password_sekretaris'] = Hash::make($validatedData['password_sekretaris'], [
            'rounds' => 12,
        ]);
        $sekretarisModel->register($validatedData);
    }
    public final function getDataSensei(SenseiModel $senseiModel, SekretarisModel $sekretarisModel){
        return view('page5-admin.data-sensei', [
            'sensei' =>$senseiModel->getAll(),
            'nama' => $sekretarisModel->getNamaSekretaris(),
            'kantor' => $senseiModel->getKantor()
        ]);
    }
    public final function getDataSekretaris(SekretarisModel $sekretarisModel){
        return view('page5-admin.data-sekretaris', [
            'sekretaris' => $sekretarisModel->getAll()
        ]);
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
