<main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Pengumuman</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">List Pengumuman</li>
                    </ol>
                    <div class="card mb-4">
                        <section class="content">
                            <div class="row">
                                <div class="col-cs-12">
                                    <div class="card-body">
                                        <table id="datatablesSimple" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Judul</th>
                                                    <th>Pengumuan</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($pengumuman as $key => $post) : ?>
                                                    <tr>
                                                        <td><?php echo $key + 1; ?></td>
                                                        <td><?php echo $post['judul']; ?></td>
                                                        <td><?php echo $post['pengumuman']; ?></td>
                                                        <td>
                                                            <a href="<?= site_url('admin/edit_pengumuman/' . $post['id']) ?>">
                                                                <button type="button" class="btn btn-success">Edit</button>
                                                            </a>
                                                            <a href="<?= site_url('admin/delete_prngumuman/' . $post['id']) ?>">
                                                                <button type="button" class="btn btn-danger">Delete</button>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
            </main>