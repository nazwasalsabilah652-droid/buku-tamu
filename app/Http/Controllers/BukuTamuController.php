<?php

namespace App\Http\Controllers;

use App\Models\BukuTamu;
use Illuminate\Http\Request;

class BukuTamuController extends Controller
{
    public function index()
    {
        $tamu = BukuTamu::latest()->get();
        return view('bukutamu.index', compact('tamu'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nama'  => 'required|string|max:100',
            'email' => 'required|email|max:100',
            'pesan' => 'required|string',
        ]);

        BukuTamu::create($data);

        return redirect()->route('bukutamu.index')
            ->with('success', 'Terima kasih, pesan kamu sudah tersimpan!');
    }
}