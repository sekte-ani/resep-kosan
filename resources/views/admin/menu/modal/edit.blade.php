@extends('admin.layouts.main', ['title' => 'Edit Menu', 'page_heading' => 'Edit Menu'])

@section('content')
@include('admin.utilities.alert-flash-message')
<section class="row">
	<div class="col card px-3 py-3">

	<div class="my-3 p-3 rounded">

		
		<!-- Table untuk memanggil data dari database -->
		<form action='{{ url("/dashboard-menu/edit/{$menu->slug}") }}' method="POST" enctype="multipart/form-data">
			@csrf
			@method('PUT')
					<div class="row">
				<div class="col-sm-12 col-md-12 col-lg-12">
					<div class="mb-3">
						<label for="title" class="form-label">Nama Makanan111</label>
						<input type="text" class="form-control" name='title' id="title" value="{{ $menu->title }}" placeholder="Masukkan nama makanan..">
					</div>
					<div class="mb-3">
						<label for="slug" class="form-label">Slug</label>
						<input type="text" readonly class="form-control bg-light" name='slug' id="slug" value="{{ $menu->slug }}" placeholder="Slug akan digenerate..">
					</div>
					<div class="mb-3">
						<label for="category_id" class="form-label">Kategori</label>
						<select class="form-select" name='category_id' id="category_id">
							<option value="{{ $menu->category->name }}" disabled>Pilih Kategori</option>
							@foreach ($cat as $category)
                            @if (old('category_id', $menu->category_id) == $category->id)
                              <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                            @else
                             <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endif
                            @endforeach
							<!-- Add more options as needed -->
						</select>
					  </div>
					<div class="mb-3">
					  <label for="img" class="form-label">Gambar Makanan</label><br/>
    					<img src="{{asset("storage/".$menu->img)}}" alt="{{ $menu->title }}"class="img-fluid mb-3" style="max-height: 200px;" >
					  <input type="file" name="img" value="{{ $menu->img }}" id="img" class="form-control">
					</div>
					<div class="mb-3">
						<label for="desc" class="form-label">Deskripsi</label>
						<input id="desc" type="hidden" value="{{ $menu->desc }}" name="desc">
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
  </script>
@endsection


{{-- Import modal form tambah data --}}
@push('modal')
@include('admin.menu.modal.create')
@endpush

{{-- @push('js')
@include('dashboard.script')
@endpush --}}
