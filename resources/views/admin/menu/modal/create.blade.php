<!-- Modal -->
<div class="modal fade" id="TambahDataModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
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
          
        </div>
      </div>
    </div>
  </div>

  {{-- <script>
    const title = document.querySelector('#title');
    const slug = document.querySelector('#slug');

    title.addEventListener('change', function() {
      fetch('/dashboard-menu/checkSlug?title=${title.value}')
      .then(response=>response.json())
      .then(data => slug.value = data.slug)
    })
  </script> --}}