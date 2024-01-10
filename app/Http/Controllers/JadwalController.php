<?php

namespace App\Http\Controllers;

use App\Models\Atlet;
use App\Models\Babak;
use App\Models\Cabor;
use App\Models\Kontingen;
use App\Models\Nomor;
use App\Models\Jadwal;
use App\Models\AtletJadwal;
use Yajra\DataTables\Services\DataTable;
use Illuminate\Http\Request;

use DB;
class JadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $jadwal = Jadwal::with(['babak','cabors','kontingens','nomors'])
        ->with('atlet_jadwals', function ($q) {
            $q->with('atlets', function ($q) {
                $q->with('kontingen');
            });
        })->get();
        // return $jadwal;
        if($request->ajax()){
            return datatables()->of($jadwal)
            ->addColumn('aksi', function ($row) {
                return '
                <button href="javascript:void(0)" class="btn-sm btn btn-danger delButtonJadwal" data-id="'.$row->id.'">Delete</button>
                ';
            })
            ->addColumn('atlet', function ($row) {
                $text = '-';
                if($row->atlet_jadwals != null) {
                    $text='';
                    foreach ($row->atlet_jadwals as $key => $value) {
                        $text.=$value->atlets->name.', ';
                    }
                }
                return $text;
            })
            ->addColumn('babak', function ($row) {
                $text = '-';
                if($row->babak != null) {
                    $text = $row->babak->name;
                }
                return $text;
            })
            ->addColumn('cabor', function ($row) {
                $text = '-';
                if($row->cabors != null) {
                    $text = $row->cabors->name;
                }
                return $text;
            })
            ->addColumn('kontingen', function ($row) {
                $text = '-';
                if($row->atlet_jadwals != null) {
                    $text='';
                    foreach ($row->atlet_jadwals as $key => $value) {
                        $text.=$value->atlets->kontingen->name.', ';
                    }
                }
                return $text;
            })
            ->addColumn('nomor', function ($row) {
                $text = '-';
                if($row->nomors != null) {
                    $text = $row->nomors->name;
                }
                return $text;
            })
            ->rawColumns(['aksi'])
            ->toJson();
        }
        return view('admin.jadwal.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['cabors'] = Cabor::all();
        $data['kontingens'] = Kontingen::all();
        $data['nomors'] = Nomor::all();
        $data['babaks'] = Babak::all();
        return view('admin.jadwal.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        DB::beginTransaction();
        $request->validate([
            'tanggal'=>'required',
            'waktu'=>'required',
            'selectCabang'=>'required',
            'selectBabak'=>'required',
            'tempat'=>'required|min:2'
        ]);

        if(!isset($request->id_jadwal)){
            $newJadwal=new Jadwal;
        } else {
            $newJadwal=Jadwal::find($request->id_jadwal);
        }
        $newJadwal->tanggal = date('Y-m-d H:i:s',strtotime($request->tanggal.' '.$request->waktu.':00'));
        $newJadwal->cabor_id = $request->selectCabang;
        $newJadwal->nomor_id = $request->selectNomor;
        $newJadwal->babak_id = $request->selectBabak;
        $newJadwal->tempat = $request->tempat;
        if(!$newJadwal->save()){
            DB::rollback();
            return response()->json(['error'=>'Gagal menyimpan data']);
        }
        foreach ($request->selectAtlet as $key => $atlet) {
            $atletJadwal = new AtletJadwal;
            $atletJadwal->atlet_id = $atlet;
            $atletJadwal->jadwal_id = $newJadwal->id;
            if (!$atletJadwal->save()) {
                DB::rollback();
                return response()->json(['error'=>'Gagal menyimpan data'], 400);
            }
        }
        DB::commit();
        return response()->json(['success'=>'Berhasil menyimpan data'], 201);
        return $request->all();
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
        DB::beginTransaction();
        $jadwal = Jadwal::where('id',$id)->first();
        if (!$jadwal->delete()) {
            DB::rollback();
            return response()->json(['error'=>'Gagal menghapus data'], 400);
        }
        $atletJadwal = AtletJadwal::where('jadwal_id',$id)->get();
        if(!$atletJadwal->delete()) {
            DB::rollback();
            return response()->json(['error'=>'Gagal menghapus data'], 400);
        }
        DB::commit();
        return response()->json(['success'=>'Berhasil menghapus data'], 200);
    }
}
