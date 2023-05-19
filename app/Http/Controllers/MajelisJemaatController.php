<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MajelisJemaat;
use Illuminate\Support\Facades\Validator;

class MajelisJemaatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $majelisJemaat = MajelisJemaat::latest()->get();
        return response()->json($majelisJemaat, 200);
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required|min:3|string',
            'alamat' => 'required|min:3|string',
            'telp' => 'required|min:3|string',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()
            ], 422);
        }
        $majelisJemaat = new MajelisJemaat();
        $majelisJemaat->nama = $request->nama;
        $majelisJemaat->alamat = $request->alamat;
        $majelisJemaat->telp = $request->telp;
        $majelisJemaat->save();
        return response()->json([
            'message' => 'Data majelis jemaat ' . $majelisJemaat->nama . ' berhasil disimpan!'
        ], 200);
    }
    public function show($id)
    {
        $validator = Validator::make(['id' => $id], [
            'id' => 'required|string|exists:majelis_jemaat,id',
        ], [
                'exists' => 'Data dengan id ' . $id . ' tidak ditemukan.',
            ]);
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()
            ], 422);
        }
        $majelisJemaat = MajelisJemaat::findOrFail($id);
        return response()->json($majelisJemaat, 200);
    }
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required|min:3|string',
            'alamat' => 'required|min:3|string',
            'telp' => 'required|min:3|string',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()
            ], 422);
        }
        $majelisJemaat = MajelisJemaat::findOrFail($id);
        $majelisJemaat->nama = $request->nama;
        $majelisJemaat->alamat = $request->alamat;
        $majelisJemaat->telp = $request->telp;
        $majelisJemaat->save();

        return response()->json([
            'message' => 'Data majelis jemaat ' . $majelisJemaat->nama . ' berhasil diupdate!'
        ], 200);
    }
    public function destroy($id)
    {
        $validator = Validator::make(['id' => $id], [
            'id' => 'required|string|exists:majelis_jemaat,id',
        ], [
                'exists' => 'Gagal menghapus ! data dengan id ' . $id . ' tidak ditemukan.',
            ]);
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()
            ], 422);
        }
        $majelisJemaat = MajelisJemaat::findOrFail($id);
        $majelisJemaat->delete();
        return response()->json([
            'message' => 'Majelis jemaat berhasil dihapus !'
        ], 200);
    }
}