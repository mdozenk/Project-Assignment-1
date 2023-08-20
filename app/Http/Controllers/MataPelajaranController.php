<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MataPelajaran;

class MataPelajaranController extends Controller
{
    
    public function index()
    {
        $mataPelajaran = MataPelajaran::all();
        return response()->json($mataPelajaran);
    }

    public function show($id)
    {
        $mataPelajaran = MataPelajaran::find($id);
        return response()->json($mataPelajaran);
    }

    public function store(Request $request)
    {
        $mataPelajaran = new MataPelajaran;
        $mataPelajaran->nama_mata_pelajaran = $request->input('nama_mata_pelajaran');
        $mataPelajaran->save();
        return response()->json(['message' => 'Mata pelajaran created successfully']);
    }

    public function update(Request $request, $id)
    {
        $mataPelajaran = MataPelajaran::find($id);
        $mataPelajaran->nama_mata_pelajaran = $request->input('nama_mata_pelajaran');
        $mataPelajaran->save();
        return response()->json(['message' => 'Mata pelajaran updated successfully']);
    }
}
