<?php

namespace App\Http\Controllers;

use App\Models\IbadahKategorial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class IbadahKategorialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ibadahKategorial = IbadahKategorial::latest()->get();
        return response()->json($ibadahKategorial, 200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_kategori' => 'required',
            'hari' => 'required',
            'jam' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()
            ], 422);
        }
        $ibadahKategorial = new IbadahKategorial();
        $ibadahKategorial->nama_kategori = $request->nama_kategori;
        $ibadahKategorial->hari = $request->hari;
        $ibadahKategorial->jam = $request->jam;
        $ibadahKategorial->save();
        return response()->json([
            'message' => 'Ibadah ' . $ibadahKategorial->nama_kategori . ' Berhasil disimpan !'
        ], 200);
    }
    public function show($id)
    {
        $validator = Validator::make(['id' => $id], [
            'id' => 'required|string|exists:ibadah_kategorial,id',
        ], [
                'exists' => 'Data dengan id ' . $id . ' tidak ditemukan.',
            ]);
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()
            ], 422);
        }
        $ibadahKategorial = IbadahKategorial::findOrFail($id);
        return response()->json($ibadahKategorial, 200);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make(['id' => $id], [
            'id' => 'required|string|exists:ibadah_kategorial,id',
        ], [
                'exists' => 'Gagal update ! data dengan id ' . $id . ' tidak ditemukan.',
            ]);
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()
            ], 422);
        }
        $ibadahKategorial = IbadahKategorial::findOrFail($id);
        $ibadahKategorial->nama_kategori = $request->nama_kategori;
        $ibadahKategorial->hari = $request->hari;
        $ibadahKategorial->jam = $request->jam;
        $ibadahKategorial->save();
        return response()->json([
            'message' => 'Ibadah ' . $ibadahKategorial->nama_kategori . ' Berhasil diupdate !'
        ], 200);
    }
    public function destroy($id)
    {
        $validator = Validator::make(['id' => $id], [
            'id' => 'required|string|exists:ibadah_kategorial,id',
        ], [
                'exists' => 'Gagal menghapus ! data dengan id ' . $id . ' tidak ditemukan.',
            ]);
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()
            ], 422);
        }
        $ibadahKategorial = IbadahKategorial::findOrFail($id);
        $ibadahKategorial->delete();
        return response()->json([
            'message' => 'Ibadah ' . $ibadahKategorial->nama_kategori . ' Berhasil dihapus !'
        ], 200);
    }
}