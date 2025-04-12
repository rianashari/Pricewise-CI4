<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Pengumuman</h1>
        <ol class="breadcrumb mb-4">
            <a class="breadcrumb-item active" href="<?= site_url('admin/') ?>">List Pengumuman</a>
            <li class="breadcrumb-item active">Edit Pengumuman</li>
        </ol>
        <div class="card mb-4">
            <section class="content">
                <div class="row">
                    <div class="col-cs-12">
                        <form action="<?= site_url('admin/update_pengumuman/' . $pengumuman['id']); ?>" method="post">
                            <div class="mb-3">
                                <label for="EditJudul" class="form-label">
                                    <h4>Judul</h4>
                                </label>
                                <input type="text" class="form-control" id="EditJudul" name="judul" value="<?= $pengumuman['judul']; ?>">
                            </div>
                            <div class="mb-3">
                                <label for="EditPengumuman" class="form-label">
                                    <h4>Pengumuman</h4>
                                </label>
                                <textarea class="form-control" id="EditPengumuman" name="pengumuman" rows="15"><?= $pengumuman['pengumuman']; ?></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary btn-lg float-end">Submit</button>
                        </form>
                    </div>
</main>