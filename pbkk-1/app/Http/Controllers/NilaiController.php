<?php

namespace App\Http\Controllers;

use App\Models\Nilai;
use Illuminate\Http\Request;

class NilaiController extends Controller
{
    public function store(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'user_id' => 'required|exists:users,id',
            'paket_soal_id' => 'required|exists:paket_soal,id',
            'nilai' => 'required|integer',
        ]);
        dd($request);
        // Create a new grade entry
        $nilais = Nilai::create($validatedData);

        return response()->json(['message' => 'Nilai berhasil dimasukkan', 'nilais' => $nilais], 201);
    }

    public function update(Request $request, Nilai $grade)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'nilais' => 'required|integer',
        ]);

        // Update the grade entry
        $nilais->update($validatedData);

        return response()->json(['message' => 'Nilai berhasil diupdate', 'nilais' => $nilais], 200);
    }

    public function destroy(Grade $grade)
    {
        // Delete the grade entry
        $nilais->delete();

        return response()->json(['message' => 'Nilai berhasil dihapus'], 200);
    }

}
