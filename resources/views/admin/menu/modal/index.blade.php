@extends('admin.layouts.main', ['title' => 'Tambah Menu', 'page_heading' => 'Tambah Menu Baru'])

@section('content')
    @include('admin.utilities.alert-flash-message')
    <section class="row">
        <div class="col card px-3 py-3">
            <div class="my-3 p-3 rounded">

                <!-- TOMBOL TAMBAH DATA -->
                <div class="pb-3 d-flex justify-content-end">
                    <!-- Button trigger modal -->
                    {{-- <button type="button" class="btn btn-success me-2 py-2" data-bs-toggle="modal" data-bs-target="#TambahDataModal">
                        + Tambah Data
                    </button> --}}
                    {{-- <a href="/riwayat-cuti" class="btn btn-warning">Riwayat Cuti</a> --}}
                </div>
                <!-- Form for adding a new menu -->
                <form method='POST' enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <div class="mb-3">
                                <label for="title" class="form-label">Nama Makanan</label>
                                <input type="text" class="form-control" name='title' id="title"
                                    placeholder="Masukkan nama makanan..">
                            </div>
                            <div class="mb-3">
                                <label for="slug" class="form-label">Slug</label>
                                <input type="text" readonly class="form-control bg-light" name='slug' id="slug"
                                    placeholder="Slug akan digenerate..">
                            </div>
                            <div class="mb-3">
                                <label for="category_id" class="form-label">Kategori</label>
                                <select class="form-select" name='category_id' id="category_id">
                                    <option value="" disabled>Pilih Kategori</option>
                                    <option value="1">Makanan</option>
                                    <option value="2">Minuman</option>
                                    <option value="3">Cemilan</option>
                                    <!-- Add more options as needed -->
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="img" class="form-label">Gambar Makanan</label>
                                <input type="file" name="img" id="img" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="desc" class="form-label">Deskripsi</label>
                                {{-- <input type="text" class="form-control" name='desc' id="desc"
                                    placeholder="Masukkan deskripsi.."> --}}
                                <input id="desc" type="hidden" name="desc">
                                <trix-editor input="desc"></trix-editor>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a href="/dashboard-menu" class="btn btn-secondary">Kembali</a>
                        <button type="submit" class="btn btn-success" name="submit">Simpan</button>
                    </div>
                </form>

            </div>
        </div>
    </section>
    <script>
        document.addEventListener('trix-file-accept', function (e) {
            e.preventDefault();
        })
        const tipes = document.querySelector('#title');
        const slugu = document.querySelector('#slug');

        tipes.addEventListener('change', function () {
            fetch('/dashboard-menu/create/checkSlug?title=' + tipes.value, {
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json'
                    }
                })
                .then(response => response.json())
                .then(data => slugu.value = data.slug)
                .then(data => {
                    console.log(data)
                })
        });
    </script>
@endsection

{{-- Import modal form tambah data --}}
@push('modal')
    @include('admin.menu.modal.create')
@endpush

{{-- @push('js')
    @include('dashboard.script')
@endpush --}}
