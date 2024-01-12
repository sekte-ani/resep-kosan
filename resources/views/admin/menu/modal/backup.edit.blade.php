@extends('layouts.main', ['title' => 'Modul', 'page_heading' => 'Edit Data Modul'])

@section('content')
@include('utilities.alert-flash-message')
<section class="row" id="EditDataModal" >
	<div class="col card px-3 py-3">

	<div class="my-3 p-3 rounded">

		<!-- Table untuk memanggil data dari database -->
		<form action="{{ route('listmenu.update', $document->id) }}" method="PUT" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <div class="mb-3">
                        <label for="title" class="form-label">Judul</label>
                        <input type="text" class="form-control" name='title' id="title" placeholder="Masukkan judul menu.." value="{{ old('title', $document->title) }}">
                    </div>
                    <div class="mb-3">
                        @if ($document->menu)
                        <input type="hidden" name="oldImage" value="{{ $document->menu }}">
                       <a href="http://127.0.0.1:8000/storage/{{ $document->menu }}"><i class="bi bi-file-earmark-font-fill"></i>{{ $document->menu }}</a><br>
                        @endif
                        <label for="menu" class="form-label mt-3">File Modul</label>
                        <input type="file" name="menu" id="menu" class="form-control">
                    </div>
                    
                </div>
                

            </div>
            <div class="modal-footer">
    
                <button type="submit" class="btn btn-success" name="submit">Edit</button>
            </div>
        </form>
			
		{{-- Menampilkan total pemasukan --}}
		<div class="d-flex align-items-end flex-column p-2 mb-2">
			{{-- <p class="h4 p-3 rounded fw-bolder">Total Pemasukan : Rp. {{ $totalPemasukan }}</p> --}}
		</div>
		{{-- Paginator --}}
		{{-- {{ $data->withQueryString()->links() }} --}}
  </div>
</div>

</section>
@endsection
{{-- Import modal form tambah data --}}
@push('modal')
@include('modul.modal.create')
{{-- @include('modul.modal.edit') --}}
{{-- @include('pemasukan.modal.edit') --}}
@endpush

{{-- @push('js')
@include('dashboard.script')
@endpush --}}
