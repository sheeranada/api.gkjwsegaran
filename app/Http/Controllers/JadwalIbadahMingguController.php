<?php

namespace App\Http\Controllers;

use App\Models\IbadahMinggu;
use Illuminate\Http\Request;
use App\Models\JadwalIbadahMinggu;
use Illuminate\Support\Facades\Validator;

class JadwalIbadahMingguController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jadwalIbadahMinggu = JadwalIbadahMinggu::latest()->get();
        return response()->json($jadwalIbadahMinggu, 200);
    }
    public function store(Request $request)
    {
        $ibdMingguID = $request->ibadah_minggu_id;
        $ibdMinggu = IbadahMinggu::where('id', $ibdMingguID)
            ->pluck('pagi_sore')
            ->first();

        $validator = Validator::make($request->all(), [
            'ibadah_minggu_id' => 'required|string|min:3',
            'pelayan_id' => 'required|string|min:3',
            'stola_id' => 'required|string|min:3',
            'tempat_ibadah_id' => 'required|string|min:3',
            'organis_id' => 'required|string|min:3',
            'tanggal' => 'required|string|min:3',
            'tema_ibadah' => 'required|string|min:3',
            'bacaan1' => 'string',
            'bacaan2' => 'string',
            'bacaan3' => 'string',
            'pujian1' => 'string',
            'pujian2' => 'string',
            'pujian3' => 'string',
            'pujian4' => 'string',
            'pujian5' => 'string',
            'pujian6' => 'string',
            'pujian7' => 'string',
            'pujian8' => 'string',
            'pujian9' => 'string',
            'pujian10' => 'string',
            'pujian11' => 'string',
            'pujian12' => 'string',
            'pujian13' => 'string',
            'pujian14' => 'string',
            'pujian15' => 'string',
            'catatan' => 'string',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()
            ], 422);
        }
        $jadwalIbadahMinggu = new JadwalIbadahMinggu();
        $jadwalIbadahMinggu->ibadah_minggu_id = $request->ibadah_minggu_id;
        $jadwalIbadahMinggu->pelayan_id = $request->pelayan_id;
        $jadwalIbadahMinggu->stola_id = $request->stola_id;
        $jadwalIbadahMinggu->tempat_ibadah_id = $request->tempat_ibadah_id;
        $jadwalIbadahMinggu->organis_id = $request->organis_id;
        $jadwalIbadahMinggu->tanggal = $request->tanggal;
        $jadwalIbadahMinggu->tema_ibadah = $request->tema_ibadah;
        $jadwalIbadahMinggu->bacaan1 = $request->bacaan1;
        $jadwalIbadahMinggu->bacaan2 = $request->bacaan2;
        $jadwalIbadahMinggu->bacaan3 = $request->bacaan3;
        $jadwalIbadahMinggu->pujian1 = $request->pujian1;
        $jadwalIbadahMinggu->pujian2 = $request->pujian2;
        $jadwalIbadahMinggu->pujian3 = $request->pujian3;
        $jadwalIbadahMinggu->pujian4 = $request->pujian4;
        $jadwalIbadahMinggu->pujian5 = $request->pujian5;
        $jadwalIbadahMinggu->pujian6 = $request->pujian6;
        $jadwalIbadahMinggu->pujian7 = $request->pujian7;
        $jadwalIbadahMinggu->pujian8 = $request->pujian8;
        $jadwalIbadahMinggu->pujian9 = $request->pujian9;
        $jadwalIbadahMinggu->pujian10 = $request->pujian10;
        $jadwalIbadahMinggu->pujian11 = $request->pujian11;
        $jadwalIbadahMinggu->pujian12 = $request->pujian12;
        $jadwalIbadahMinggu->pujian13 = $request->pujian13;
        $jadwalIbadahMinggu->pujian14 = $request->pujian14;
        $jadwalIbadahMinggu->pujian15 = $request->pujian15;
        $jadwalIbadahMinggu->catatan = $request->catatan;
        $jadwalIbadahMinggu->save();

        return response()->json([
            'message' => 'Jadwal ibadah minggu ' . $ibdMinggu . ' ' . $jadwalIbadahMinggu->tanggal . ' berhasil disimpan'
        ], 200);
    }
    public function show($id)
    {
        $validator = Validator::make(['id' => $id], [
            'id' => 'required|string|exists:jadwal_ibadah_minggu,id',
        ], [
                'exists' => 'Data dengan id ' . $id . ' tidak ditemukan.',
            ]);
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()
            ], 422);
        }
        $jadwalIbadahMinggu = JadwalIbadahMinggu::findOrFail($id);
        return response()->json($jadwalIbadahMinggu, 200);
    }
    public function update(Request $request, $id)
    {
        $ibdMingguID = $request->ibadah_minggu_id;
        $ibdMinggu = IbadahMinggu::where('id', $ibdMingguID)
            ->pluck('pagi_sore')
            ->first();

        $validator = Validator::make($request->all(), [
            'ibadah_minggu_id' => 'required|string|min:3',
            'pelayan_id' => 'required|string|min:3',
            'stola_id' => 'required|string|min:3',
            'tempat_ibadah_id' => 'required|string|min:3',
            'organis_id' => 'required|string|min:3',
            'tanggal' => 'required|string|min:3',
            'tema_ibadah' => 'required|string|min:3',
            'bacaan1' => 'string',
            'bacaan2' => 'string',
            'bacaan3' => 'string',
            'pujian1' => 'string',
            'pujian2' => 'string',
            'pujian3' => 'string',
            'pujian4' => 'string',
            'pujian5' => 'string',
            'pujian6' => 'string',
            'pujian7' => 'string',
            'pujian8' => 'string',
            'pujian9' => 'string',
            'pujian10' => 'string',
            'pujian11' => 'string',
            'pujian12' => 'string',
            'pujian13' => 'string',
            'pujian14' => 'string',
            'pujian15' => 'string',
            'catatan' => 'string',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()
            ], 422);
        }
        $jadwalIbadahMinggu = JadwalIbadahMinggu::findOrFail($id);
        $jadwalIbadahMinggu->ibadah_minggu_id = $request->ibadah_minggu_id;
        $jadwalIbadahMinggu->pelayan_id = $request->pelayan_id;
        $jadwalIbadahMinggu->stola_id = $request->stola_id;
        $jadwalIbadahMinggu->tempat_ibadah_id = $request->tempat_ibadah_id;
        $jadwalIbadahMinggu->organis_id = $request->organis_id;
        $jadwalIbadahMinggu->tanggal = $request->tanggal;
        $jadwalIbadahMinggu->tema_ibadah = $request->tema_ibadah;
        $jadwalIbadahMinggu->bacaan1 = $request->bacaan1;
        $jadwalIbadahMinggu->bacaan2 = $request->bacaan2;
        $jadwalIbadahMinggu->bacaan3 = $request->bacaan3;
        $jadwalIbadahMinggu->pujian1 = $request->pujian1;
        $jadwalIbadahMinggu->pujian2 = $request->pujian2;
        $jadwalIbadahMinggu->pujian3 = $request->pujian3;
        $jadwalIbadahMinggu->pujian4 = $request->pujian4;
        $jadwalIbadahMinggu->pujian5 = $request->pujian5;
        $jadwalIbadahMinggu->pujian6 = $request->pujian6;
        $jadwalIbadahMinggu->pujian7 = $request->pujian7;
        $jadwalIbadahMinggu->pujian8 = $request->pujian8;
        $jadwalIbadahMinggu->pujian9 = $request->pujian9;
        $jadwalIbadahMinggu->pujian10 = $request->pujian10;
        $jadwalIbadahMinggu->pujian11 = $request->pujian11;
        $jadwalIbadahMinggu->pujian12 = $request->pujian12;
        $jadwalIbadahMinggu->pujian13 = $request->pujian13;
        $jadwalIbadahMinggu->pujian14 = $request->pujian14;
        $jadwalIbadahMinggu->pujian15 = $request->pujian15;
        $jadwalIbadahMinggu->catatan = $request->catatan;
        $jadwalIbadahMinggu->save();

        return response()->json([
            'message' => 'Jadwal ibadah minggu ' . $ibdMinggu . ' ' . $jadwalIbadahMinggu->tanggal . ' berhasil diupdate'
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $validator = Validator::make(['id' => $id], [
            'id' => 'required|string|exists:jadwal_ibadah_minggu,id',
        ], [
                'exists' => 'Gagal menghapus ! data dengan id ' . $id . ' tidak ditemukan.',
            ]);
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()
            ], 422);
        }
        $jadwalIbadahMinggu = JadwalIbadahMinggu::findOrFail($id);
        $jadwalIbadahMinggu->delete();
        return response()->json([
            'message' => 'Jadwal ibadah berhasil dihapus'
        ], 200);
    }
}