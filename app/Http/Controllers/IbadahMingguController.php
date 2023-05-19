<?php

namespace App\Http\Controllers;

use App\Models\IbadahMinggu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class IbadahMingguController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ibdMinggu = IbadahMinggu::latest()->get();
        return response()->json($ibdMinggu, 200);
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'tempat_ibadah_id' => 'required|min:3|string',
            'pagi_sore' => 'required|min:3|string',
            'minggu_ke' => 'required|min:1|string',
            'jam' => 'required|min:3|string',
            'bahasa' => 'required|min:3|string',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()
            ], 422);
        }
        $ibdMinggu = new IbadahMinggu();
        $ibdMinggu->tempat_ibadah_id = $request->tempat_ibadah_id;
        $ibdMinggu->pagi_sore = $request->pagi_sore;
        $ibdMinggu->minggu_ke = $request->minggu_ke;
        $ibdMinggu->jam = $request->jam;
        $ibdMinggu->bahasa = $request->bahasa;
        $ibdMinggu->save();
        return response()->json([
            'message' => 'Data ibadah minggu ' . $ibdMinggu->pagi_sore . ' berhasil disimpan !'
        ], 200);
    }
    public function show($id)
    {
        $validator = Validator::make(['id' => $id], [
            'id' => 'required|string|exists:ibadah_minggu,id',
        ], [
                'exists' => 'Data dengan id ' . $id . ' tidak ditemukan.',
            ]);
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()
            ], 422);
        }
        $ibdMinggu = IbadahMinggu::findOrFail($id);
        return response()->json($ibdMinggu, 200);
    }
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required|string|exists:ibadah_minggu,id',
            'tempat_ibadah_id' => 'required|min:3|string',
            'pagi_sore' => 'required|min:3|string',
            'minggu_ke' => 'required|min:1|string',
            'jam' => 'required|min:3|string',
            'bahasa' => 'required|min:3|string',
        ], [
                'id.exists' => 'Gagal update ! data dengan id ' . $id . ' tidak ditemukan.',
            ]);
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()
            ], 422);
        }
        $ibdMinggu = IbadahMinggu::findOrFail($id);
        $ibdMinggu->tempat_ibadah_id = $request->tempat_ibadah_id;
        $ibdMinggu->pagi_sore = $request->pagi_sore;
        $ibdMinggu->minggu_ke = $request->minggu_ke;
        $ibdMinggu->jam = $request->jam;
        $ibdMinggu->bahasa = $request->bahasa;
        $ibdMinggu->save();
        return response()->json([
            'message' => 'Ibadah ' . $ibdMinggu->pagi_sore . ' Berhasil diupdate !'
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $validator = Validator::make(['id' => $id], [
            'id' => 'required|string|exists:ibadah_minggu,id',
        ], [
                'exists' => 'Gagal menghapus ! data dengan id ' . $id . ' tidak ditemukan.',
            ]);
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()
            ], 422);
        }
        $ibdMinggu = IbadahMinggu::findOrFail($id);
        $ibdMinggu->delete();
        return response()->json([
            'message' => 'Ibadah minggu ' . $ibdMinggu->pagi_sore . ' Berhasil dihapus !'
        ], 200);
    }
}