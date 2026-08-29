<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Pengaduan;

class DashboardController extends Controller
{
    public function index()
    {
        $totalUser = User::count();

        $totalPengaduan = Pengaduan::count();

        $menunggu = Pengaduan::where('status', 'menunggu')->count();

        $diproses = Pengaduan::where('status', 'diproses')->count();

        $selesai = Pengaduan::where('status', 'selesai')->count();

        return view('dashboard', compact(
            'totalUser',
            'totalPengaduan',
            'menunggu',
            'diproses',
            'selesai'
        ));
    }
}