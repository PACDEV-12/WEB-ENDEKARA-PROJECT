<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact');
    }

    public function send(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required'
        ]);

        // Proses pengiriman pesan (misalnya kirim email)
        // Atau simpan ke database

        return redirect()->back()->with('success', 'Pesan berhasil dikirim');
    }
}