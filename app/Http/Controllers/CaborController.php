<?php

namespace App\Http\Controllers;

use App\Models\Cabor;
use Illuminate\Http\Request;
use Yajra\DataTables\Services\DataTable;
use Illuminate\Support\Facades\DB;

class CaborController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if($request->ajax()) {
            $cabor = Cabor::all();

            return datatables()->of($cabor)
            ->addColumn('aksi', function ($row) {
                return '
                <button href="javascript:void(0)" class="btn-sm btn btn-primary editButtonCabor" data-id="'.$row->id.'">Edit</button>
                <button href="javascript:void(0)" class="btn-sm btn btn-danger delButtonCabor" data-id="'.$row->id.'">Delete</button>
                ';
            })
            ->rawColumns(['aksi'])
            ->toJson();
        }
        return view('admin.cabor.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.cabor.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nameCabor'=>'required|min:2|unique:cabors,name'
        ]);

        // $newCabor = Cabor::create([
        //     'name' => $request->nameCabor
        // ]);
        if(!isset($request->id_cabor)) {
            $newCabor = new Cabor;
        } else {
            $newCabor=Cabor::find($request->id_cabor);
        }
        $newCabor->name = $request->nameCabor;
        if(!$newCabor->save()) {
            return response()->json(['error'=>'Gagal menyimpan data']);
        }
        return response()->json([
            'success' => 'Berhasil menyimpan data'
        ], 201 );
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
        $data['cabor'] = Cabor::find($id);
        if(! $data['cabor']){
            abort (404);
        }
        return view('admin.cabor.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    // public function update(Request $request, string $id)
    // {
    //     //
    // }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $cabor = Cabor::find($id);
        if(! $cabor) {
            abort (404);
        }
        $cabor->delete();
        return response()->json(['success' => 'Cabor berhasil dihapus'], 200);
    }
}
