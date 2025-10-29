<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Role;

class RoleController extends Controller
{
    //
    public function index()
    {
        $roles = Role::all();
        return view('role.index', compact('roles'));
    }

    public function create()
    {
        return view('role.create');
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'nama' => 'required|max:255|string',
            'deskripsi' => 'required|max:255|string',
        ]);
        Role::create($validateData);
        return redirect()->route('role.index')->with('success', 'Data Berhasil Ditambahkan');
    }

    public function edit(Role $role)
    {
        // return view('role.edit', compact('role'));
    }

    public function update(Request $request, Role $role)
    {
        // $validateData = $request->validate([
        //     'name' => 'required|max:255|string',
        //     'deskripsi' => 'required|max:255|string',
        // ]);
        // $role->update($validateData);
        // return redirect()->route('role.index')->with('success', 'Data Berhasil Diubah');
    }

    // public function show(Role $role)
    // {
    //     return view('role.show', compact('role'));
    // }

    public function destroy(Role $role)
    {
        $role->delete();
        // return redirect()->route('role.index')->with('success', 'Data Berhasil Dihapus');
    }
    
}