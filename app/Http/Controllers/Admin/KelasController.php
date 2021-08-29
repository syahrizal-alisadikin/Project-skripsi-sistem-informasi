<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Includes;
use App\Kelas;
use App\Materi;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    public function index()
    {
        $kelas = Kelas::all();
        return view('pages.admin.kelas.index',compact('kelas'));
    }

    public function create()
    {
        $materi = Materi::all();
        $includes = Includes::all();
        return view('pages.admin.kelas.create',compact('materi','includes'));
    }
}
