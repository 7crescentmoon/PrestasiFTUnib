<?php

namespace App\Models;

use App\Models\Pengajuan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Prestasi extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];
    protected $primaryKey = 'id';
    // protected $with = ['user','pengajuan'];

    public function user (){
        return $this->belongsTo(User::class);
    }

    public function pengajuan (){
        return $this->belongsTo(Pengajuan::class);
    }

    protected static function booted(): void
    {
        static::created(function (Prestasi $prestasi) {
            Pengajuan::where('id',$prestasi->pengajuan_id)->update(['status' => true]);
        });
    }
}
