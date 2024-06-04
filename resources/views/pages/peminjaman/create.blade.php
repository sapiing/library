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
        <span class="text-muted fw-light"><a href="{{ route('peminjaman') }}">Peminjaman /</a></span><span class="fw-medium">
            Tambah
            Peminjaman</span>
    </h4>

    <div class="app-ecommerce">
        <form action="{{ route('peminjaman.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-3">

                <div class="d-flex flex-column justify-content-center">
                    <h4 class="mb-1 mt-3">Menambah Peminjaman</h4>
                    <p class="text-muted">Klik Tambah Untuk Menambah Peminjaman</p>
                </div>
                <div class="d-flex align-content-center flex-wrap gap-3">
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </div>

            </div>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif



            <div class="row">
                <div class="col-12 col-lg-8">
                    <div class="card mb-4">
                        <div class="card-header">
                            <h5 class="card-tile mb-0">Informasi Peminjaman</h5>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <div class="col">
                                    <label class="form-label" for="buku">Buku</label>
                                    <select class="select2 form-select" id="buku" name="id_buku" data-allow-clear="true">
                                        @foreach ($buku as $item)
                                            <option value="{{ $item->id }}">{{ $item->judul }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="tanggal">Tanggal Pinjam</label>
                                <input type="date" class="form-control" id="tanggal" name="tanggal_pinjam"
                                    aria-label="Tanggal Pinjam" value="<?php echo date('Y-m-d'); ?>" readonly>
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
                                <div class="col"><label class="form-label" for="petugas">Petugas</label>
                                    <input type="text" class="form-control" id="petugas" placeholder="Petugas"
                                        name="id_petugas" aria-label="Buku" value="{{ Auth::user()->name }}" readonly>
                                    <input type="hidden" name="id_petugas" value="{{ Auth::user()->id }}">
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="card mb-4">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Info Anggota</h5>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <div class="col">
                                    <label class="form-label" for="anggota">Anggota</label>
                                    <select class="select2 form-select" id="anggota" name="id_anggota" data-allow-clear="true">
                                        @foreach ($anggota as $item)
                                            <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

@endsection
