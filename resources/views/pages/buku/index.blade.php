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
            <h4 class="mb-1 mt-3">Tambah Buku</h4>
            <p class="text-muted">Tambahikan Buku Baru</p>
        </div>
        <div class="d-flex align-content-center flex-wrap gap-3">
            <button type="submit" onclick="window.location.href='{{ route('buku.create') }}'" class="btn btn-primary">Tambah
                Buku</button>
        </div>

    </div>

    <div class="row g-4 mb-4">
        <div class="col-sm-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-start justify-content-between">
                        <div class="content-left">
                            <span>Buku</span>
                            <div class="d-flex align-items-end mt-2">
                                <h3 class="mb-0 me-2">
                                    {{ $totalBuku }}
                                </h3>
                                <small class="text-success">(100%)</small>
                            </div>
                            <small>Total Buku</small>
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
                            <span>Sedang Dipinjam</span>
                            <div class="d-flex align-items-end mt-2">
                                <h3 class="mb-0 me-2">
                                    {{$bukuSedangDipinjam}}
                                </h3>
                                <small class="text-success">(+69%)</small>
                            </div>
                            <small>Buku sedang dipinjam </small>
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
                            <span>Buku Hilang</span>
                            <div class="d-flex align-items-end mt-2">
                                <h3 class="mb-0 me-2">
                                    {{$bukuHilang}}
                                </h3>
                                <small class="text-success">(0%)</small>
                            </div>
                            <small>Buku belum dikembalikan</small>
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
                            <span>Populer</span>
                            <div class="d-flex align-items-end mt-2">
                                <h3 class="mb-0 me-2">
                                    {{$bukuPopulerString}}
                                </h3>
                                <small class="text-danger">(+6%)</small>
                            </div>
                            <small>Buku paling keren</small>
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
                        <form action="{{ route('buku.search') }}" method="GET">
                            <div class="input-group input-group-merge shadow-none">
                                <span class="input-group-text border-0 ps-0" id="buku-search">
                                    <i class="ti ti-search"></i>
                                </span>
                                <input type="text" class="form-control email-search-input border-0" name="query"
                                    placeholder="Search Buku" aria-label="Buku Anggota" aria-describedby="buku-search">
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
                        <td>GAMBAR</td>
                        <td>JUDUL</td>
                        <td>SKU</td>
                        <td>ACTION</td>
                    </tr>
                </thead>
                <tbody>
                <tbody class="">
                    @if ($buku->count() > 0)
                        @foreach ($buku as $rs)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>
                                    <img src="{{ asset(Storage::disk('local')->url('public/photos/' . $rs->gambar)) }}"
                                        alt="{{ $rs->gambar }}'s Image" width="100px" height="100px"
                                        class="img-thumbnail">
                                </td>
                                <td>{{ $rs->judul }}</td>
                                <td>{{ $rs->sku }}</td>
                                <td>
                                    <div class="">
                                        <form action="{{ route('buku.edit', $rs->id) }}" style="display: inline;">
                                            <button type="submit" class="btn btn-warning">Edit</button>
                                        </form>

                                        <form action="{{ route('buku.destroy', $rs->id) }}" method="POST"
                                            style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"
                                                type="submit" class="btn btn-danger">Hapus</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="7" class="text-center">Data Buku tidak ditemukan</td>
                        </tr>
                    @endif
                </tbody>
                </tbody>
            </table>
        </div>
    </div>
@endsection
