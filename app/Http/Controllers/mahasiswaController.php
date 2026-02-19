<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\mahasiswa;
use App\Models\prodi;

class mahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Mahasiswa';
        $slug = 'mahasiswa';
        $dataMhs = mahasiswa::join('prodi', 'mahasiswa.kd_prodi', '=', 'prodi.kd_prodi')
            ->get();
        return view('mahasiswa.index', compact('title', 'slug', 'dataMhs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Tambah Data Mahasiswa';
        $slug = 'mahasiswa';
        $dataProdi = prodi::all();
        return view('mahasiswa.create', compact('title', 'slug', 'dataProdi'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $result = mahasiswa::insert([
            'nim_mahasiswa' => $request->nim,
            'nama_mahasiswa' => $request->nama,
            'angkatan_mahasiswa' => $request->angkatan,
            'kd_prodi' => $request->prodi,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        if ($result) {
            return redirect('/mahasiswa');
        } else {
            return $this->create();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $title = 'Edit Data Mahasiswa';
        $slug = 'mahasiswa';
        $dataProdi = prodi::all();
        $dataMhs = mahasiswa::join('prodi', 'mahasiswa.kd_prodi', '=', 'prodi.kd_prodi')
            ->where('nim_mahasiswa', '=', $id)
            ->first();
        return view('mahasiswa.update', compact('title', 'slug', 'dataMhs', 'dataProdi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $id = $request->nim;
        mahasiswa::where('nim_mahasiswa', $id)
            ->update([
                'nama_mahasiswa' => $request->nama,
                'angkatan_mahasiswa' => $request->angkatan,
                'kd_prodi' => $request->prodi,
                'updated_at' => now(),
            ]);
        return redirect('/mahasiswa');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        mahasiswa::where('nim_mahasiswa', $id)
            ->delete();
        return redirect('/mahasiswa');
    }
}
