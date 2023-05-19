<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WilayahPelayanan;
use Illuminate\Support\Facades\Validator;

class WilayahPelayanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $wilPel = WilayahPelayanan::latest()->get();
        return response()->json($wilPel, 200);
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'ketua_wilayah' => 'required|string|min:3',
            'nama_wilayah' => 'required|string|min:3',
            'area' => 'required|string|min:3',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()
            ], 422);
        }
        $wilPel = new WilayahPelayanan();
        $wilPel->ketua_wilayah = $request->ketua_wilayah;
        $wilPel->nama_wilayah = $request->nama_wilayah;
        $wilPel->area = $request->area;
        $wilPel->save();
        return response()->json([
            'message' => 'Data wilayah pelayanan ' . $wilPel->nama_wilayah . ' berhasil disimpan!'
        ], 200);
    }
    public function show($id)
    {
        $validator = Validator::make(['id' => $id], [
            'id' => 'required|string|exists:wilayah_pelayanan,id',
        ], [
                'exists' => 'Data dengan id ' . $id . ' tidak ditemukan.',
            ]);
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()
            ], 422);
        }
        $wilPel = WilayahPelayanan::findOrFail($id);
        return response()->json($wilPel, 200);
    }
    public function update(Request $request, $id)
    {

        $validator = Validator::make($request->all(), [
            'ketua_wilayah' => 'required|string|min:3',
            'nama_wilayah' => 'required|string|min:3',
            'area' => 'required|string|min:3',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()
            ], 422);
        }
        $wilPel = WilayahPelayanan::findOrFail($id);
        $wilPel->ketua_wilayah = $request->ketua_wilayah;
        $wilPel->nama_wilayah = $request->nama_wilayah;
        $wilPel->area = $request->area;
        $wilPel->save();
        return response()->json([
            'message' => 'Data wilayah pelayanan ' . $wilPel->nama_wilayah . ' berhasil diupdate!'
        ], 200);
    }
    public function destroy($id)
    {
        $validator = Validator::make(['id' => $id], [
            'id' => 'required|string|exists:wilayah_pelayanan,id',
        ], [
                'exists' => 'Gagal menghapus ! data dengan id ' . $id . ' tidak ditemukan.',
            ]);
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()
            ], 422);
        }
        $wilPel = WilayahPelayanan::findOrFail($id);
        $wilPel->delete();

        return response()->json([
            'message' => 'Data wilayah pelayanan ' . $wilPel->nama_wilayah . ' berhasil dihapus!'
        ], 200);
    }
}