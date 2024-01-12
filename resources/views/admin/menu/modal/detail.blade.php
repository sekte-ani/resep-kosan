@extends('admin.layouts.main', ['title' => 'Menu', 'page_heading' => 'Tambah Menu Baru'])

@section('content')
@include('admin.utilities.alert-flash-message')
<section class="row">
	<div class="col card px-3 py-3">

	<div class="my-3 p-3 rounded">

		
		<!-- TOMBOL TAMBAH DATA -->
		<div class="pb-3 d-flex justify-content-start">
			<!-- Button trigger modal -->
			{{-- <button type="button" class="btn btn-success me-2 py-2" data-bs-toggle="modal" data-bs-target="#TambahDataModal">
				+ Tambah Data
			</button> --}}
			{{-- <a href="/riwayat-cuti" class="btn btn-warning">Riwayat Cuti</a> --}}
			<a href="/dashboard-menu" class="btn btn-secondary">Kembali</a>

		</div>
	<div>
		<h3>Nama Makanan</h3>
    <p>{{ $menu->title }}</p>
		{{-- <h3>Slug</h3>
    <p>{{ $menu->slug }}</p> --}}
		<h3>Gambar Makanan</h3>
    <img src="{{asset("storage/".$menu->img)}}" alt="{{ $menu->title }}"class="img-fluid mb-3" style="max-height: 200px;" >
    <h3>Kategori</h3>
    <p>{{ $menu->category->name }}</p>
		<h3>Deskripsi</h3>
    <p>{!! $menu->desc !!}</p>

    @foreach ($rating as $item)
    <div class="card bg-primary">
      <div class="card-body ">
          <h4 class="card-title text-white">{{ $item->user->name }}</h4>
          <h6 class="card-title text-white">{{ $item->rating }}/5</h6>
          <p class="card-text text-white">{{ $item->review }}</p>
      </div>
    </div>
    @endforeach
    {{ $rating->withQueryString()->links() }}
    
  

	</div>
		<!-- Table untuk memanggil data dari database -->
		
		{{-- Paginator --}}
			
		{{-- Menampilkan total pemasukan --}}
		{{-- <div class="d-flex align-items-end flex-column p-2 mb-2"> --}}
			{{-- <p class="h4 p-3 rounded fw-bolder">Total Pemasukan : Rp. {{ $totalPemasukan }}</p> --}}
		{{-- </div> --}}
  </div>
</div>
</section>
{{-- <script>
	document.addEventListener('trix-file-accept', function(e){
        e.preventDefault();
      })
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
  </script> --}}
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
