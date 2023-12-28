<?php

namespace App\Models;

use App\Models\Pengajuan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Prestasi extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];
    protected $primaryKey = 'id';
    // protected $with = ['user','pengajuan'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function pengajuan()
    {
        return $this->belongsTo(Pengajuan::class);
    }


    protected static function booted(): void
    {
        static::created(function (Prestasi $prestasi) {
            Pengajuan::where('id', $prestasi->pengajuan_id)->update(['status' => true]);
        });

        static::deleted(function (Prestasi $prestasi) {    
        $path1 = $prestasi->pengajuan->file_penghargaan;
        Storage::delete($path1); 
        $path2 = $prestasi->pengajuan->file_dokumentasi_kegiatan;
        $path3 = $prestasi->pengajuan->file_surat_tugas;
        if($prestasi->pengajuan->file_dokumentasi_kegiatan != null && $prestasi->pengajuan->file_surat_tugas != null){
            Storage::delete($path2);
            Storage::delete($path3);
        }
            Pengajuan::destroy($prestasi->pengajuan_id);
        });
    }
}
