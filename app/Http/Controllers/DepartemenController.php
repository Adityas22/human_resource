<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Departemen;

class DepartemenController extends Controller
{
    public function index()
    {
        $departemens = Departemen::all();
        return view('departemen.index', compact('departemens'));
    }

    public function create()
    {
        return view('departemen.create');
    }

    public function store(Request $request)
    {
        //
    }

    public function edit(Departemen $departemen)
    {
        //
    }

    public function update(Request $request, Departemen $departemen)
    {
        //
    }

    public function destroy(Departemen $departemen)
    {
        //
    }

    public function show(Departemen $departemen)
    {
        //
    }

    public function aktif(Departemen $departemen)
    {
        //
    }

    public function nonaktif(Departemen $departemen)
    {
        //
    }
}