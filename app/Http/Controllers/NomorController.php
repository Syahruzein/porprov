<?php

namespace App\Http\Controllers;

use App\Models\Nomor;
use App\Models\Cabor;
use Illuminate\Http\Request;
use Yajra\DataTables\Services\DataTable;

class NomorController extends Controller
{
    public function getNomorByCabor(Request $request) {
        $request->validate([
            'selectCabang'=>'required'
        ]);

        $nomor = Nomor::select('id', 'name')->where('cabor_id', $request->selectCabang)->get();
        return response()->json(['success' => 'Nomor berhasil dihapus', 'nomor'=>$nomor], 200);
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        
        $nomor = Nomor::with('cabor')->get();
        if($request->ajax()) {

            return datatables()->of($nomor)
            ->addColumn('aksi', function ($row) {
                return '
                <a href="javascript:void(0)" class="btn-sm btn btn-primary editButtonNomor" data-id="'.$row->id.'">Edit</a>
                <a href="javascript:void(0)" class="btn-sm btn btn-danger delButtonNomor" data-id="'.$row->id.'">Delete</a>
                ';
            })
            ->addColumn('cabor', function ($row) {
                $text = '-';
                if($row->cabor != null) {
                    // tapi pas mari diquery
                    // nek iki object ga perlu di foreach / []
                    $text = $row->cabor->name;
                    // nek array gini ambil e
                    // $text = $row->cabor[0]->name;
                    // $text = $row->cabor[1]->name;
                    // $text = $row->cabor[2]->name;
                    // // nek array mending pakai foreach
                    // foreach ($row->cabor as $key => $value) {
                    //     $text = $value->name; iki wes array kan?
                    // } iyo sing iiki
                }
                return $text;
            })
            ->rawColumns(['aksi'])->toJson();
        }
        return view('admin.nomor.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['cabors'] = Cabor::all();
        return view('admin.nomor.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nameNomor'=>'required|min:2|unique:nomors,name',
            'selectCabang'=>'required'
        ]);
        // nek misal edit berarti ngirim id_nomor
        if(!isset($request->id_nomor)) {
            $newNomor=new Nomor;
        } else {
            $newNomor=Nomor::find($request->id_nomor);
        }
        $newNomor->name = $request->nameNomor;
        $newNomor->cabor_id = $request->selectCabang;
        if(!$newNomor->save()) {
            return response()->json(['error'=>'Gagal Menyimpan Data']);
        }
        return response()->json([
            'success'=>'Berhasil Menyimpan Data'
        ], 201);
        return $request->all();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // $nomor = Nomor::find($nomor);
        // return ($id)->with('nomor' $nomor);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // return $id;
        $data['nomor'] = Nomor::find($id);
        $data['cabors'] = Cabor::all();
        // return $data;
        if(! $data['nomor']) {
            abort (404);
        }
        return view('admin.nomor.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    // public function update(Request $request, string $id)
    // {
        
    // }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $nomor = Nomor::find($id);
        if(! $nomor) {
            abort (404);
        }
        $nomor->delete();
        return response()->json(['success' => 'Nomor berhasil dihapus'], 200);
    }
}
