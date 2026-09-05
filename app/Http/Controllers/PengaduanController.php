<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use App\Models\BalasanPengaduan;
use Illuminate\Http\Request;

class PengaduanController extends Controller
{
    /**
     * Menampilkan daftar pengaduan.
     */
    public function index()
    {
        $user = auth()->user();

        if ($user->role === 'customer') {
            // Customer hanya melihat pengaduannya sendiri
            $pengaduans = Pengaduan::where('user_id', $user->id)
                ->with('user')
                ->latest()
                ->get();
        } else {
            // Admin dan petugas melihat semua pengaduan
            $pengaduans = Pengaduan::with('user')
                ->latest()
                ->get();
        }

        return view('pengaduan.index', compact('pengaduans'));
    }

    /**
     * Menampilkan form untuk membuat pengaduan.
     */
    public function create()
    {
        // Hanya customer yang boleh membuat pengaduan
        if (auth()->user()->role !== 'customer') {
            abort(403);
        }

        return view('pengaduan.create');
    }

    /**
     * Menyimpan pengaduan baru.
     */
    public function store(Request $request)
    {
        // Hanya customer yang boleh membuat pengaduan
        if (auth()->user()->role !== 'customer') {
            abort(403);
        }

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

    /**
     * Menampilkan detail pengaduan.
     */
    public function show(Pengaduan $pengaduan)
    {
        // Customer hanya boleh melihat pengaduannya sendiri
        if (
            auth()->user()->role === 'customer' &&
            $pengaduan->user_id !== auth()->id()
        ) {
            abort(403);
        }

        // Load data user dan seluruh balasan beserta user yang membalas
        $pengaduan->load('user', 'balasan.user');

        return view('pengaduan.show', compact('pengaduan'));
    }

    /**
     * Menampilkan form edit pengaduan.
     */
    public function edit(Pengaduan $pengaduan)
    {
        // Hanya admin dan petugas yang boleh edit
        if (!in_array(auth()->user()->role, ['admin', 'petugas'])) {
            abort(403);
        }

        return view('pengaduan.edit', compact('pengaduan'));
    }

    /**
     * Mengubah data pengaduan.
     */
    public function update(Request $request, Pengaduan $pengaduan)
    {
        // Hanya admin dan petugas yang boleh mengubah
        if (!in_array(auth()->user()->role, ['admin', 'petugas'])) {
            abort(403);
        }

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

    /**
     * Menyimpan balasan dari petugas/admin.
     */
    public function balas(Request $request, Pengaduan $pengaduan)
    {
        // Hanya admin dan petugas yang boleh membalas
        if (!in_array(auth()->user()->role, ['admin', 'petugas'])) {
            abort(403);
        }

        $request->validate([
            'balasan' => 'required|string',
            'status' => 'required|in:menunggu,diproses,selesai,ditolak',
        ]);

        // Simpan balasan
        BalasanPengaduan::create([
            'pengaduan_id' => $pengaduan->id,
            'user_id' => auth()->id(),
            'balasan' => $request->balasan,
        ]);

        // Update status pengaduan
        $pengaduan->update([
            'status' => $request->status,
        ]);

        return redirect()
            ->route('pengaduan.show', $pengaduan)
            ->with('success', 'Balasan berhasil dikirim.');
    }

    /**
     * Menghapus pengaduan.
     */
    public function destroy(Pengaduan $pengaduan)
    {
        // Hanya admin yang boleh menghapus
        if (auth()->user()->role !== 'admin') {
            abort(403);
        }

        $pengaduan->delete();

        return redirect()
            ->route('pengaduan.index')
            ->with('success', 'Pengaduan berhasil dihapus.');
    }
}
