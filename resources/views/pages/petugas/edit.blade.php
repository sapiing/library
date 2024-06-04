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
        <span class="text-muted fw-light"><a href="{{ route('petugas') }}">Petugas /</a></span><span class="fw-medium">Edit
            Petugas</span>
    </h4>

    <div class="app-ecommerce">
        <form action="{{ route('petugas.update', $petugas->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- Add Product -->
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-3">

                <div class="d-flex flex-column justify-content-center">
                    <h4 class="mb-1 mt-3">Edit petugas</h4>
                    <p class="text-muted">Klik Edit Untuk Edit petugas</p>
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
                            <h5 class="card-tile mb-0">Informasi petugas</h5>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label" for="nama">Nama</label>
                                <input type="text" class="form-control" id="nama" placeholder="John Die"
                                    name="nama" aria-label="Nama petugas" value="{{ $petugas->nama }}">
                            </div>
                            <div class="mb-3">
                                <div class="col"><label class="form-label" for="alamat">Alamat</label>
                                    <input type="text" class="form-control" id="alamat"
                                        placeholder="Jl. Siliwangi No. 69" name="alamat" aria-label="Alamat petugas"
                                        value="{{ $petugas->alamat }}">
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="col"><label class="form-label" for="email">E-mail</label>
                                    <input type="text" class="form-control" id="email" placeholder="email@gmail.com"
                                        name="email" aria-label="Email petugas" value="{{ $petugas->email }}">
                                </div>
                            </div>


                            {{-- < class="mb-3">
                              <div class="col">
                                  <label class="form-label" for="jenis_kelamin">Jenis Kelamin</label>
                                  <div>
                                      <div class="form-check form-check-inline">
                                          <input class="form-check-input" type="radio" name="jenis_kelamin" id="laki_laki" value="Laki-laki" {{ $anggota->jenis_kelamin == 'Laki-laki' ? 'checked' : '' }}>
                                          <label class="form-check-label" for="laki_laki">Laki-laki</label>
                                      </div>
                                      <div class="form-check form-check-inline">
                                          <input class="form-check-input" type="radio" name="jenis_kelamin" id="perempuan" value="Perempuan" {{ $anggota->jenis_kelamin == 'Perempuan' ? 'checked' : '' }}>
                                          <label class="form-check-label" for="perempuan">Perempuan</label>
                                      </div>
                                  </div>
                                  @error('jenis_kelamin')
                                      <div class="text-danger">{{ $message }}</div>
                                  @enderror
                              </div> --}}


                        </div>
                    </div>
                </div>
                <!-- /Second column -->

                <!-- Second column -->
                <div class="col-12 col-lg-4">
                    <!-- Pricing Card -->
                    <div class="card mb-4">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Data Tambahan</h5>
                        </div>
                        <div class="card-body">
                            <!-- Base Price -->
                            <div class="mb-3">
                                <label class="form-label" for="no_telepon">No. Telepon</label>
                                <input type="number" class="form-control" id="no_telepon" placeholder="+62 1234 5678 910"
                                    name="nomor_telepon" aria-label="Nomor Telepon" value="{{ $petugas->nomor_telepon }}">
                            </div>


                            <div class="mb-3">
                              <div class="col">
                                  <label class="form-label" for="jenis_kelamin">Jenis Kelamin</label>
                                  <div>
                                      <div class="form-check form-check-inline">
                                          <input class="form-check-input" type="radio" name="jenis_kelamin"
                                              id="laki_laki" value="Laki-laki" {{$petugas->jenis_kelamin == "Laki-laki" ? 'checked' : ''}}>
                                          <label class="form-check-label" for="laki_laki">Laki-laki</label>
                                      </div>
                                      <div class="form-check form-check-inline">
                                          <input class="form-check-input" type="radio" name="jenis_kelamin"
                                              id="perempuan" value="Perempuan" {{$petugas->jenis_kelamin == "Perempuan" ? 'checked' : ''}}>
                                          <label class="form-check-label" for="perempuan">Perempuan</label>
                                      </div>
                                  </div>
                              </div>
                          </div>
                        </div>

                    </div>


                </div>

        </form>
    </div>

@endsection
