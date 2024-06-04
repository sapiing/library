@extends('layouts/layoutMaster')

@section('title', 'eCommerce Product Add - Apps')

@section('vendor-style')
    @vite(['resources/assets/vendor/libs/quill/typography.scss', 'resources/assets/vendor/libs/quill/katex.scss', 'resources/assets/vendor/libs/quill/editor.scss', 'resources/assets/vendor/libs/select2/select2.scss', 'resources/assets/vendor/libs/dropzone/dropzone.scss', 'resources/assets/vendor/libs/flatpickr/flatpickr.scss', 'resources/assets/vendor/libs/tagify/tagify.scss'])
@endsection

@section('vendor-script')
    @vite(['resources/assets/vendor/libs/quill/katex.js', 'resources/assets/vendor/libs/quill/quill.js', 'resources/assets/vendor/libs/select2/select2.js', 'resources/assets/vendor/libs/dropzone/dropzone.js', 'resources/assets/vendor/libs/jquery-repeater/jquery-repeater.js', 'resources/assets/vendor/libs/flatpickr/flatpickr.js', 'resources/assets/vendor/libs/tagify/tagify.js'])
@endsection

@section('page-script')
    @vite(['resources/assets/js/app-ecommerce-product-add.js'])
@endsection

@section('content')
    <h4 class="py-3 mb-0">
        <span class="text-muted fw-light"><a href="{{ route('petugas') }}">Petugas /</a></span><span
            class="fw-medium">Show</span>
    </h4>

    <div class="app-ecommerce">
        <form action="" method="" enctype="multipart/form-data">
            @csrf

            <!-- Add Product -->
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-3">

                <div class="d-flex flex-column justify-content-center">
                    <h4 class="mb-1 mt-3">Informasi Peminjaman</h4>
                    <p class="text-muted">Informasi Lengkap Peminjaman</p>
                </div>

            </div>


            <div class="row">
                <div class="col-12 col-lg-8">

                    <div class="card mb-4">
                        <div class="card-header">
                            <h5 class="card-title mb-0">ID Peminjaman</h5>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <div class="col">
                                    <label class="form-label" for="idpeminjaman">ID</label>
                                    <input type="text" name="idpeminjaman" class="form-control"
                                        value="{{ $peminjaman->id }}" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-4">
                        <div class="card-header">
                            <h5 class="card-tile mb-0">Informasi Buku</h5>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <div class="col">
                                    <label class="form-label" for="buku">Buku</label>
                                    <input type="text" name="buku" class="form-control"
                                        value="{{ $peminjaman->buku->judul }}" readonly>
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="col">
                                    <label class="form-label" for="buku">SKU</label>
                                    <input type="text" name="buku" class="form-control"
                                        value="{{ $peminjaman->buku->sku }}" readonly>
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="col">
                                    <label class="form-label" for="buku">Pengarang</label>
                                    <input type="text" name="buku" class="form-control"
                                        value="{{ $peminjaman->buku->pengarang }}" readonly>
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="col">
                                    <label class="form-label" for="buku">Penerbit</label>
                                    <input type="text" name="buku" class="form-control"
                                        value="{{ $peminjaman->buku->penerbit }}" readonly>
                                </div>
                            </div>

                            <div class="mb-3">
                                <div class="col">
                                    <label class="form-label" for="buku">Tahun Terbit</label>
                                    <input type="date" name="buku" class="form-control"
                                        value="{{ $peminjaman->buku->tahun_terbit }}" readonly>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card mb-4">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Info Peminjam</h5>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <div class="col">
                                    <label class="form-label" for="namaanggota">Nama Peminjam</label>
                                    <input type="text" name="namaanggota" class="form-control"
                                        value="{{ $peminjaman->anggota->nama }}" readonly>
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="col">
                                    <label class="form-label" for="alamatanggota">Alamat Peminjam</label>
                                    <input type="text" name="alamatanggota" class="form-control"
                                        value="{{ $peminjaman->anggota->alamat }}" readonly>
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="col">
                                    <label class="form-label" for="emailanggota">E-mail Peminjam</label>
                                    <input type="text" name="emailanggota" class="form-control"
                                        value="{{ $peminjaman->anggota->email }}" readonly>
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="col">
                                    <label class="form-label" for="nomor_telepon">No. Telepon Peminjam</label>
                                    <input type="text" name="nomor_telepon" class="form-control"
                                        value="{{ $peminjaman->anggota->nomor_telepon }}" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-4">
                    <!-- Pricing Card -->
                    <div class="card mb-4">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Info Petugas</h5>
                        </div>
                        <div class="card-body">

                            <div class="mb-3">
                                <div class="col">
                                    <label class="form-label" for="namapetugas">Nama Petugas</label>
                                    <input type="text" name="namapetugas" class="form-control"
                                        value="{{ $peminjaman->petugas->nama }}" readonly>
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="col">
                                    <label class="form-label" for="alamatpetugas">Alamat Petugas</label>
                                    <input type="text" name="alamatpetugas" class="form-control"
                                        value="{{ $peminjaman->petugas->alamat }}" readonly>
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="col">
                                    <label class="form-label" for="alamatpetugas">Nomor Telepon Petugas</label>
                                    <input type="text" name="alamatpetugas" class="form-control"
                                        value="{{ $peminjaman->petugas->nomor_telepon }}" readonly>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

@endsection
