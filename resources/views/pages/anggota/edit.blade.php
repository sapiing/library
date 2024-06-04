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
        <span class="text-muted fw-light"><a href="{{ route('anggota') }}">Anggota /</a></span><span class="fw-medium">Edit
            Anggota</span>
    </h4>

    <div class="app-ecommerce">
        <form action="{{ route('anggota.update', $anggota->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- Add Product -->
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-3">

                <div class="d-flex flex-column justify-content-center">
                    <h4 class="mb-1 mt-3">Edit Anggota</h4>
                    <p class="text-muted">Klik Edit Untuk Edit Anggota</p>
                </div>
                <div class="d-flex align-content-center flex-wrap gap-3">
                    <button type="submit" class="btn btn-primary">Edit</button>
                </div>

            </div>


            <div class="row">

                <!-- First column-->

                <div class="col-12 col-lg-8">
                    <!-- Product Information -->
                    <div class="card mb-4">
                        <div class="card-header">
                            <h5 class="card-tile mb-0">Informasi Anggota</h5>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label" for="nama">Nama</label>
                                <input type="text" class="form-control" id="nama" placeholder="John Die"
                                    name="nama" aria-label="Nama Anggota" value="{{ $anggota->nama }}">
                            </div>
                            <div class="mb-3">
                                <div class="col"><label class="form-label" for="alamat">Alamat</label>
                                    <input type="text" class="form-control" id="alamat"
                                        placeholder="Jl. Siliwangi No. 69" name="alamat" aria-label="Alamat Anggota"
                                        value="{{ $anggota->alamat }}">
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="col"><label class="form-label" for="email">E-mail</label>
                                    <input type="text" class="form-control" id="email" placeholder="email@gmail.com"
                                        name="email" aria-label="Email Anggota" value="{{ $anggota->email }}">
                                </div>
                            </div>

                        </div>
                    </div>

                </div>

                <div class="col-12 col-lg-4">
                    <!-- Pricing Card -->
                    <div class="card mb-4">
                        <div class="card-header">
                            <h5 class="card-title mb-0">No. Telepon</h5>
                        </div>
                        <div class="card-body">
                            <!-- Base Price -->
                            <div class="mb-3">
                                <label class="form-label" for="no_telepon">No. Telepon</label>
                                <input type="number" class="form-control" id="no_telepon" placeholder="+62 1234 5678 910"
                                    name="nomor_telepon" aria-label="Nomor Telepon" value="{{ $anggota->nomor_telepon }}">
                            </div>

                        </div>
                    </div>

                </div>
                <!-- /Second column -->
            </div>
        </form>
    </div>

@endsection
