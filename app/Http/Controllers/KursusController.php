<?php

namespace App\Http\Controllers;

use App\Models\Kursus;
use Illuminate\Http\Request;

class KursusController extends Controller
{
    public function kursus()
    {
        $kursuses = Kursus::all();
        return view('kursus', compact('kursuses'));
    }

    public function create()
    {
        return view('kursuses.create');
    }

    public function store(Request $request)
    {
        Kursus::create([
            'Judul'=>$request['AddJudul'],
            'deskripsi'=>$request['Adddeskripsi'],
            'durasi'=>$request['Adddurasi'],
        ]);

        return redirect()->route('kursus')->with('success', 'Kursus Berhasil Dibuat.');
    }

    public function edit(Kursus $kursuses)
    {
        return view('kursus.edit', compact('kursuses'));
    }

    public function update(Request $request, Kursus $kursuses)
    {
   
        $kursuses->update([
            'Judul'=>$request['Judul'],
            'deskripsi'=>$request['deskripsi'],
            'durasi'=>$request['durasi'],
        ]);
        

        return redirect()->route('kursus')->with('success', 'Kursus Berhasil Diubah.');
    }

    public function destroy(Kursus $kursuses)
    {
        $kursuses->delete();

        return redirect()->route('kursus')->with('success', 'Kursus Berhasil Dihapus.');
    }
}
