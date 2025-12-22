<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    // Kolom yang boleh diisi
    protected $fillable = ['name', 'email', 'address', 'district_id', 'phone'];

    // Relasi ke Order (Satu pelanggan bisa punya banyak pesanan)
    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    // Relasi ke District (Kecamatan)
    public function district()
    {
        return $this->belongsTo(District::class);
    }
}