<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Includes;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;

class IncludesController extends Controller
{
    public function index()
    {
        $includes = Includes::all();
        return view('pages.admin.includes.index',compact('includes'));
    }

    public function create()
    {
        return view('pages.admin.includes.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:materis',
        ]);

        Includes::create([
            'name' => $request->name
        ]);
        return redirect()->route('includes.index')->with('success','Data Berhasil ditambahkan!!');
    }

    public function edit($id)
    {
        $includes = Includes::find($id);
        return view('pages.admin.includes.edit',compact('includes'));
    }

    public function update(Request $request,$id)
    {
        $includes = Includes::findOrFail($id);
        $this->validate($request, [
            'name' => [
                        'required',
                        Rule::unique('includes')->ignore($includes->id, 'id'),
                    ],
        ]);

        $includes->update([
            'name' => $request->name
        ]);

        return redirect()->route('includes.index')->with('success','Data Berhasil diupdate !!');

    }

    public function destroy($id)
    {
        $includes = Includes::findOrFail($id);
        $includes->delete();

         if($includes){
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
