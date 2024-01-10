<?php

namespace App\Http\Controllers;

use App\Models\Atlet;
use App\Models\Cabor;
use App\Models\Kontingen;
use Yajra\DataTables\Services\DataTable;
use Illuminate\Http\Request;

class AtletKontingenCaborController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $atlet = Atlet::with('cabor')->get();
        $atlet = Atlet::with('kontingen')->get();
        if($request->ajax()){

            return datatables()->of($atlet)
            ->addColumn('aksi', function ($row) {
                return '
                <button href="javascript:void(0)" class="btn-sm btn btn-primary editButtonAtletKonCa" data-id="'.$row->id.'">Edit</button>
                <button href="javascript:void(0)" class="btn-sm btn btn-danger delButtonAtletKonCa" data-id="'.$row->id.'">Delete</button>
                ';
            })
            ->addColumn('cabor', function ($row) {
                $text = '-';
                if($row->cabor != null) {
                    $text = $row->cabor->name;
                }
                return $text;
            })
            ->addColumn('kontingen', function ($row) {
                $text = '-';
                if($row->kontingen != null) {
                    $text = $row->kontingen->name;
                }
                return $text;
            })
            ->rawColumns(['aksi'])
            ->toJson();
        }
        return view('admin.atlet-kotingen-cabor.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['cabors'] = Cabor::all();
        $data['kontingens'] = Kontingen::all();
        return view('admin.atlet-kotingen-cabor.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nameAtletKonCa'=>'required|min:2',
            'selectKontingen'=>'required',
            'selectCabang'=>'required'
        ]);

        if(!isset($request->id_atlet)){
            $newAtletKonCa=new Atlet;
        } else {
            $newAtletKonCa=Atlet::find($request->id_atlet);
        }
        $newAtletKonCa->name = $request->nameAtletKonCa;
        $newAtletKonCa->kontingen_id = $request->selectKontingen;
        $newAtletKonCa->cabor_id = $request->selectCabang;
        if(!$newAtletKonCa->save()) {
            return response()->json(['error'=>'Gagal menyimpan data']);
        }
        return response()->json([
            'success'=>'Berhasil menyimpan data'
        ], 201);
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
        $data['atlet'] = Atlet::find($id);
        $data['kontingens'] = Kontingen::all();
        $data['cabors'] = Cabor::all();
        // return $data;
        if(! $data['atlet']) {
            abort (404);
        }
        return view('admin.atlet-kotingen-cabor.edit', $data);
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
        $atlet = Atlet::find($id);
        if(! $atlet) {
            abort (404);
        }
        $atlet->delete();
        return response()->json(['success' => 'Atlet berhasil dihapus'], 200);
    }
}
