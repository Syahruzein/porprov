<?php

namespace App\Http\Controllers;

use App\Models\Atlet;
use App\Models\Cabor;
use App\Models\Kontingen;
use App\Models\Nomor;
use Yajra\DataTables\Services\DataTable;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home(){
		return view('layouts.home');
	}
 
	public function kontingen(){
		return view('layouts.kontingen');
	}

	public function cabor(){
		return view('layouts.cabor');
	}

	public function jadwal(){
		return view('layouts.jadwal');
	}
 
	public function tempat(){
		return view('layouts.tempat');
	}

	public function hasil(){
		return view('layouts.hasil');
	}

	public function medali(){
		return view('layouts.medali');
	}
}
