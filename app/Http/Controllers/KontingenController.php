<?php

namespace App\Http\Controllers;

use App\Models\Kontingen;
use Yajra\DataTables\Services\DataTable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KontingenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if($request->ajax()) {
            $kontingen = Kontingen::all();

            return datatables()->of($kontingen)
            ->addColumn('aksi', function ($row) {
                return '
                <button href="javascript:void(0)" class="btn-sm btn btn-primary editButtonKontingen" data-id="'.$row->id.'">Edit</button>
                <button href="javascript:void(0)" class="btn-sm btn btn-danger delButtonKontingen" data-id="'.$row->id.'">Delete</button>
                ';
            })
            ->rawColumns(['aksi'])
            ->toJson();
        }
        return view('admin.kontingen.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.kontingen.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nameKontingen'=>'required|min:2|unique:kontingens,name'
        ]);
        // $newKontingen = Kontingen::create([
        //     'name' => $request->nameKontingen
        // ]);
        if(!isset($request->id_kontingen)) {
            $newKontingen = new Kontingen;
        } else {
            $newKontingen=Kontingen::find($request->id_kontingen);
        }
        $newKontingen->name = $request->nameKontingen;
        if(!$newKontingen->save()) {
            return response()->json(['error' => 'Gagal menyimpan data']);
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
        $data['kontingen'] = Kontingen::find($id);
        if(! $data['kontingen']){
            abort (404);
        }
        return view('admin.kontingen.edit', $data);
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
        $kontingen = Kontingen::find($id);
        if(! $kontingen) {
            abort (404);
        }
        $kontingen->delete();
        return response()->json(['success' => 'Kontingen berhasil dihapus'], 200);
    }
}
