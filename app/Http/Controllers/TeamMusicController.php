<?php

namespace App\Http\Controllers;

use App\Models\TeamMusic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TeamMusicController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teamMusic = TeamMusic::latest()->get();
        return response()->json($teamMusic, 200);
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'pemusik' => 'required|string|min:3',
            'ppj1' => 'string|min:3',
            'ppj2' => 'string|min:3',
            'ppj3' => 'string|min:3',
            'ppj4' => 'string|min:3',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()
            ], 422);
        }
        $teamMusic = new TeamMusic();
        $teamMusic->pemusik = $request->pemusik;
        $teamMusic->ppj1 = $request->ppj1;
        $teamMusic->ppj2 = $request->ppj2;
        $teamMusic->ppj3 = $request->ppj3;
        $teamMusic->ppj4 = $request->ppj4;
        $teamMusic->save();
        return response()->json([
            'message' => 'Team music ' . $teamMusic->pemusik . ' berhasil disimpan!'
        ], 200);
    }
    public function show($id)
    {
        $validator = Validator::make(['id' => $id], [
            'id' => 'required|string|exists:team_music,id',
        ], [
                'exists' => 'Data dengan id ' . $id . ' tidak ditemukan.',
            ]);
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()
            ], 422);
        }
        $teamMusic = TeamMusic::findOrFail($id);
        return response()->json($teamMusic, 200);
    }
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'pemusik' => 'required|string|min:3',
            'ppj1' => 'string|min:3',
            'ppj2' => 'string|min:3',
            'ppj3' => 'string|min:3',
            'ppj4' => 'string|min:3',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()
            ], 422);
        }
        $teamMusic = TeamMusic::findOrFail($id);
        $teamMusic->pemusik = $request->pemusik;
        $teamMusic->ppj1 = $request->ppj1;
        $teamMusic->ppj2 = $request->ppj2;
        $teamMusic->ppj3 = $request->ppj3;
        $teamMusic->ppj4 = $request->ppj4;
        $teamMusic->save();
        return response()->json([
            'message' => 'Team music ' . $teamMusic->pemusik . ' berhasil diupdate!'
        ], 200);
    }
    public function destroy($id)
    {
        $validator = Validator::make(['id' => $id], [
            'id' => 'required|string|exists:team_music,id',
        ], [
                'exists' => 'Gagal menghapus ! data dengan id ' . $id . ' tidak ditemukan.',
            ]);
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()
            ], 422);
        }
        $teamMusic = TeamMusic::findOrFail($id);
        $teamMusic->delete();
        return response()->json([
            'message' => 'Team music ' . $teamMusic->pemusik . ' berhasil dihapus!'
        ], 200);
    }
}