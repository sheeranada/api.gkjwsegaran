<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JadwalOrganis;
use App\Models\TeamMusic;
use Illuminate\Support\Facades\Validator;

class JadwalOrganisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jadwalOrganis = JadwalOrganis::latest()->get();
        return response()->json($jadwalOrganis, 200);
    }
    public function store(Request $request)
    {
        $idOrganis = $request->team_music_id;
        $nmOrganis = TeamMusic::where('id', $idOrganis)
            ->pluck('pemusik')
            ->first();

        $validator = Validator::make($request->all(), [
            'team_music_id' => 'required|min:3|string',
            'tanggal' => 'required|min:3|string',
            'jam' => 'required|min:3|string'
        ]);
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()
            ], 422);
        }
        $jadwalOrganis = new JadwalOrganis();
        $jadwalOrganis->team_music_id = $request->team_music_id;
        $jadwalOrganis->tanggal = $request->tanggal;
        $jadwalOrganis->jam = $request->jam;
        $jadwalOrganis->save();
        return response()->json([
            'message' => 'Jadwal Organis ' . $nmOrganis . ' ' . $jadwalOrganis->tanggal = $request->tanggal . ' berhasil disimpan!'
        ], 200);
    }
    public function show($id)
    {
        $validator = Validator::make(['id' => $id], [
            'id' => 'required|string|exists:jadwal_organis,id',
        ], [
                'exists' => 'Data dengan id ' . $id . ' tidak ditemukan.',
            ]);
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()
            ], 422);
        }
        $jadwalOrganis = JadwalOrganis::findOrFail($id);
        return response()->json($jadwalOrganis, 200);
    }
    public function update(Request $request, $id)
    {
        $idOrganis = $request->team_music_id;
        $nmOrganis = TeamMusic::where('id', $idOrganis)
            ->pluck('pemusik')
            ->first();

        $validator = Validator::make($request->all(), [
            'team_music_id' => 'required|min:3|string',
            'tanggal' => 'required|min:3|string',
            'jam' => 'required|min:3|string'
        ]);
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()
            ], 422);
        }
        $jadwalOrganis = JadwalOrganis::findOrFail($id);
        $jadwalOrganis->team_music_id = $request->team_music_id;
        $jadwalOrganis->tanggal = $request->tanggal;
        $jadwalOrganis->jam = $request->jam;
        $jadwalOrganis->save();
        return response()->json([
            'message' => 'Jadwal Organis ' . $nmOrganis . ' ' . $jadwalOrganis->tanggal = $request->tanggal . ' berhasil diupdate!'
        ], 200);
    }
    public function destroy($id)
    {
        $validator = Validator::make(['id' => $id], [
            'id' => 'required|string|exists:jadwal_organis,id',
        ], [
                'exists' => 'Gagal menghapus ! data dengan id ' . $id . ' tidak ditemukan.',
            ]);
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()
            ], 422);
        }
        $jadwalOrganis = JadwalOrganis::findOrFail($id);
        $jadwalOrganis->delete();
        return response()->json([
            'message' => 'Jadwal organis berhasil dihapus !'
        ], 200);
    }
}