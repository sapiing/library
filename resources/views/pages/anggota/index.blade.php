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
            <h4 class="mb-1 mt-3">Tambah Anggota</h4>
            <p class="text-muted">Tambahikan Anggota Baru</p>
        </div>
        <div class="d-flex align-content-center flex-wrap gap-3">
            <button type="submit" onclick="window.location.href='{{ route('anggota.create') }}'"
                class="btn btn-primary">Tambah Anggota</button>
        </div>

    </div>

    <div class="row g-4 mb-4">
        <div class="col-sm-6 col-xl-6">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-start justify-content-between">
                        <div class="content-left">
                            <span>Anggota</span>
                            <div class="d-flex align-items-end mt-2">
                                <h3 class="mb-0 me-2">
                                    {{ $totalAnggota }}
                                </h3>
                                <small class="text-success">(100%)</small>
                            </div>
                            <small>Total Anggota</small>
                        </div>
                        <span class="badge bg-label-primary rounded p-2">
                            <i class="ti ti-user ti-sm"></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-6">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-start justify-content-between">
                        <div class="content-left">
                            <span>Sedang Meminjam</span>
                            <div class="d-flex align-items-end mt-2">
                                <h3 class="mb-0 me-2">
                                    {{$anggotaSedangMeminjam}}
                                </h3>
                                <small class="text-success">(+95%)</small>
                            </div>
                            <small>Anggota Sedang Meminjam</small>
                        </div>
                        <span class="badge bg-label-success rounded p-2">
                            <i class="ti ti-user-check ti-sm"></i>
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
                        <form action="{{ route('anggota.search') }}" method="GET">
                            <div class="input-group input-group-merge shadow-none">
                                <span class="input-group-text border-0 ps-0" id="anggota-search">
                                    <i class="ti ti-search"></i>
                                </span>
                                <input type="text" class="form-control email-search-input border-0" name="query"
                                    placeholder="Search Anggota" aria-label="Search Anggota"
                                    aria-describedby="anggota-search">
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
                        <td>#</td>
                        <td>NAMA</td>
                        <td>NO. TELP</td>
                        <td>E-MAIL</td>
                        <td>ACTION</td>
                    </tr>
                </thead>
                <tbody>
                    @if ($anggota->count() > 0)
                        @foreach ($anggota as $rs)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $rs->nama }}</td>
                                <td>{{ $rs->nomor_telepon }}</td>
                                <td>{{ $rs->email }}</td>
                                <td>
                                    <div class="">
                                        <form action="{{ route('anggota.edit', $rs->id) }}" style="display: inline;">
                                            <button type="submit" class="btn btn-warning">Edit</button>
                                        </form>

                                        <form action="{{ route('anggota.destroy', $rs->id) }}" method="POST"
                                            style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger"
                                                onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="7" class="text-center">Data anggota tidak ditemukan</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection
