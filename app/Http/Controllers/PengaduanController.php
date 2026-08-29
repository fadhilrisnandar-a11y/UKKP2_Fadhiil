<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use Illuminate\Http\Request;

class PengaduanController extends Controller
{
    public function index()
    {
        $user = auth()->user();

      
        if ($user->role === 'customer') {
            $pengaduans = Pengaduan::where('user_id', $user->id)
                ->latest()
                ->get();
        } else {
       
            $pengaduans = Pengaduan::latest()->get();
        }

        return view('pengaduan.index', compact('pengaduans'));
    }

    public function create()
    {
        return view('pengaduan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'kategori' => 'required|string|max:100',
            'isi_pengaduan' => 'required|string',
        ]);

        Pengaduan::create([
            'user_id' => auth()->id(),
            'judul' => $request->judul,
            'kategori' => $request->kategori,
            'isi_pengaduan' => $request->isi_pengaduan,
            'status' => 'menunggu',
        ]);

        return redirect()
            ->route('pengaduan.index')
            ->with('success', 'Pengaduan berhasil dikirim.');
    }

    public function show(Pengaduan $pengaduan)
    {
        return view('pengaduan.show', compact('pengaduan'));
    }

    public function edit(Pengaduan $pengaduan)
    {
        return view('pengaduan.edit', compact('pengaduan'));
    }

    public function update(Request $request, Pengaduan $pengaduan)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'kategori' => 'required|string|max:100',
            'isi_pengaduan' => 'required|string',
            'status' => 'required|in:menunggu,diproses,selesai,ditolak',
        ]);

        $pengaduan->update([
            'judul' => $request->judul,
            'kategori' => $request->kategori,
            'isi_pengaduan' => $request->isi_pengaduan,
            'status' => $request->status,
        ]);

        return redirect()
            ->route('pengaduan.index')
            ->with('success', 'Pengaduan berhasil diperbarui.');
    }

    public function destroy(Pengaduan $pengaduan)
    {
        $pengaduan->delete();

        return redirect()
            ->route('pengaduan.index')
            ->with('success', 'Pengaduan berhasil dihapus.');
    }
}