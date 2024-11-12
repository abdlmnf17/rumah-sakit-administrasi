<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RawatInap;
use Illuminate\Support\Facades\Auth;

class RawatInapController extends Controller
{
    public function index()
    {
        // Dapatkan role pengguna yang sedang login
        $role = auth()->user()->role;

        // Jika role adalah admin, ambil semua data RawatInap
        if ($role === 'admin') {
            $rawatInap = RawatInap::all();
        } else {
            // Jika bukan admin, ambil data hanya yang terkait dengan user_id
            $rawatInap = RawatInap::where('user_id', auth()->id())->get();
        }

        return view('rawat.index', compact('rawatInap'));
    }


    public function create()
    {
        return view('rawat.create');
    }

    public function store(Request $request)
    {
        // Validasi input form
        $request->validate([
            'nama_pasien' => 'required|string|max:255',
            'no_hp' => 'required|string|max:15',
            'alamat' => 'required|string',
            'pengajuan' => 'required|string',
            'keluhan' => 'required|string',
            'alasan' => 'required|string',
            'tanggal_masuk' => 'required|date',
            'tanggal_keluar' => 'nullable|date',
            'status' => 'nullable|string', // status bisa kosong
        ]);

        // Menetapkan status "belum diverifikasi" jika tidak ada status yang diberikan
        $status = $request->input('status', 'belum diverifikasi'); // Default status

        // Menyimpan data rawat inap dengan user_id dan status
        $rawatInap = new RawatInap($request->all());
        $rawatInap->status = $status;  // Set status menjadi "belum diverifikasi" atau nilai status dari input
        $rawatInap->user_id = auth()->id();  // Menambahkan user_id yang sedang login
        $rawatInap->save();

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('rawat.index')->with('success', 'Data pengajuan berhasil ditambahkan!');
    }




    public function show($id)
{
    // Ambil data rawat inap berdasarkan ID
    $rawatInap = RawatInap::findOrFail($id);

    // Kirim data ke view show.blade.php
    return view('rawat.show', compact('rawatInap'));
}

public function edit($id)
{
    // Ambil data rawat inap berdasarkan ID
    $rawatInap = RawatInap::findOrFail($id);

    // Kirim data ke view edit.blade.php
    return view('rawat.edit', compact('rawatInap'));
}

public function update(Request $request, $id)
{
    // Validasi status yang dikirim
    $request->validate([
        'status' => 'required|string|in:belum diverifikasi,selesai,ditolak,disetujui',
    ]);

    // Ambil data rawat inap berdasarkan ID
    $rawatInap = RawatInap::findOrFail($id);

    // Update status
    $rawatInap->status = $request->input('status');
    $rawatInap->save();

    // Redirect kembali ke halaman daftar dengan pesan sukses
    return redirect()->route('rawat.index')->with('success', 'Status pengajuan berhasil diperbarui!');
}
}
