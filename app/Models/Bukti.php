<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bukti extends Model
{
    use HasFactory;
    protected $table = 'buktis';
    protected $primaryKey = 'id';

    protected $fillable = [
        'sewa_id',
        'buktiPembayaran',
    ];

    public function sewa(){
        return $this->belongsTo(Sewa::class);
    }
}
