<?php

namespace App\Http\Controllers;

use App\Models\IbadahMingguAnak;
use Illuminate\Http\Request;
use App\Models\JadwalIbadahMingguAnak;
use Illuminate\Support\Facades\Validator;

class JadwalIbadahMingguAnakController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jadwalIbdMingguAnak = JadwalIbadahMingguAnak::latest()->get();
        return response()->json($jadwalIbdMingguAnak, 200);
    }
    public function store(Request $request)
    {
        $nmIbadah = $request->ibadah_anak_id;
        $ibdanak = IbadahMingguAnak::where('id', $nmIbadah)
            ->pluck('kelas')
            ->first();

        $validator = Validator::make($request->all(), [
            'ibadah_anak_id' => 'required|min:3|string',
            'team_music_id' => 'required|min:3|string',
            'tanggal' => 'required|min:3|string',
            'pelayan' => 'required|min:3|string',
            'tema_ibadah' => 'required|min:3|string',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()
            ], 422);
        }
        $jadwalIbdMingguAnak = new JadwalIbadahMingguAnak();
        $jadwalIbdMingguAnak->ibadah_anak_id = $request->ibadah_anak_id;
        $jadwalIbdMingguAnak->team_music_id = $request->team_music_id;
        $jadwalIbdMingguAnak->tanggal = $request->tanggal;
        $jadwalIbdMingguAnak->pelayan = $request->pelayan;
        $jadwalIbdMingguAnak->tema_ibadah = $request->tema_ibadah;
        $jadwalIbdMingguAnak->bacaan1 = $request->bacaan1;
        $jadwalIbdMingguAnak->bacaan2 = $request->bacaan2;
        $jadwalIbdMingguAnak->bacaan3 = $request->bacaan3;
        $jadwalIbdMingguAnak->save();
        return response()->json([
            'message' => 'Jadwal Ibadah ' . $ibdanak . ' berhasil disimpan'
        ], 200);
    }

    public function show($id)
    {
        $validator = Validator::make(['id' => $id], [
            'id' => 'required|string|exists:jadwal_ibadah_minggu_anak,id',
        ], [
                'exists' => 'Data dengan id ' . $id . ' tidak ditemukan.',
            ]);
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()
            ], 422);
        }
        $jadwalIbdMingguAnak = JadwalIbadahMingguAnak::findOrFail($id);
        return response()->json($jadwalIbdMingguAnak, 200);
    }
    public function update(Request $request, $id)
    {
        $nmIbadah = $request->ibadah_anak_id;
        $ibdanak = IbadahMingguAnak::where('id', $nmIbadah)
            ->pluck('kelas')
            ->first();

        $validator = Validator::make(['id' => $id], [
            'id' => 'required|string|exists:jadwal_ibadah_minggu_anak,id',
        ], [
                'exists' => 'Gagal update ! data dengan id ' . $id . ' tidak ditemukan.',
            ]);
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()
            ], 422);
        }
        $jadwalIbdMingguAnak = JadwalIbadahMingguAnak::findOrFail($id);
        $jadwalIbdMingguAnak->ibadah_anak_id = $request->ibadah_anak_id;
        $jadwalIbdMingguAnak->team_music_id = $request->team_music_id;
        $jadwalIbdMingguAnak->tanggal = $request->tanggal;
        $jadwalIbdMingguAnak->pelayan = $request->pelayan;
        $jadwalIbdMingguAnak->tema_ibadah = $request->tema_ibadah;
        $jadwalIbdMingguAnak->bacaan1 = $request->bacaan1;
        $jadwalIbdMingguAnak->bacaan2 = $request->bacaan2;
        $jadwalIbdMingguAnak->bacaan3 = $request->bacaan3;
        $jadwalIbdMingguAnak->save();
        return response()->json([
            'message' => 'Ibadah ' . $ibdanak . ' Berhasil diupdate !'
        ], 200);
    }
    public function destroy($id)
    {
        $validator = Validator::make(['id' => $id], [
            'id' => 'required|string|exists:jadwal_ibadah_minggu_anak,id',
        ], [
                'exists' => 'Gagal menghapus ! data dengan id ' . $id . ' tidak ditemukan.',
            ]);
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()
            ], 422);
        }
        $jadwalIbdMingguAnak = JadwalIbadahMingguAnak::findOrFail($id);
        $jadwalIbdMingguAnak->delete();

        return response()->json([
            'message' => 'Data berhasil dihapus !'
        ], 200);
    }
}