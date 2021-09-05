<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Instruktur;
use Illuminate\Http\Request;

class InstrukturController extends Controller
{
    public function index()
    {
        $instruktur = Instruktur::get();
        return view('pages.admin.instruktur.index',compact('instruktur'));
    }

    public function create()
    {
        return view('pages.admin.instruktur.create');

    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:instrukturs',
            'email' => 'required|email',
            'phone' => 'required',
            'alamat' => 'required',
        ]);

        Instruktur::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'alamat' => $request->alamat,
            'jenis_kelamin' => $request->jenis_kelamin,
            'status' => $request->status,
        ]);

        return redirect()->route('instruktur.index')->with('success','data berhasil ditambahkan!!');
    }

    public function edit($id)
    {
        $instruktur = Instruktur::findOrFail($id);

        return view('pages.admin.instruktur.edit',compact('instruktur'));

    }

    public function update(Request $request,$id)
    {
        // dd($request->all());
        $instruktur = Instruktur::findOrFail($id);
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'alamat' => 'required',
        ]);

        $instruktur->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'alamat' => $request->alamat,
            'jenis_kelamin' => $request->jenis_kelamin,
            'status' => $request->status,
        ]);
        return redirect()->route('instruktur.index')->with('success','data berhasil diupdate!!');

    }

    public function destroy($id)
    {
        $instruktur = Instruktur::findOrFail($id);
        $instruktur->delete();
        if($instruktur){
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
