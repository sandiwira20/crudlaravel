<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prodi;

class ProdiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Program Studi';
        $slug = 'prodi';
        $dataProdi = Prodi::all();
        return view('prodi.index', compact('title', 'slug', 'dataProdi'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Tambah Data Program Studi';
        $slug = 'prodi';
        return view('prodi.create', compact('title', 'slug'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $result = prodi::insert([
            'kd_prodi' => $request->kd_prodi,
            'nama_prodi' => $request->nama_prodi,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        if ($result) {
            return redirect('/prodi');
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
    public function edit(string $kd_prodi)
    {
        $title = 'Perbarui Program Studi';
        $slug = 'prodi';
        $dataProdi = Prodi::where('kd_prodi', $kd_prodi)->first();

        return view('prodi.edit', compact('title', 'slug', 'dataProdi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $kd_prodi)
    {
        $newKdProdi = $request->kd_prodi;

        prodi::where('kd_prodi', $kd_prodi)->update([
            'kd_prodi' => $newKdProdi,
            'nama_prodi' => $request->nama_prodi,
            'updated_at' => now(),
        ]);
        return redirect('/prodi');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $kd_prodi)
    {
        prodi::where('kd_prodi', $kd_prodi)->delete();
        return redirect('/prodi');
    }
}
