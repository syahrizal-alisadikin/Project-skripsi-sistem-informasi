<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CustomerController extends Controller
{
    public function index()
    {
        $customer = User::all();
        return view('pages.admin.customer.index',compact('customer'));
    }
    
    public function create()
    {
        return view('pages.admin.customer.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            
            'name' => [
                        'required',
                        Rule::unique('users'),
                    ],
            'phone' => [
                        'required',
                        Rule::unique('users'),
                    ],
            'email' => [
                        'required',
                        Rule::unique('users'),
                    ],
            'password' => 'required|min:6|confirmed',
            'password_confirmation' => 'required',
        ],
        [
                    'password.confirmed' => 'Password Tidak sama!',
                ]);

        User::create([
                'name' => $request->name,
                'phone' => $request->phone,
                'email' => $request->email,
                'roles' => $request->roles,
                'tinggi_badan' => $request->tinggi_badan,
                'berat_badan' => $request->berat_badan,
                'umur' => $request->umur,
                'password' => Hash::make($request->password),
            ]);
        return redirect()->route('users.index')->with('success','Data Berhasil ditambahkan!!');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('pages.admin.customer.edit',compact('user'));
    }

    public function update(Request $request,$id)
    {
        $user = User::findOrFail($id);
        $this->validate($request, [
            'name' => [
                        'required',
                        Rule::unique('users')->ignore($user->id, 'id'),
                    ],
            'phone' => [
                        'required',
                        Rule::unique('users')->ignore($user->id, 'id'),
                    ],
            'email' => [
                        'required',
                        Rule::unique('users')->ignore($user->id, 'id'),
                    ],
        ]);

        if($request->password){
            $this->validate($request, [
            'password' => 'required|min:6|confirmed',
            'password_confirmation' => 'required',
            ],
                [
                    'password.confirmed' => 'Password Tidak sama!',
                ]);
            $user->update([
                'name' => $request->name,
                'phone' => $request->phone,
                'email' => $request->email,
                'roles' => $request->roles,
                'tinggi_badan' => $request->tinggi_badan,
                'berat_badan' => $request->berat_badan,
                'umur' => $request->umur,
                'password' => Hash::make($request->password),
            ]);
        }else{
            $user->update([
                'name' => $request->name,
                'phone' => $request->phone,
                'email' => $request->email,
                'roles' => $request->roles,
                'tinggi_badan' => $request->tinggi_badan,
                'berat_badan' => $request->berat_badan,
                'umur' => $request->umur,
            ]);

        }

        return redirect()->route('users.index')->with('success','Data Berhasil diupdate !!');

    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

         if($user){
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
