@extends('admin.layouts.main', ['title' => 'Detail Menu', 'page_heading' => 'Detail Menu'])

@section('content')
    @include('admin.utilities.alert-flash-message')
    <section class="row">
        <div class="col card px-3 py-3">
            <div class="my-3 p-3 rounded">

                <!-- Navigation -->
                <div class="pb-3 d-flex justify-content-start">
                    <a href="/dashboard-menu" class="btn btn-secondary">Kembali</a>
                </div>

                <!-- Menu Details -->
                <div>
                    <h3>Nama Makanan</h3>
                    <p>{{ $menu->title }}</p>
                    
                    <h3>Kategori</h3>
                    <p>{{ $menu->category->name }}</p>
                    
                    <h3>Gambar Makanan</h3>
                    <img src="{{ asset("storage/".$menu->img) }}" alt="{{ $menu->title }}" class="img-fluid mb-3"
                        style="max-height: 200px;">

                    <h3>Deskripsi</h3>
                    <p>{!! $menu->desc !!}</p>

                    <!-- Ratings -->
                    @foreach ($rating as $item)
                        <div class="card bg-primary mt-3">
                            <div class="card-body">
                                <h4 class="card-title text-white">{{ $item->user->name }}</h4>
                                <h6 class="card-title text-white">{{ $item->rating }}/5</h6>
                                <p class="card-text text-white">{{ $item->review }}</p>
                            </div>
                        </div>
                    @endforeach

                    <!-- Pagination for Ratings -->
                    {{ $rating->withQueryString()->links() }}
                </div>

            </div>
        </div>
    </section>
@endsection

@push('modal')
    @include('admin.menu.modal.create')
@endpush
