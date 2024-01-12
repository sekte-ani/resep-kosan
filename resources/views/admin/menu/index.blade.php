@extends('admin.layouts.main', ['title' => 'Menu', 'page_heading' => 'List Semua Menu'])

@section('content')
@include('admin.utilities.alert-flash-message')
<section class="row">
	<div class="col card px-3 py-3">

	<div class="my-3 p-3 rounded">

		
		<!-- TOMBOL TAMBAH DATA -->
		<div class="pb-3 d-flex justify-content-end">
			<!-- Button trigger modal -->
			<button type="button" class="btn btn-success me-2 py-2" data-bs-toggle="modal" data-bs-target="#TambahDataModal">
				+ Tambah Data
			</button>
			{{-- <a href="/riwayat-cuti" class="btn btn-warning">Riwayat Cuti</a> --}}
		</div>
		<!-- Table untuk memanggil data dari database -->
		<table class="table table-hover">
			<thead>
				<tr>
					{{-- DATANYA SESUAIIN LAGI  NANTI SAMA YANG DIBIKIN --}}
					<th class="col-md-1">No</th>
					<th class="col-md-2">Nama Menu</th>
					<th class="col-md-2">Kategori</th>
					<th class="col-md-3">Aksi</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($allMenu as $item)
				<tr>
					<td>{{ $loop -> iteration }}</td>
					<td>{{ $item -> title }}</td>
					<td>{{ $item -> category->name }}</td>
					<td>
						{{-- {{ /url('modul/'.$item->id.'/edit') }} --}}
						<a href='/detail-menu' class="btn btn-primary btn-sm">Detail</a>
						{{-- <a href='' class="btn btn-warning btn-sm">Edit</a> --}}
							
						<form onsubmit="return confirm('Apakah anda yakin ingin menghapus data?')" class="d-inline" action="" method="post">
							@csrf
							@method('PUT')
							<button type="submit" name="submit" class="btn btn-warning btn-sm">Edit</button>
						</form>
						<form onsubmit="return confirm('Apakah anda yakin ingin menghapus data?')" class="d-inline" action="" method="post">
							@csrf
							@method('PUT')
							<button type="submit" name="submit" class="btn btn-danger btn-sm">Delete</button>
						</form>
					</td>
				</tr>
				@endforeach

				{{-- @foreach ($data as $item)
					<tr>
						<td>{{ $loop->iteration }}</td>
						<td>{{ $item->title }}</td>
						<td><a href="http://127.0.0.1:8000/storage/{{ $item->modul }}"><i class="bi bi-file-earmark-font-fill"></i></a></td>
						<td>
							<a href='{{ url('modul/'.$item->id.'/edit') }}' class="btn btn-warning btn-sm">Edit</a>
							
							<form onsubmit="return confirm('Apakah anda yakin ingin menghapus data?')" class="d-inline" action="{{ url("modul/".$item->id) }}" method="post">
								@csrf
								@method('DELETE')
								<button type="submit" name="submit" class="btn btn-danger btn-sm">Delete</button>
							</form>
						</td>
					</tr>
				@endforeach --}}
			</tbody>
		</table>
		{{-- Paginator --}}
		{{ $allMenu->withQueryString()->links() }}
			
		{{-- Menampilkan total pemasukan --}}
		{{-- <div class="d-flex align-items-end flex-column p-2 mb-2"> --}}
			{{-- <p class="h4 p-3 rounded fw-bolder">Total Pemasukan : Rp. {{ $totalPemasukan }}</p> --}}
		{{-- </div> --}}
  </div>
</div>

</section>
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
