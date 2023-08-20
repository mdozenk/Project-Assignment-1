<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nilai;
use App\Models\Murid;
use App\Models\MataPelajaran;

class NilaiController extends Controller
{
    public function showNilaiMurid($siswaId)
    {
        $siswa = Murid::with('nilai')->find($siswaId);
        return response()->json($siswa->nilai);
    }

    public function storeNilai(Request $request, $siswaId,$mataPelajaranId )
    {
        
        $siswa = Murid::find($siswaId);
        
        $mataPelajaran = MataPelajaran::find($mataPelajaranId);
        if (!$mataPelajaran) {
            return response()->json(['error' => 'Mata pelajaran not found'], 404);
        }
        
        $nilai = new Nilai;
        $nilai->murid_id = $siswaId;
        $nilai->mata_pelajaran_id = $mataPelajaranId;
        $nilai->latihan1 = $request->input('latihan1');
        $nilai->latihan2 = $request->input('latihan2');
        $nilai->latihan3 = $request->input('latihan3');
        $nilai->latihan4 = $request->input('latihan4');
        $nilai->ulangan1 = $request->input('ulangan1');
        $nilai->ulangan2 = $request->input('ulangan2');
        $nilai->uts = $request->input('uts');
        $nilai->uas = $request->input('uas');
        $nilai->save();
        
   
        $totalNilai = (
            0.15 * ($nilai->latihan1 + $nilai->latihan2 + $nilai->latihan3 + $nilai->latihan4) / 4 +
            0.20 * ($nilai->ulangan1 + $nilai->ulangan2) / 2 +
            0.25 * $nilai->uts +
            0.40 * $nilai->uas
        );
        $nilai->total_nilai = $totalNilai;
        $nilai->save();
        $siswa->total_nilai = $totalNilai;
        $siswa->save();

        return response()->json(['message' => 'Nilai added successfully']);
    }
}
