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

    public function user (){
        return $this->belongsTo(User::class);
    }

    public function pengajuan (){
        return $this->belongsToMany(Pengajuan::class);
    }

    protected static function booted(): void
    {
        static::created(function (Prestasi $prestasi) {
            Pengajuan::where('user_id',$prestasi->user_id)->update(['status' => 1]);
        });
    }
}
