<?php

namespace App\Http\Controllers;

use App\Models\IbadahKategorial;
use Illuminate\Http\Request;
use App\Models\JadwalIbadahKategorial;
use Illuminate\Support\Facades\Validator;

class JadwalIbadahKategorialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jadwalIbdKategorial = JadwalIbadahKategorial::latest()->get();
        return response()->json($jadwalIbdKategorial, 200);
    }
    public function store(Request $request)
    {
        $ibdKategorial = $request->kategorial_id;
        $nmIbadah = IbadahKategorial::where('id', $ibdKategorial)
            ->pluck('nama_kategori')
            ->first();

        $validator = Validator::make($request->all(), [
            'kategorial_id' => 'required|min:1|string',
            'pelayan' => 'required|min:1|string',
            'tanggal' => 'required|min:1|string',
            'tema_ibadah' => 'required|min:1|string',
            'bacaan1' => 'required|min:1|string',
            'bacaan2' => 'required|min:1|string',
            'bacaan3' => 'required|min:1|string',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()
            ], 422);
        }
        $jadwalIbdKategorial = new JadwalIbadahKategorial();
        $jadwalIbdKategorial->kategorial_id = $request->kategorial_id;
        $jadwalIbdKategorial->pelayan = $request->pelayan;
        $jadwalIbdKategorial->tanggal = $request->tanggal;
        $jadwalIbdKategorial->tema_ibadah = $request->tema_ibadah;
        $jadwalIbdKategorial->bacaan1 = $request->bacaan1;
        $jadwalIbdKategorial->bacaan2 = $request->bacaan2;
        $jadwalIbdKategorial->bacaan3 = $request->bacaan3;
        $jadwalIbdKategorial->pujian1 = $request->pujian1;
        $jadwalIbdKategorial->pujian2 = $request->pujian2;
        $jadwalIbdKategorial->pujian3 = $request->pujian3;
        $jadwalIbdKategorial->pujian4 = $request->pujian4;
        $jadwalIbdKategorial->pujian5 = $request->pujian5;
        $jadwalIbdKategorial->pujian6 = $request->pujian6;
        $jadwalIbdKategorial->pujian7 = $request->pujian7;
        $jadwalIbdKategorial->pujian8 = $request->pujian8;
        $jadwalIbdKategorial->pujian9 = $request->pujian9;
        $jadwalIbdKategorial->pujian10 = $request->pujian10;
        $jadwalIbdKategorial->save();

        return response()->json([
            'message' => 'Jadwal ibadah ' . $nmIbadah . ' berhasil disimpan !'
        ], 200);
    }
    public function show($id)
    {
        $validator = Validator::make(['id' => $id], [
            'id' => 'required|string|exists:jadwal_ibadah_kategorial,id',
        ], [
                'exists' => 'Data dengan id ' . $id . ' tidak ditemukan.',
            ]);
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()
            ], 422);
        }
        $jadwalIbdKategorial = JadwalIbadahKategorial::findOrFail($id);
        return response()->json($jadwalIbdKategorial, 200);
    }
    public function update(Request $request, $id)
    {
        $ibdKategorial = $request->kategorial_id;
        $nmIbadah = IbadahKategorial::where('id', $ibdKategorial)
            ->pluck('nama_kategori')
            ->first();

        $validator = Validator::make(['id' => $id], [
            'id' => 'required|string|exists:jadwal_ibadah_kategorial,id',
        ], [
                'exists' => 'Gagal update ! data dengan id ' . $id . ' tidak ditemukan.',
            ]);
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()
            ], 422);
        }
        $jadwalIbdKategorial = JadwalIbadahKategorial::findOrFail($id);
        $jadwalIbdKategorial->kategorial_id = $request->kategorial_id;
        $jadwalIbdKategorial->pelayan = $request->pelayan;
        $jadwalIbdKategorial->tanggal = $request->tanggal;
        $jadwalIbdKategorial->tema_ibadah = $request->tema_ibadah;
        $jadwalIbdKategorial->bacaan1 = $request->bacaan1;
        $jadwalIbdKategorial->bacaan2 = $request->bacaan2;
        $jadwalIbdKategorial->bacaan3 = $request->bacaan3;
        $jadwalIbdKategorial->pujian1 = $request->pujian1;
        $jadwalIbdKategorial->pujian2 = $request->pujian2;
        $jadwalIbdKategorial->pujian3 = $request->pujian3;
        $jadwalIbdKategorial->pujian4 = $request->pujian4;
        $jadwalIbdKategorial->pujian5 = $request->pujian5;
        $jadwalIbdKategorial->pujian6 = $request->pujian6;
        $jadwalIbdKategorial->pujian7 = $request->pujian7;
        $jadwalIbdKategorial->pujian8 = $request->pujian8;
        $jadwalIbdKategorial->pujian9 = $request->pujian9;
        $jadwalIbdKategorial->pujian10 = $request->pujian10;
        $jadwalIbdKategorial->save();

        return response()->json([
            'message' => 'Ibadah ' . $nmIbadah . ' Berhasil diupdate !'
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $id)
    {
        $ibdKategorial = $request->kategorial_id;
        $nmIbadah = IbadahKategorial::where('id', $ibdKategorial)
            ->pluck('nama_kategori')
            ->first();

        $validator = Validator::make(['id' => $id], [
            'id' => 'required|string|exists:jadwal_ibadah_kategorial,id',
        ], [
                'exists' => 'Gagal menghapus ! data dengan id ' . $id . ' tidak ditemukan.',
            ]);
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()
            ], 422);
        }
        $jadwalIbdKategorial = JadwalIbadahKategorial::findOrFail($id);
        $jadwalIbdKategorial->delete();
        return response()->json([
            'message' => 'Ibadah ' . $nmIbadah . ' Berhasil dihapus !'
        ], 200);
    }
}