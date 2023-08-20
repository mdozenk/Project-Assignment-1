<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Murid;

class MuridController extends Controller
{
    public function index()
    {
        $murid = Murid::all();
        return response()->json($murid);
    }

    public function show($id)
    {
        $murid = Murid::find($id);
        return response()->json($murid);
    }

    public function store(Request $request)
    {
        $murid = new Murid;
        $murid->nama_murid = $request->input('nama_murid');
        $murid->kelas_id = $request->input('kelas_id');
        $murid->save();
        return response()->json(['message' => 'Murid created successfully']);
    }

    public function update(Request $request, $id)
    {
        $murid = Murid::find($id);
        $murid->nama_murid = $request->input('nama_murid');
        $murid->kelas_id = $request->input('kelas_id');
        $murid->save();
        return response()->json(['message' => 'Murid updated successfully']);
    }
}
