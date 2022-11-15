<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Katalog extends Model
{
    use HasFactory;
    protected $table = 'katalogs';
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'id',
        'jenisKendaraan',
        'merk',
        'warna',
        'warna',
        'gambarKendaraan',
        'harga',
        'catatan'
    ];

    public function transaksi()
    {
    	return $this->hasMany(transaksi::class);
    }

}
