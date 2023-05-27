<?php

namespace App\Models;

use App\Models\Tamu;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function tamu()
    {
        return $this->hasOne(Tamu::class, 'kode' , 'id_tamu');
    }
}
