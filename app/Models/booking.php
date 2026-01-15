<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class booking extends Model
{
    use HasFactory;
    protected $table = 'bookings';
    protected $fillable = [
        'nama',
        'workshop',
        'whatsapp',
        'email',
        'metode_pembayaran',
        'bukti_bayar',
        'status'
    ];
    public function user()
{
    return $this->belongsTo(User::class);
}

}

