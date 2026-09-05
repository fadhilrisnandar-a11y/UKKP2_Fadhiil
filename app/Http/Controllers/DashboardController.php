<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Pengaduan;

class DashboardController extends Controller
{
    public function index()
    {
        // Total user
        $totalUser = User::count();

        // Total semua pengaduan
        $totalPengaduan = Pengaduan::count();

        // Status pengaduan
        $menunggu = Pengaduan::where('status', 'menunggu')->count();

        $diproses = Pengaduan::where('status', 'diproses')->count();

        $selesai = Pengaduan::where('status', 'selesai')->count();

        $ditolak = Pengaduan::where('status', 'ditolak')->count();

        // 5 pengaduan terbaru
        $pengaduanTerbaru = Pengaduan::with('user')
            ->latest()
            ->take(5)
            ->get();

        return view('dashboard', compact(
            'totalUser',
            'totalPengaduan',
            'menunggu',
            'diproses',
            'selesai',
            'ditolak',
            'pengaduanTerbaru'
        ));
    }
}
