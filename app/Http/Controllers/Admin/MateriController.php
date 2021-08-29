<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Materi;
use Illuminate\Http\Request;

class MateriController extends Controller
{
    public function index()
    {
        $materies = Materi::all();
        return view('pages.admin.materi.index',compact('materies'));
    }

    public function create()
    {
        return view('pages.admin.materi.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:materis',
        ]);

        Materi::create([
            'name' => $request->name
        ]);
        return redirect()->route('materi.index')->with('success','Data Berhasil ditambahkan!!');
    }

    public function edit($id)
    {
        $materi = Materi::find($id);
        return view('pages.admin.materi.edit',compact('materi'));
    }

    public function update(Request $request,$id)
    {
        $this->validate($request, [
            'name' => 'required|unique:materis',
        ]);

        $materi = Materi::findOrFail($id);
        $materi->update([
            'name' => $request->name
        ]);

        return redirect()->route('materi.index')->with('success','Data Berhasil diupdate !!');

    }

    public function destroy($id)
    {
        $materi = Materi::findOrFail($id);
        $materi->delete();

         if($materi){
            return response()->json([
                'status' => 'success'
            ]);
        }else{
            return response()->json([
                'status' => 'error'
            ]);
        }
    }
}
