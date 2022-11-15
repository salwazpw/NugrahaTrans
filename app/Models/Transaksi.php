<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;
    protected $table = 'transaksis';
    protected $primaryKey = 'id';

    protected $appends = [
        'jumlah',
    ];

    protected $fillable = [
        'id',
        'customer_id',
        'tanggalSewa',
        'tanggalAmbil',
        'tanggalKembali',
        'katalog_id',
        'harga',
        'totalPembayaran'
    ];

    public function getJumlahAttribute(){
        return \Carbon\Carbon::parse($this->tanggalAmbil)->diff(\Carbon\Carbon::parse($this->tanggalKembali))->format('%d hari');
    }

    public function customer(){
        return $this->belongsTo(Customer::class);
    }

    public function katalog(){
        return $this->belongsTo(Katalog::class);
    }
}
