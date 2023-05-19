<?php

namespace App\Models;

use App\Traits\HasUUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalIbadahMingguAnak extends Model
{
    use HasFactory, HasUUID;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'jadwal_ibadah_minggu_anak';
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];
    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    public function ibadahMingguAnak()
    {
        return $this->belongsTo(IbadahMingguAnak::class, 'ibadah_anak_id');
    }
    public function teamMusic()
    {
        return $this->belongsTo(TeamMusic::class, 'team_music_id');
    }
}