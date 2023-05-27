<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Buku;
use Carbon\Carbon;

class BukuController extends Controller
{
    public function store(Request $request)
{
    // Check data
    $cek = Buku::where([
        'id_tamu' => $request->id,
        'tanggal' => Carbon::now()->toDateTimeString()
    ])->first();

    if ($cek) {
        return redirect('/')->with('gagal', 'Sudah terdaftar');
    }

    Buku::create([
        'id_tamu' => $request->id,
        'tanggal' => Carbon::now()->toDateTimeString()
    ]);

    return redirect('/')->with('success', 'Silahkan masuk');
}

}
