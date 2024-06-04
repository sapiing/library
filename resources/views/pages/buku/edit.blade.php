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
        <span class="text-muted fw-light"><a href="{{ route('buku') }}">Buku /</a></span><span class="fw-medium">Edit
            Buku</span>
    </h4>

    <div class="app-ecommerce">
        <form action="{{ route('buku.update', $buku->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- Add Product -->
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-3">

                <div class="d-flex flex-column justify-content-center">
                    <h4 class="mb-1 mt-3">Edit Buku</h4>
                    <p class="text-muted">Klik Edit Untuk Edit Buku</p>
                </div>
                <div class="d-flex align-content-center flex-wrap gap-3">
                    <button type="submit" class="btn btn-primary">Simpan</button>
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
                                <input type="text" class="form-control" id="judul" placeholder="Judul Buku"
                                    name="judul" aria-label="Nama Judu;" value="{{ $buku->judul }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="sku">SKU</label>
                                <input type="text" class="form-control" id="sku" placeholder="SKU Buku"
                                    name="sku" aria-label="Nama Judu;" value="{{ $buku->sku }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="pengarang">Pengarang</label>
                                <input type="text" class="form-control" id="pengarang" placeholder="Pengarang Buku"
                                    name="pengarang" aria-label="Pengarang buku" value="{{ $buku->pengarang }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="penerbit">Penerbit</label>
                                <input type="text" class="form-control" id="penerbit" placeholder="Penerbit Buku"
                                    name="penerbit" aria-label="Penerbit Buku" value="{{ $buku->penerbit }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="tahun_terbit">Tahun Terbit</label>
                                <input type="text" class="form-control" id="tahun_terbit" placeholder="Tahun Terbit Buku"
                                    name="tahun_terbit" aria-label="Tahun Terbit Buku" value="{{ $buku->tahun_terbit }}">
                            </div>

                        </div>
                    </div>
                </div>
                <!-- /Second column -->

                <!-- Second column -->
                <div class="col-12 col-lg-4">
                    <!-- Pricing Card -->
                    <div class="card mb-4">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Gambar</h5>
                        </div>
                        <div class="card-body">
                            <!-- Base Price -->
                            <div class="mb-3">
                                <label class="form-label" for="gambar">Gambar</label>
                                <input type="number" class="form-control" id="gambar" placeholder="Gambarnya nanti"
                                    name="gambar" aria-label="Gambar" value="{{ $buku->buku }}">
                            </div>
                          </div>
                        </div>

                    </div>


                </div>

        </form>
    </div>

@endsection
