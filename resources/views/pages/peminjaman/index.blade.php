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
            <h4 class="mb-1 mt-3">Tambah Peminjaman</h4>
            <p class="text-muted">Tambahikan Peminjaman Baru</p>
        </div>
        <div class="d-flex align-content-center flex-wrap gap-3">
            <button type="submit" onclick="window.location.href='{{ route('peminjaman.create') }}'"
                class="btn btn-primary">Tambah Peminjaman</button>
        </div>

    </div>

    <div class="row g-4 mb-4">
        <div class="col-sm-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-start justify-content-between">
                        <div class="content-left">
                            <span>Peminjaman</span>
                            <div class="d-flex align-items-end mt-2">
                                <h3 class="mb-0 me-2">
                                    {{ $totalPeminjaman }}
                                </h3>
                                <small class="text-success">(100%)</small>
                            </div>
                            <small>Total Peminjaman</small>
                        </div>
                        <span class="badge bg-label-primary rounded p-2">
                            <i class="ti ti-user ti-sm"></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-start justify-content-between">
                        <div class="content-left">
                            <span>Transaksi Berhasil</span>
                            <div class="d-flex align-items-end mt-2">
                                <h3 class="mb-0 me-2">
                                  {{$transaksiBerhasil}}
                                </h3>
                                <small class="text-success">(+95%)</small>
                            </div>
                            <small>Total transaksi berhasil</small>
                        </div>
                        <span class="badge bg-label-success rounded p-2">
                            <i class="ti ti-user-check ti-sm"></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-start justify-content-between">
                        <div class="content-left">
                            <span>Transaksi Berjalan</span>
                            <div class="d-flex align-items-end mt-2">
                                <h3 class="mb-0 me-2">
                                    {{$totalBerjalan}}
                                </h3>
                                <small class="text-success">(0%)</small>
                            </div>
                            <small>Transaksi sedang berjalan</small>
                        </div>
                        <span class="badge bg-label-danger rounded p-2">
                            <i class="ti ti-users ti-sm"></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-start justify-content-between">
                        <div class="content-left">
                            <span>Total Transaksi</span>
                            <div class="d-flex align-items-end mt-2">
                                <h3 class="mb-0 me-2">
                                    {{$totalTransaksi}}
                                </h3>
                                <small class="text-danger">(+6%)</small>
                            </div>
                            <small>Keseluruhan Transaksi</small>
                        </div>
                        <span class="badge bg-label-warning rounded p-2">
                            <i class="ti ti-user-circle ti-sm"></i>
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
                        <form action="{{ route('peminjaman.search') }}" method="GET">
                            <div class="input-group input-group-merge shadow-none">
                                <span class="input-group-text border-0 ps-0" id="peminjaman-search">
                                    <i class="ti ti-search"></i>
                                </span>
                                <input type="text" class="form-control email-search-input border-0" name="query"
                                    placeholder="Search Peminjaman" aria-label="Search peminjaman"
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
                        <td>TANGGAL</td>
                        <td>BATAS</td>
                        <td>PEMINJAM</td>
                        <td>BUKU</td>
                        <td>STATUS</td>
                        <td>ACTION</td>
                    </tr>
                </thead>
                <tbody>
                <tbody class="">
                    @if ($peminjaman->count() > 0)
                        @foreach ($peminjaman as $rs)
                            <tr>

                                <td>{{ $rs->id }}</td>
                                <td>{{ \Carbon\Carbon::parse($rs->tanggal_pinjam)->format('d-m-Y') }}</td>
                                <td>{{ \Carbon\Carbon::parse($rs->tanggal_kembali)->format('d-m-Y') }}</td>
                                <td>{{ $rs->anggota->nama }}</td>
                                <td>{{ $rs->buku->judul }}</td>
                                <td>
                                  @if ($rs->dikembalikan == 'true')
                                      <button class="btn btn-success" readonly>SUCCESS</button>
                                  @else
                                      <form action="{{ route('peminjaman.update', $rs->id) }}" method="POST">
                                          @csrf
                                          @method('POST')
                                          <button type="submit" class="btn btn-{{ $rs->telat == 'true' ? 'danger' : 'warning' }}" onclick="return confirm('Apakah Anda yakin ingin mengubah status peminjaman ini?')">
                                              {{ $rs->telat == 'true' ? 'DUE' : 'PENDING' }}
                                          </button>
                                      </form>
                                  @endif
                              </td>


                                {{-- <td>
                                  <button class="btn btn-success">{{ $rs->dikembalikan }}</button>
                                </td> --}}

                                <td>
                                    <div class="">
                                        <form action="{{ route('peminjaman.show', $rs->id) }}" style="display: inline;">
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
