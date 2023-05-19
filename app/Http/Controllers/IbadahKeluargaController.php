<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\IbadahKeluarga;
use App\Models\WilayahPelayanan;
use Illuminate\Support\Facades\Validator;

class IbadahKeluargaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ibadahKeluarga = IbadahKeluarga::latest()->get();
        return response()->json($ibadahKeluarga, 200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'wilayah_pelayanan_id' => 'required|string',
            'pelayan' => 'required|string',
            'tempat' => 'required|string',
            'jam' => 'required|string',
            'tanggal' => 'required|string',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()
            ], 422);
        }
        $ibadahKeluarga = new IbadahKeluarga();
        $ibadahKeluarga->wilayah_pelayanan_id = $request->wilayah_pelayanan_id;
        $ibadahKeluarga->pelayan = $request->pelayan;
        $ibadahKeluarga->tempat = $request->tempat;
        $ibadahKeluarga->jam = $request->jam;
        $ibadahKeluarga->tanggal = $request->tanggal;
        $ibadahKeluarga->save();
        return response()->json($ibadahKeluarga, 200);
    }
    public function show($id)
    {
        $validator = Validator::make(['id' => $id], [
            'id' => 'required|string|exists:ibadah_keluarga,id',
        ], [
                'exists' => 'Data dengan id ' . $id . ' tidak ditemukan.',
            ]);
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()
            ], 422);
        }
        $ibadahKeluarga = IbadahKeluarga::findOrFail($id);
        return response()->json($ibadahKeluarga, 200);
    }
    public function update(Request $request, $id)
    {
        $wilpel = $request->wilayah_pelayanan_id;
        $area = WilayahPelayanan::where('id', $wilpel)
            ->pluck('nama_wilayah')
            ->first();
        $validator = Validator::make(['id' => $id], [
            'id' => 'required|string|exists:ibadah_keluarga,id',
        ], [
                'exists' => 'Gagal update ! data dengan id ' . $id . ' tidak ditemukan.',
            ]);
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()
            ], 422);
        }
        $ibadahKeluarga = IbadahKeluarga::findOrFail($id);
        $ibadahKeluarga->wilayah_pelayanan_id = $request->wilayah_pelayanan_id;
        $ibadahKeluarga->pelayan = $request->pelayan;
        $ibadahKeluarga->tempat = $request->tempat;
        $ibadahKeluarga->jam = $request->jam;
        $ibadahKeluarga->tanggal = $request->tanggal;
        $ibadahKeluarga->save();
        // return $area;
        return response()->json([
            'message' => 'Ibadah keluarga' . $area . ' Berhasil diupdate !'
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $id)
    {
        $wilpel = $request->wilayah_pelayanan_id;
        $area = WilayahPelayanan::where('id', $wilpel)
            ->pluck('nama_wilayah')
            ->first();
        $validator = Validator::make(['id' => $id], [
            'id' => 'required|string|exists:ibadah_keluarga,id',
        ], [
                'exists' => 'Gagal menghapus ! data dengan id ' . $id . ' tidak ditemukan.',
            ]);
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()
            ], 422);
        }
        $ibadahKeluarga = IbadahKeluarga::findOrFail($id);
        $ibadahKeluarga->delete();
        return response()->json([
            'message' => 'Ibadah  ' . $area . ' Berhasil dihapus !'
        ], 200);
    }
}