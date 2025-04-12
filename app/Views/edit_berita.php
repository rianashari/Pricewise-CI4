<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Berita</h1>
        <ol class="breadcrumb mb-4">
            <a class="breadcrumb-item active" href="<?= site_url('admin/') ?>">List Berita</a>
            <li class="breadcrumb-item active">Edit Berita</li>
        </ol>
        <div class="card mb-4">
            <section class="content">
                <div class="row">
                    <div class="col-cs-12">
                        <form action="<?= site_url('admin/update_berita/' . $berita['id']); ?>" method="post">
                            <div class="mb-3">
                                <label for="EditJudul" class="form-label">
                                    <h4>Judul</h4>
                                </label>
                                <input type="text" class="form-control" id="EditJudul" name="judul" value="<?= $berita['judul']; ?>">
                            </div>
                            <div class="mb-3">
                                <label for="EditBerita" class="form-label">
                                    <h4>Berita</h4>
                                </label>
                                <textarea class="form-control" id="EditBerita" name="berita" rows="15"><?= $berita['berita']; ?></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary btn-lg float-end">Submit</button>
                        </form>
                    </div>
</main>