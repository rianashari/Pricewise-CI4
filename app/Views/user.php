<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">User</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">List User</li>
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
                                        <th>Nama</th>
                                        <th>Username</th>
                                        <th>Password</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($user as $key => $post) : ?>
                                        <tr>
                                            <td><?php echo $key + 1; ?></td>
                                            <td><?php echo $post['nama'] ?></td>
                                            <td><?php echo $post['username'] ?></td>
                                            <td><?php echo $post['password'] ?></td>
                                            <td><?php echo $post['status']; ?></td>
                                            <td>
                                                <a href="<?= site_url('admin/edit_user/' . $post['id']) ?>">
                                                    <button type="button" class="btn btn-success">Edit</button>
                                                </a>
                                                <a href="<?= site_url('admin/delete_user/' . $post['id']) ?>">
                                                    <button type="button" class="btn btn-danger">Delete</button>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
</main>