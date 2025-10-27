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

    public function edit(Task $task)
    {
        // $task = Task::find($id);
        $karyawans = Karyawan::all();
        return view('task.edit', compact('task', 'karyawans'));
    }

    public function update(Request $request, Task $task)
    {
        $validateData = $request->validate([
            'nama' => 'required|max:255|string',
            'deskripsi' => 'required|max:255|string',
            'tenggat_waktu' => 'required|date',
            'status' => 'required',
            'penugasan' => 'required',
        ]);
        $task->update($validateData);
        return redirect()->route('task.index')->with('success', 'Data Berhasil Diubah');
    }

    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('task.index')->with('success', 'Data Berhasil Dihapus');
    }

    public function selesai($id)
    {
        $task = Task::findOrFail($id);
        $task->status = 'selesai';
        $task->save();

        return redirect()->route('task.index')->with('success', 'Status tugas berhasil diubah menjadi selesai.');
    }

    public function pending($id)
    {
        $task = Task::findOrFail($id);
        $task->status = 'pending';
        $task->save();

        return redirect()->route('task.index')->with('success', 'Status tugas berhasil diubah menjadi pending.');
    }

    public function show(Task $task)
    {
        return view('task.show', compact('task'));
    }

}