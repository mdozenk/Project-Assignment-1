<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kelas;

class KelasController extends Controller
{
    public function index()
    {
        $kelas = Kelas::all();
        return response()->json($kelas);
    }

    public function show($id)
    {
        $kelas = Kelas::with('murid')->find($id);
        return response()->json($kelas);
    }

    public function store(Request $request)
    {
        $kelas = new Kelas;
        $kelas->nama_kelas = $request->input('nama_kelas');
        $kelas->save();
        return response()->json(['message' => 'Kelas created successfully']);
    }

    public function update(Request $request, $id)
    {
        $kelas = Kelas::find($id);
        $kelas->nama_kelas = $request->input('nama_kelas');
        $kelas->save();
        return response()->json(['message' => 'Kelas updated successfully']);
    }
}
