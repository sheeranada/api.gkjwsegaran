<?php

namespace App\Models;

use App\Traits\HasUUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeamMusic extends Model
{
    use HasFactory, HasUUID;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'team_music';
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

    public function jadwalIbadahMingguAnak()
    {
        return $this->hasMany(JadwalIbadahMingguAnak::class);
    }

    public function jadwalOrganis()
    {
        return $this->hasMany(JadwalOrganis::class);
    }
}