<main>
        <div class="container-fluid px-4">
          <h1 class="mt-4">Berita</h1>
          <ol class="breadcrumb mb-4">
            <a class="breadcrumb-item active" href="<?= site_url('admin/') ?>">List Berita</a>
            <li class="breadcrumb-item active">Tambah Berita</li>
          </ol>
          <div class="card-body">
            <section class="content">
              <div class="row">
                <div class="col-cs-12">
                  <form action="<?= site_url('admin/berita_store'); ?>" method="post">
                    <div class="mb-3">
                      <label for="InputJudul" class="form-label">
                        <h4>Judul</h4>
                      </label>
                      <input type="text" class="form-control" id="InputJudul" name="judul">
                    </div>
                    <div class="mb-3">
                      <label for="InputBerita" class="form-label">
                        <h4>Berita</h4>
                      </label>
                      <textarea class="form-control" id="InputBerita" name="berita" rows="15s"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary btn-lg float-end">Submit</button>
                  </form>
                </div>
      </main>