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
        <span class="text-muted fw-light"><a href="{{ route('buku') }}">Buku /</a></span><span class="fw-medium"> Tambah
            Buku</span>
    </h4>

    <div class="app-ecommerce">
        <form action="{{ route('buku.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- Add Product -->
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-3">

                <div class="d-flex flex-column justify-content-center">
                    <h4 class="mb-1 mt-3">Menambah Buku</h4>
                    <p class="text-muted">Klik Tambah Untuk Menambah Buku</p>
                </div>
                <div class="d-flex align-content-center flex-wrap gap-3">
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </div>

            </div>


            <div class="row">

                <!-- First column-->

                <div class="col-12 col-lg-8">
                    <!-- Product Information -->
                    <div class="card mb-4">
                        <div class="card-header">
                            <h5 class="card-tile mb-0">Informasi Buku</h5>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label" for="judul">Judul</label>
                                <input type="text" class="form-control" id="judul"
                                    placeholder="Kisah Shaka yang Hampa" name="judul" aria-label="Judul Buku">
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="nama">SKU</label>
                                <input type="text" class="form-control" id="nama" placeholder="000122"
                                    name="sku" aria-label="SKU Buku">
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="nama">Pengarang</label>
                                <input type="text" class="form-control" id="nama" placeholder="Tere Liye"
                                    name="pengarang" aria-label="Pengarang Buku">
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="nama">Penerbit</label>
                                <input type="text" class="form-control" id="nama" placeholder="Gramedia"
                                    name="penerbit" aria-label="Penerbit Buku">
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="nama">Tahun Terbit</label>
                                <input type="date" class="form-control" id="nama" placeholder="Gramedia"
                                    name="tahun_terbit" aria-label="Tahun Terbit Buku">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Second column -->
                <div class="col-12 col-lg-4">
                    <!-- Pricing Card -->
                    <div class="card mb-4">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Gambar</h5>
                        </div>
                        <div class="card-body">
                            <!-- Base Price -->
                            <div class="mb-3">
                                <label class="form-label" for="gambar">Gambar Buku</label>
                                <input id="gambar" type="file" name="gambar" class="form-control" placeholder="foto">
                            </div>

                        </div>
                    </div>
                </div>
                <!-- /Second column -->
            </div>
        </form>
    </div>

@endsection
