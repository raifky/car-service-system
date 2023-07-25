<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\aset;
class service extends Model
{
    use HasFactory, HasUuids;

    protected $guarded = [];
    // Protected $fillable = ['no', 'id', 'aset_id', 'nama_kegiatan', 'Tanggal_kegiatan', 'nama_bengkel', 'alamat_bengkel', 'kilometer_tiba', 'kilometer_balik', 'saran'];

    public function aset(){
        return $this->belongsTo(Aset::class);
    }
}
