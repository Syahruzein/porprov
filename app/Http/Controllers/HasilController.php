<?php

namespace App\Http\Controllers;

use App\Models\Atlet;
use App\Models\Babak;
use App\Models\Cabor;
use App\Models\Hasil;
use App\Models\Kontingen;
use App\Models\Medali;
use App\Models\Nomor;
use Yajra\DataTables\Services\DataTable;
use Illuminate\Http\Request;

use DB;
class HasilController extends Controller
{
    public function getMedali(Request $request) {
        $medali = Kontingen::select('hasils.kontingen_id', 'kontingens.name',
        DB::raw('count(case when hasils.medali_id = 1 then 1 else null end) as emas'), 
        DB::raw('count(case when hasils.medali_id = 2 then 1 else null end) as perak'), 
        DB::raw('count(case when hasils.medali_id = 3 then 1 else null end) as perunggu'))
        ->leftJoin('hasils', 'kontingens.id', '=', 'hasils.kontingen_id')->groupBy('hasils.kontingen_id', 'kontingens.name')->get();

        // return $medali;
       
        if($request->ajax()){
            return datatables()->of($medali)
            ->addColumn('total', function ($row) {
                return (int)$row->emas + (int)$row->perak + (int)$row->perunggu;
            })
            // ->addColumn('emas', function ($row) {
            //     $text = '-';
            //     if($row->medalis != null ) {
            //         $text = $row->medalis->count();
            //     }
            //     return $text;
            // })
            // ->addColumn('perak', function ($row) {
            //     $text = '-';
            //     if($row->medalis != null) {
            //         $text = $row->medalis->count();
            //     }
            //     return $text;
            // })
            // ->addColumn('perunggu', function ($row) {
            //     $text = '-';
            //     if($row->medalis != null ) {
            //         $text = $row->medalis->count();
            //     }
            //     return $text;
            // })
            // ->addColumn('total', function ($row) {
            //     $text = '-';
            //     if($row->medalis != null) {
            //         $text = $row->medalis->count();
            //     }
            //     return $text;
            // })
            ->rawColumns(['aksi'])
            ->toJson();
        }
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $hasil = Hasil::with(['atlets','babak','cabors','kontingens','nomors','medalis'])->get();
        // return $hasil;
        if($request->ajax()){
            return datatables()->of($hasil)
            ->addColumn('aksi', function ($row) {
                return '
                <button href="javascript:void(0)" class="btn-sm btn btn-danger delButtonHasil" data-id="'.$row->id.'">Delete</button>
                ';
            })
            ->addColumn('atlet', function ($row) {
                $text = '-';
                if($row->atlets != null) {
                    $text = $row->atlets->name;
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
                if($row->kontingens != null) {
                    $text = $row->kontingens->name;
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
            ->addColumn('medali', function ($row) {
                $text = '-';
                if($row->medalis != null) {
                    $text = $row->medalis->name;
                }
                return $text;
            })
            ->rawColumns(['aksi'])
            ->toJson();
        }
        return view('admin.hasil.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['atlets'] = Atlet::all();
        $data['babaks'] = Babak::all();
        $data['cabors'] = Cabor::all();
        $data['kontingens'] = Kontingen::all();
        $data['medalis'] = Medali::all();
        $data['nomors'] = Nomor::all();
        return view('admin.hasil.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'selectKontingen'=>'required',
            'selectCabang'=>'required',
            'selectNomor'=>'required',
            'selectAtlet2'=>'required',
            'selectBabak'=>'required',
            'selectMedali'=>'required',
        ]);

        if(!isset($request->id_hasil)){
            $newHasil=new Hasil;
        } else {
            $newHasil=Hasil::find($request->id_hasil);
        }
        $newHasil->kontingen_id = $request->selectKontingen;
        $newHasil->cabor_id = $request->selectCabang;
        $newHasil->nomor_id = $request->selectNomor;
        $newHasil->atlet_id = $request->selectAtlet2;
        $newHasil->babak_id = $request->selectBabak;
        $newHasil->medali_id = $request->selectMedali;
        if(!$newHasil->save()){
            return response()->json(['error'=>'Gagal menyimpan data']);
        }
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
        $data['hasils'] = Hasil::find($id);
        $data['kontingens'] = Kontingen::all();
        $data['cabors'] = Cabor::all();
        $data['nomors'] = Nomor::all();
        $data['atlets'] = Atlet::all();
        $data['babaks'] = Babak::all();
        $data['medalis'] = Medali::all();
        if(! $data['hasils']) {
            abort (404);
        }
        return view('admin.hasil.edit', $data);
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
        $hasil = Hasil::find($id);
        if(!$hasil) {
            abort (404);
        }
        $hasil->delete();
        return response()->json(['success'=>'Hasil berhasil dihapus'], 200);
    }
}
