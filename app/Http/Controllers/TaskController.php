<?php

namespace App\Http\Controllers;
use App\Models\Task;
use App\Models\Karyawan;

use Illuminate\Http\Request;

class TaskController extends Controller
{
    //
    public function index()
    {
        $tasks = Task::all();
        // dd($tasks);

        return view('task.index', compact('tasks'));
    }

    public function create()
    {
        $karyawans = Karyawan::all();
        return view('task.create', compact('karyawans'));
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'nama' => 'required|max:255|string',
            'deskripsi' => 'required|max:255|string',
            'tenggat_waktu' => 'required|date',
            'status' => 'required',
            'penugasan' => 'required',
        ]);
        Task::create($validateData);
        return redirect()->route('task.index')->with('success', 'Data Berhasil Ditambahkan');
    }
}