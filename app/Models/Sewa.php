<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sewa extends Model
{
    use HasFactory; 
    protected $table = 'sewas';
    protected $primaryKey = 'id';

    protected $appends = [
        'statusbayar'
    ];

    protected $fillable = [
        'nik',
        'katalog_id',
        'tanggalSewa',
        'tanggalAmbil',
        'tanggalKembali',
        'hari',
        'harga',
        'status_pembayaran',
        'totalPembayaran'
    ];

    public function getStatusBayarAttribute(){
        $status_pembayaran = $this->status_pembayaran;

        if ($status_pembayaran == 'Lunas') {
              $badge = '<span class="badge badge-pill badge-success">Lunas</span>';
        } else {
            $badge = '<span class="badge badge-pill badge-primary">Belum Terbayar</span>';
        }

        return $badge;
    }

    public function katalog(){
        return $this->belongsTo(Katalog::class);
    }

    public function bukti(){
        return $this->hasMany(Bukti::class);
    }

}
