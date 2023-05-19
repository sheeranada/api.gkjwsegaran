<?php

namespace App\Models;

use App\Traits\HasUUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalIbadahMinggu extends Model
{
    use HasFactory, HasUUID;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'jadwal_ibadah_minggu';
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

    public function ibadahMinggu()
    {
        return $this->belongsTo(IbadahMinggu::class, 'ibadah_minggu_id');
    }
    public function majelisJemaat()
    {
        return $this->belongsTo(MajelisJemaat::class, 'pelayan_id');
    }
    public function stola()
    {
        return $this->belongsTo(Stola::class, 'stola_id');
    }
    public function tempatIbadah()
    {
        return $this->belongsTo(TempatIbadah::class, 'tempat_ibadah_id');
    }
    public function jadwalOrganis()
    {
        return $this->belongsTo(JadwalOrganis::class, 'organis_id');
    }
}