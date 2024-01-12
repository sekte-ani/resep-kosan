@extends('admin.layouts.main', ['title' => 'Menu', 'page_heading' => 'Tambah Menu Baru'])

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
		<!-- Table untuk memanggil data dari database -->
		<form method='POST' enctype="multipart/form-data">
			@csrf
					<div class="row">
				<div class="col-sm-12 col-md-12 col-lg-12">
					<div class="mb-3">
						<label for="title" class="form-label">Nama Makanan</label>
						<input type="text" class="form-control" name='title' id="title" placeholder="Masukkan nama makanan..">
					</div>
					<div class="mb-3">
						<label for="slug" class="form-label">Slug</label>
						<input type="text" class="form-control" name='slug' id="slug" placeholder="Slug akan digenerate..">
					</div>
					<div class="mb-3">
					  <label for="img" class="form-label">Gambar Makanan</label>
					  <input type="file" name="img" id="img" class="form-control">
					</div>
					<div class="mb-3">
						<label for="desc" class="form-label">Deskripsi</label>
						<input type="text" class="form-control" name='desc' id="desc" placeholder="Masukkan deskripsi..">
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
				  
					
				</div>
				

			</div>
			<div class="modal-footer">
			  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
			  <button type="submit" class="btn btn-success" name="submit">Simpan</button>
			</div>
		</form>
		{{-- Paginator --}}
		{{-- {{ $allMenu->withQueryString()->links() }} --}}
			
		{{-- Menampilkan total pemasukan --}}
		{{-- <div class="d-flex align-items-end flex-column p-2 mb-2"> --}}
			{{-- <p class="h4 p-3 rounded fw-bolder">Total Pemasukan : Rp. {{ $totalPemasukan }}</p> --}}
		{{-- </div> --}}
  </div>
</div>
</section>
<script>
    const tipes = document.querySelector('#title');
    const slugu = document.querySelector('#slug');

    tipes.addEventListener('change', function(){
        fetch('/dashboard-menu/create/checkSlug?title='+ tipes.value,{
          headers : {
            'Content-Type' : 'application/json',
            'Accept' : 'application/json'
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

{{-- @push('styles')
<style>
    .desc-cell {
        max-height: 3em; /* Set the maximum height (adjust as needed) */
        overflow: hidden;
        text-overflow: ellipsis; /* Add ellipsis (...) for overflow text */
        white-space: nowrap; /* Prevent wrapping to the next line */
    }

    .table-container {
        overflow-x: auto;
    }
</style>
@endpush --}}
{{-- Import modal form tambah data --}}
@push('modal')
@include('admin.menu.modal.create')
{{-- @include('modul.modal.edit') --}}
{{-- @include('pemasukan.modal.edit') --}}
@endpush

{{-- @push('js')
@include('dashboard.script')
@endpush --}}
