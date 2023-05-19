<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\IbadahMingguAnak;
use Illuminate\Support\Facades\Validator;

class IbadahMingguAnakController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ibdMingguAnak = IbadahMingguAnak::latest()->get();
        return response()->json($ibdMingguAnak, 200);
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'tempat_ibadah_id' => 'required|string|min:2',
            'kelas' => 'required|string|min:2',
            'jam' => 'required|string|min:2',
            'bahasa' => 'required|string|min:2',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()
            ], 422);
        }
        $ibdMingguAnak = new IbadahMingguAnak();
        $ibdMingguAnak->tempat_ibadah_id = $request->tempat_ibadah_id;
        $ibdMingguAnak->kelas = $request->kelas;
        $ibdMingguAnak->jam = $request->jam;
        $ibdMingguAnak->bahasa = $request->bahasa;
        $ibdMingguAnak->save();
        return response()->json($ibdMingguAnak, 200);
    }
    public function show($id)
    {
        $validator = Validator::make(['id' => $id], [
            'id' => 'required|string|exists:ibadah_minggu_anak,id',
        ], [
                'exists' => 'Data dengan id ' . $id . ' tidak ditemukan.',
            ]);
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()
            ], 422);
        }
        $ibdMingguAnak = IbadahMingguAnak::findOrFail($id);
        return response()->json($ibdMingguAnak, 200);
    }
    public function update(Request $request, $id)
    {
        $validator = Validator::make(['id' => $id], [
            'id' => 'required|string|exists:ibadah_minggu_anak,id',
        ], [
                'exists' => 'Gagal update ! data dengan id ' . $id . ' tidak ditemukan.',
            ]);
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()
            ], 422);
        }
        $ibdMingguAnak = IbadahMingguAnak::findOrFail($id);
        $ibdMingguAnak->tempat_ibadah_id = $request->tempat_ibadah_id;
        $ibdMingguAnak->kelas = $request->kelas;
        $ibdMingguAnak->jam = $request->jam;
        $ibdMingguAnak->bahasa = $request->bahasa;
        $ibdMingguAnak->save();
        return response()->json([
            'message' => 'Ibadah ' . $ibdMingguAnak->kelas . ' Berhasil diupdate !'
        ], 200);
    }
    public function destroy($id)
    {
        $validator = Validator::make(['id' => $id], [
            'id' => 'required|string|exists:ibadah_minggu_anak,id',
        ], [
                'exists' => 'Gagal menghapus ! data dengan id ' . $id . ' tidak ditemukan.',
            ]);
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()
            ], 422);
        }
        $ibdMingguAnak = IbadahMingguAnak::findOrFail($id);
        $ibdMingguAnak->delete();
        return response()->json([
            'message' => 'Ibadah ' . $ibdMingguAnak->kelas . ' Berhasil dihapus !'
        ], 200);
    }
}