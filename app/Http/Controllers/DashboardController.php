<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Atlet;
use App\Models\Jadwal;
use App\Models\Kontingen;
use App\Models\Hasil;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $data['db_active'] = "dashboard";
        $data['sub_db_active'] = "";
        $jumlah_atlet = Atlet::all()->count();
        $jumlah_kontingen = Kontingen::all()->count();
        $jumlah_jadwal = Jadwal::all()->count();
        $jumlah_hasil = Hasil::all()->count();
        return view('admin.dashboard.index', $data)
        ->with('jumlah_atlet', $jumlah_atlet)
        ->with('jumlah_kontingen', $jumlah_kontingen)
        ->with('jumlah_jadwal', $jumlah_jadwal)
        ->with('jumlah_hasil', $jumlah_hasil);
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
