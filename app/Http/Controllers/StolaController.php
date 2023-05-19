<?php

namespace App\Http\Controllers;

use App\Models\Stola;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StolaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $stola = Stola::latest()->get();
        return response()->json($stola, 200);
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'warna_stola' => 'required|min:1|string',
            'catatan' => 'required|min:1|string',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()
            ], 422);
        }
        $stola = new Stola();
        $stola->warna_stola = $request->warna_stola;
        $stola->catatan = $request->catatan;
        $stola->save();
        return response()->json([
            'message' => 'Data stola berhasil disimpan!'
        ], 200);
    }
    public function show($id)
    {
        $validator = Validator::make(['id' => $id], [
            'id' => 'required|string|exists:stola,id',
        ], [
                'exists' => 'Data dengan id ' . $id . ' tidak ditemukan.',
            ]);
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()
            ], 422);
        }
        $variable = Stola::findOrFail($id);
        return response()->json($variable, 200);
    }
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'warna_stola' => 'required|min:1|string',
            'catatan' => 'required|min:1|string',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()
            ], 422);
        }
        $stola = Stola::findOrFail($id);
        $stola->warna_stola = $request->warna_stola;
        $stola->catatan = $request->catatan;
        $stola->save();

        return response()->json([
            'message' => 'Data stola berhasil diupdate!'
        ], 200);
    }
    public function destroy($id)
    {
        $validator = Validator::make(['id' => $id], [
            'id' => 'required|string|exists:stola,id',
        ], [
                'exists' => 'Gagal menghapus ! data dengan id ' . $id . ' tidak ditemukan.',
            ]);
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()
            ], 422);
        }
        $stola = Stola::findOrFail($id);
        $stola->delete();
        return response()->json([
            'message' => 'Data stola berhasil dihapus !'
        ], 200);
    }
}