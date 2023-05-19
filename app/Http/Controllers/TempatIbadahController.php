<?php

namespace App\Http\Controllers;

use App\Models\TempatIbadah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TempatIbadahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tempatIbadah = TempatIbadah::latest()->get();
        return response()->json($tempatIbadah, 200);
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_tempat' => 'required|string|min:3',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()
            ], 422);
        }
        $tempatIbadah = new TempatIbadah();
        $tempatIbadah->nama_tempat = $request->nama_tempat;
        $tempatIbadah->save();
        return response()->json([
            'message' => 'Data tempat ibadah ' . $tempatIbadah->nama_tempat . ' berhasil disimpan!'
        ], 200);
    }
    public function show($id)
    {
        $validator = Validator::make(['id' => $id], [
            'id' => 'required|string|exists:tempat_ibadah,id',
        ], [
                'exists' => 'Data dengan id ' . $id . ' tidak ditemukan.',
            ]);
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()
            ], 422);
        }
        $tempatIbadah = TempatIbadah::findOrFail($id);
        return response()->json($tempatIbadah, 200);
    }
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nama_tempat' => 'required|string|min:3',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()
            ], 422);
        }
        $tempatIbadah = TempatIbadah::findOrFail($id);
        $tempatIbadah->nama_tempat = $request->nama_tempat;
        $tempatIbadah->save();
        return response()->json([
            'message' => 'Data tempat ibadah ' . $tempatIbadah->nama_tempat . ' Berhasil diupdate !'
        ], 200);
    }
    public function destroy($id)
    {
        $validator = Validator::make(['id' => $id], [
            'id' => 'required|string|exists:tempat_ibadah,id',
        ], [
                'exists' => 'Gagal menghapus ! data dengan id ' . $id . ' tidak ditemukan.',
            ]);
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()
            ], 422);
        }
        $tempatIbadah = TempatIbadah::findOrFail($id);
        $tempatIbadah->delete();
        return response()->json([
            'message' => 'Data tempat ibadah ' . $tempatIbadah->nama_tempat . ' Berhasil dihapus !'
        ], 200);
    }
}