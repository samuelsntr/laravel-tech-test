<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $data['title'] = 'Mahasiswa';
        $data['q'] = $request->get('q');
        $data['mahasiswas'] = Mahasiswa::where('nama', 'like', '%' . $data['q'] . '%')->get();
        return view('mahasiswa.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['title'] = 'Add Mahasiswa';
        return view('mahasiswa.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'nim' => 'required',
            'jurusan' => 'required',
        ]);

        $mahasiswa = new Mahasiswa($request->all());
        $mahasiswa->save();
        return redirect('mahasiswa')->with('success', 'Mahasiswa added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Mahasiswa $mahasiswa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Mahasiswa $mahasiswa)
    {
        $data['title'] = 'Edit Mahasiswa';
        $data['mahasiswa'] = $mahasiswa;
        return view('mahasiswa.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Mahasiswa $mahasiswa)
    {
        $request->validate([
            'nama' => 'required',
            'nim' => 'required',
            'jurusan' => 'required',
        ]);

        $mahasiswa->nama = $request->nama;
        $mahasiswa->nim = $request->nim;
        $mahasiswa->jurusan = $request->jurusan;
        $mahasiswa->save();
        return redirect('mahasiswa')->with('success', 'Mahasiswa updated succesfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mahasiswa $mahasiswa)
    {
        $mahasiswa->delete();
        return redirect('mahasiswa')->with('success', 'Mahasiswa deleted successfully');
    }
}
