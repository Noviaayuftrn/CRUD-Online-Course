<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Materi;

class MateriController extends Controller
{
    public function materi(Request $request)
    {
        $kursus_id = $request->input('kursus_id');
        $materis = Materi::where('kursus_id', $kursus_id)->get();
        return view('materi', compact('materis', 'kursus_id'));
    }

    public function create(Request $request)
    {
        $kursus_id = $request->input('kursus_id');
        return view('materi.create', compact('kursus_id'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'Judul' => 'required|string|max:255',
            'deskripsi' => 'required|string|max:255',
            'link_embed' => 'required|url',
            'kursus_id' => 'required|exists:kursuses,id',
        ]);

        Materi::create($validatedData);

        return redirect()->route('materi', ['kursus_id' => $request->kursus_id])->with('success', 'Materi Berhasil Ditambah.');
    }

    public function edit($id)
    {
        $materi = Materi::findOrFail($id);
        return view('materi.edit', compact('materi'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'Judul' => 'required|string|max:255',
            'deskripsi' => 'required|string|max:255',
            'link_embed' => 'required|url',
        ]);

        $materi = Materi::findOrFail($id);
        $materi->update($validatedData);

        return redirect()->route('materi', ['kursus_id' => $materi->kursus_id])->with('success', 'Materi Berhasil Diubah.');
    }

    public function destroy($id)
    {
        $materi = Materi::findOrFail($id);
        $kursus_id = $materi->kursus_id;
        $materi->delete();

        return redirect()->route('materi', ['kursus_id' => $kursus_id])->with('success', 'Materi Berhasil Dihapus.');
    }
}
