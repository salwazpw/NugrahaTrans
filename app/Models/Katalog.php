<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Katalog extends Model
{
    use HasFactory;
    protected $table = 'katalogs';
    protected $primaryKey = 'id';

    protected $appends = [
        'statuskatalog'
    ];

    protected $fillable = [
        'plat',
        'jenisKendaraan',
        'merk',
        'warna',
        'gambarKendaraan',
        'harga',
        'status',
        'informasi',
        'catatan'
    ];

    public function getStatusKatalogAttribute(){
        $status = $this->status;

        if ($status == 'Tersewa') {
              $badge = '<span class="badge badge-pill badge-success">Tersewa</span>';
        } else {
            $badge = '<span class="badge badge-pill badge-primary">Tersedia</span>';
        }

        return $badge;
    }

    public function transaksi()
    {
    	return $this->hasMany(transaksi::class);
    }

    public function sewa()
    {
    	return $this->hasMany(sewa::class);
    }

}
