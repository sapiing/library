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
            <h4 class="mb-1 mt-3">Data Laporan</h4>
            <p class="text-muted">Data Lengkap Laporan Perpustakaan</p>
        </div>

    </div>

    {{-- <div class="row g-4 mb-4">
        <div class="col-sm-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-start justify-content-between">
                        <div class="content-left">
                            <span>Peminjaman</span>
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
        <div class="col-sm-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-start justify-content-between">
                        <div class="content-left">
                            <span>Sedang Meminjam</span>
                            <div class="d-flex align-items-end mt-2">
                                <h3 class="mb-0 me-2">
                                    {{-- {{$verified}} --}}
    {{-- 5000
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
        <div class="col-sm-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-start justify-content-between">
                        <div class="content-left">
                            <span>Duplicate Users</span>
                            <div class="d-flex align-items-end mt-2">
                                <h3 class="mb-0 me-2">
                                    {{-- {{$userDuplicates}} --}}
    {{-- 1233
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
        </div> --}}
    {{-- <div class="col-sm-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-start justify-content-between">
                        <div class="content-left">
                            <span>Verification Pending</span>
                            <div class="d-flex align-items-end mt-2">
                                <h3 class="mb-0 me-2">
                                    {{-- {{$notVerified}} --}}
    {{-- 69
                                </h3>
                                <small class="text-danger">(+6%)</small>
                            </div>
                            <small>Recent analytics</small>
                        </div>
                        <span class="badge bg-label-warning rounded p-2">
                            <i class="ti ti-user-circle ti-sm"></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <form action="{{ route('laporan') }}" method="GET">
        <div class="row g-4 mb-4 d-flex justify-content-center align-content-center">
            <div class="row g-4">
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body">
                            <label for="tanggal_awal">Tanggal Awal:</label>
                            <input type="date" name="tanggal_awal" id="tanggal_awal" class="form-control"
                                value="{{ $tanggalAwal }}">
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body">
                            <label for="tanggal_akhir">Tanggal Akhir:</label>
                            <input type="date" name="tanggal_akhir" id="tanggal_akhir" class="form-control"
                                value="{{ $tanggalAkhir }}">
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body">
                            <label for="status">Status:</label>
                            <select name="status" id="status" class="form-control">
                                <option value="">Semua</option>
                                <option value="pending" {{ $statusFilter == 'pending' ? 'selected' : '' }}>PENDING</option>
                                <option value="success" {{ $statusFilter == 'success' ? 'selected' : '' }}>SUCCESS</option>
                                <option value="due" {{ $statusFilter == 'due' ? 'selected' : '' }}>DUE</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 align-content-center">
                    <div class="card ">
                        <div class="card-body d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary me-2">Search</button>
                            <button type="reset" class="btn btn-warning"><a href="laporan" class="text-white">Reset</a></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>













    <!-- Users List Table -->
    <div class="card">
        {{-- <div class="card-header">
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
        </div> --}}


        <div class="card-datatable table-responsive" id="laporanTable">
            <table class="datatables-users table">
                <thead class="datatables-users table">
                    <tr>
                        <th>ID</th>
                        <th>Judul Buku</th>
                        <th>SKU</th>
                        <th>Peminjam</th>
                        <th>Petugas</th>
                        <th>Tanggal Pinjam</th>
                        <th>Dikembalikan</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($peminjaman as $rs)
                        <tr>
                            <td>{{ $rs->id }}</td>
                            <td>{{ $rs->buku->judul }}</td>
                            <td>{{ $rs->buku->sku }}</td>
                            <td>{{ $rs->anggota->nama }}</td>
                            <td>{{ $rs->petugas->nama }}</td>
                            <td>{{ \Carbon\Carbon::parse($rs->tanggal_pinjam)->format('d-m-Y') }}</td>
                            <td>{{ \Carbon\Carbon::parse($rs->tanggal_dikembalikan)->format('d-m-Y') }}</td>
                            <td>
                                @if ($rs->dikembalikan == 'true')
                                    <button id="success-{{ $rs->id }}" class="btn btn-success"
                                        readonly>SUCCESS</button>
                                @else
                                    @php
                                        $tanggalDikembalikan = Carbon\Carbon::parse($rs->tanggal_dikembalikan);
                                        $tanggalKembali = Carbon\Carbon::parse($rs->tanggal_kembali);
                                    @endphp
                                    <button
                                        id="{{ $tanggalDikembalikan->gt($tanggalKembali) ? 'due-' : 'pending-' }}{{ $rs->id }}"
                                        class="btn btn-{{ $tanggalDikembalikan->gt($tanggalKembali) ? 'danger' : 'warning' }}"
                                        readonly>
                                        {{ $tanggalDikembalikan->gt($tanggalKembali) ? 'DUE' : 'PENDING' }}
                                    </button>
                                @endif
                            </td>



                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <script>
        const statusFilter = document.getElementById('status');
        const laporanTable = document.getElementById('laporanTable');

        statusFilter.addEventListener('change', function() {
            const selectedStatus = this.value;
            const rows = laporanTable.querySelectorAll('tbody tr');

            rows.forEach(row => {
                const statusButton = row.querySelector('button');
                const buttonId = statusButton.id;

                if (selectedStatus === '' || buttonId.startsWith(selectedStatus)) {
                    row.style.display = ''; // Show row
                } else {
                    row.style.display = 'none'; // Hide row
                }
            });
        });
    </script>
@endsection
