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
        <span class="text-muted fw-light"><a href="{{ route('user') }}">User /</a></span><span class="fw-medium">Show</span>
    </h4>

    <div class="app-ecommerce">
        <form action="" method="" enctype="multipart/form-data">
            @csrf

            <!-- Add Product -->
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-3">

                <div class="d-flex flex-column justify-content-center">
                    <h4 class="mb-1 mt-3">Informasi User</h4>
                    <p class="text-muted">Informasi Lengkap User</p>
                </div>

            </div>


            <div class="row">
                <div class="col-12 col-lg-12">
                    <div class="card mb-4">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Informasi Petugas</h5>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <div class="col">
                                    <label class="form-label" for="idpengembalian">Nama Petugas</label>
                                    <input type="text" name="idpengembalian" class="form-control"
                                        value="{{ $user->petugas->nama }}" readonly>
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="col">
                                    <label class="form-label" for="idpengembalian">Alamat Petugas</label>
                                    <input type="text" name="idpengembalian" class="form-control"
                                        value="{{ $user->petugas->alamat }}" readonly>
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="col">
                                    <label class="form-label" for="idpengembalian">No.Telp Petugas</label>
                                    <input type="text" name="idpengembalian" class="form-control"
                                        value="{{ $user->petugas->nomor_telepon }}" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-4">
                        <div class="card-header">
                            <h5 class="card-tile mb-0">Informasi User</h5>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <div class="col">
                                    <label class="form-label" for="buku">E-mail</label>
                                    <input type="text" name="buku" class="form-control" value="{{ $user->email }}"
                                        readonly>
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="col">
                                    <label class="form-label" for="buku">Password</label>
                                    <input type="text" name="buku" class="form-control" value="{{ $user->password }}"
                                        readonly>
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="col">
                                    <label class="form-label" for="buku">Hak Akses</label>
                                    <input type="text" name="buku" class="form-control" value="{{ $user->hak_akses }}"
                                        readonly>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
        </form>
    </div>

@endsection
