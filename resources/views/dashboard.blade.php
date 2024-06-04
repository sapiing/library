@extends('layouts/layoutMaster')

@section('title', 'Crm')

@section('vendor-style')
    @vite(['resources/assets/vendor/libs/apex-charts/apex-charts.scss'])
@endsection

@section('vendor-script')
    @vite(['resources/assets/vendor/libs/apex-charts/apexcharts.js'])
@endsection

@section('page-script')
    @vite(['resources/assets/js/dashboards-crm.js'])
@endsection

@section('content')
    <div class="row">

        <!-- Total Profit -->
        <div class="col-xl-3 col-md-4 col-6 mb-4">
            <div class="card">
                <div class="card-body">
                    <div class="badge p-2 bg-label-secondary mb-2 rounded"><i class="ti ti-users ti-md"></i></div>
                    <h5 class="card-title mb-1 pt-2">Total Anggota</h5>
                    <h2 class="mb-2 mt-1">{{ $totalAnggota }}</h2>
                    <small class="text-muted">Total keseluruhan anggota</small>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-4 col-6 mb-4">
            <div class="card">
                <div class="card-body">
                    <div class="badge p-2 bg-label-info mb-2 rounded"><i class="ti ti-books ti-md"></i></div>
                    <h5 class="card-title mb-1 pt-2">Total Buku</h5>
                    <h2 class="mb-2 mt-1">{{ $totalBuku }}</h2>
                    <small class="text-muted">Total keseluruhan buku</small>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-4 col-6 mb-4">
            <div class="card">
                <div class="card-body">
                    <div class="badge p-2 bg-label-success mb-2 rounded"><i class="ti ti-user-shield ti-md"></i></div>
                    <h5 class="card-title mb-1 pt-2">Total Petugas</h5>
                    <h2 class="mb-2 mt-1">{{ $totalPetugas }}</h2>
                    <small class="text-muted">Total Petugas</small>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-4 col-6 mb-4">
            <div class="card">
                <div class="card-body">
                    <div class="badge p-2 bg-label-success mb-2 rounded"><i class="ti ti-user ti-md"></i></div>
                    <h5 class="card-title mb-1 pt-2">Total User</h5>
                    <h2 class="mb-2 mt-1">{{ $totalUser }}</h2>
                    <small class="text-muted">Total User</small>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-4 col-6 mb-4">
            <div class="card">
                <div class="card-body">
                    <div class="badge p-2 bg-label-warning mb-2 rounded"><i class="ti ti-loader ti-md"></i></div>
                    <h5 class="card-title mb-1 pt-2">Transaksi Berjalan</h5>
                    <h2 class="mb-2 mt-1">{{ $totalPeminjamanBerjalan }}</h2>
                    <small class="text-muted">Total transaksi berjalan</small>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-4 col-6 mb-4">
            <div class="card">
                <div class="card-body">
                    <div class="badge p-2 bg-label-success mb-2 rounded"><i class="ti ti-checks ti-md"></i></div>
                    <h5 class="card-title mb-1 pt-2">Transaksi Selesai</h5>
                    <h2 class="mb-2 mt-1">{{ $totalPeminjamanSelesai }}</h2>
                    <small class="text-muted">Total transaksi selesai</small>
                </div>
            </div>
        </div>
        <div class="col-xl-6 col-md-4 col-6 mb-4">
            <div class="card">
                <div class="card-body">
                    <div class="badge p-2 bg-label-primary mb-2 rounded"><i class="ti ti-circle-triangle ti-md"></i></div>
                    <h5 class="card-title mb-1 pt-2">Total Transaksi</h5>
                    <h2 class="mb-2 mt-1">{{ $totalPeminjaman }}</h2>
                    <small class="text-muted">Total transaksi</small>
                </div>
            </div>
        </div>




    </div>
@endsection
