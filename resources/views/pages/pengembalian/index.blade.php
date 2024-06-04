@extends('layouts/layoutMaster')

@section('title', 'User Management - Crud App')

<!-- Vendor Styles -->
@section('vendor-style')
    @vite(['resources/assets/vendor/libs/datatables-bs5/datatables.bootstrap5.scss', 'resources/assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.scss', 'resources/assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.scss', 'resources/assets/vendor/libs/select2/select2.scss', 'resources/assets/vendor/libs/@form-validation/form-validation.scss', 'resources/assets/vendor/libs/animate-css/animate.scss', 'resources/assets/vendor/libs/sweetalert2/sweetalert2.scss'])
@endsection

<!-- Vendor Scripts -->
@section('vendor-script')
    @vite(['resources/assets/vendor/libs/moment/moment.js', 'resources/assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js', 'resources/assets/vendor/libs/select2/select2.js', 'resources/assets/vendor/libs/@form-validation/popular.js', 'resources/assets/vendor/libs/@form-validation/bootstrap5.js', 'resources/assets/vendor/libs/@form-validation/auto-focus.js', 'resources/assets/vendor/libs/cleavejs/cleave.js', 'resources/assets/vendor/libs/cleavejs/cleave-phone.js', 'resources/assets/vendor/libs/sweetalert2/sweetalert2.js'])
@endsection

<!-- Page Scripts -->
@section('page-script')
    @vite(['resources/js/laravel-user-management.js'])
@endsection


@section('content')

    <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-3">

        <div class="d-flex flex-column justify-content-center">
            <h4 class="mb-1 mt-3">Data Pengembalian</h4>
            <p class="text-muted">Data Lengkap Pengembalian</p>
        </div>

    </div>

    <div class="row g-4 mb-4">
        <div class="col-sm-6 col-xl-4">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-start justify-content-between">
                        <div class="content-left">
                            <span>Pengembalian</span>
                            <div class="d-flex align-items-end mt-2">
                                <h3 class="mb-0 me-2">
                                    {{ $totalPengembalian }}
                                </h3>
                                <small class="text-success">(100%)</small>
                            </div>
                            <small>Total Pengembalian</small>
                        </div>
                        <span class="badge bg-label-primary rounded p-2">
                            <i class="ti ti-user ti-sm"></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-4">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-start justify-content-between">
                        <div class="content-left">
                            <span>Total Pengembalian</span>
                            <div class="d-flex align-items-end mt-2">
                                <h3 class="mb-0 me-2">
                                    {{$totalPengembalian}}
                                </h3>
                                <small class="text-success">(+95%)</small>
                            </div>
                            <small>Recent analytics </small>
                        </div>
                        <span class="badge bg-label-success rounded p-2">
                            <i class="ti ti-user-check ti-sm"></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-4">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-start justify-content-between">
                        <div class="content-left">
                            <span>Top Pengembalian</span>
                            <div class="d-flex align-items-end mt-2">
                                <h3 class="mb-0 me-2">
                                    {{-- {{$topPeminjam}} --}}
                                    rafa
                                </h3>
                                <small class="text-success">(0%)</small>
                            </div>
                            <small>Recent analytics</small>
                        </div>
                        <span class="badge bg-label-danger rounded p-2">
                            <i class="ti ti-users ti-sm"></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>

    </div>


    <!-- Users List Table -->
    <div class="card">
      <div class="card-header">
        <div class="d-flex justify-content-between align-items-center">
            <div class="d-flex align-items-center w-100">
                <div class="mb-0 mb-lg-2 w-100">
                    <form action="{{ route('pengembalian.search') }}" method="GET">
                        <div class="input-group input-group-merge shadow-none">
                            <span class="input-group-text border-0 ps-0" id="peminjaman-search">
                                <i class="ti ti-search"></i>
                            </span>
                            <input type="text" class="form-control email-search-input border-0" name="query"
                                placeholder="Search peminjaman" aria-label="Search peminjaman"
                                aria-describedby="peminjaman-search">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
        <div class="card-datatable table-responsive">
            <table class="datatables-users table">
                <thead class="border-top">
                    <tr>
                        <td>ID</td>
                        <td>TANGGAL PINJAM</td>
                        <td>TANGGAL DIKEMBALIKAN</td>
                        <td>PEMINJAM</td>
                        <td>BUKU</td>
                        <td>STATUS</td>
                        <td>ACTION</td>
                    </tr>
                </thead>
                <tbody>
                <tbody class="">
                    @if ($pengembalian->count() > 0)
                        @foreach ($pengembalian as $rs)
                            <tr>

                                <td>{{ $rs->id }}</td>
                                <td>{{ \Carbon\Carbon::parse($rs->tanggal_pinjam)->format('d-m-Y') }}</td>
                                <td>{{ \Carbon\Carbon::parse($rs->tanggal_dikembalikan)->format('d-m-Y') }}</td>
                                <td>{{ $rs->anggota->nama }}</td>
                                <td>{{ $rs->buku->judul }}</td>
                                <td>
                                  @if ($rs->dikembalikan = 'true')
                                    <button class="btn btn-success">SUCCESS</button>
                                  @endif
                                </td>

                                <td>
                                    <div class="">
                                        <form action="{{ route('pengembalian.show', $rs->id) }}" style="display: inline;">
                                            <button type="submit" class="btn btn-primary">Detail</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="7" class="text-center">Data Petugas tidak ditemukan</td>
                        </tr>
                    @endif
                </tbody>
                </tbody>
            </table>
        </div>
    </div>
@endsection
