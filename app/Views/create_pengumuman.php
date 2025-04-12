<main>
        <div class="container-fluid px-4">
          <h1 class="mt-4">Pengumuman</h1>
          <ol class="breadcrumb mb-4">
            <a class="breadcrumb-item active" href="<?= site_url('admin/pengumuman') ?>">List Pengumuman</a>
            <li class="breadcrumb-item active">Tambah Pengumuman</li>
          </ol>
          <div class="card-body">
            <section class="content">
              <div class="row">
                <div class="col-cs-12">
                  <form action="<?= site_url('admin/pengumuman_store'); ?>" method="post">
                    <div class="mb-3">
                      <label for="InputJudul" class="form-label">
                        <h4>Judul</h4>
                      </label>
                      <input type="text" class="form-control" id="InputJudul" name="judul">
                    </div>
                    <div class="mb-3">
                      <label for="InputPengumuman" class="form-label">
                        <h4>Pengumuman</h4>
                      </label>
                      <textarea class="form-control" id="InputPengumuman" name="pengumuman" rows="15s"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary btn-lg float-end">Submit</button>
                  </form>
                </div>
      </main>