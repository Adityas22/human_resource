<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Karyawan;
use App\Models\Payroll;

class PayrollController extends Controller
{
    //
    public function index()
    {
        $payrolls = Payroll::all();
        $karyawans = Karyawan::all();
        return view('payroll.index', compact('payrolls', 'karyawans'));
    }

    public function create()
    {
        $karyawans = Karyawan::all();
        return view('payroll.create', compact('karyawans'));
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'karyawan_id' => 'required|max:255|string',
            'gaji' => 'required|numeric',
            'bonus' => 'required|numeric',
            'potongan' => 'required|numeric',
            'gaji_bersih' => 'required|numeric',
            'tgl_pembayaran' => 'required|date',
        ]);
        Payroll::create($validateData);
        return redirect()->route('payroll.index')->with('success', 'Data Berhasil Ditambahkan');
    }

    public function destroy(Payroll $payroll)
    {
        $payroll->delete();
        return redirect()->route('payroll.index')->with('success', 'Data Berhasil Dihapus');
    }

    public function edit(Payroll $payroll)
    {
        $karyawans = Karyawan::all();
        return view('payroll.edit', compact('payroll', 'karyawans'));
    }

    public function update(Request $request, Payroll $payroll)
    {
        $validateData = $request->validate([
            'karyawan_id' => 'required|max:255|string',
            'gaji' => 'required|numeric',
            'bonus' => 'required|numeric',
            'potongan' => 'required|numeric',
            'gaji_bersih' => 'required|numeric',
            'tgl_pembayaran' => 'required|date',
        ]);
        $payroll->update($validateData);
        return redirect()->route('payroll.index')->with('success', 'Data Berhasil Diubah');
    }

    public function show(Payroll $payroll)
    {
        return view('payroll.show', compact('payroll'));
    }
}