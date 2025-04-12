<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">User</h1>
        <ol class="breadcrumb mb-4">
            <a class="breadcrumb-item active" href="<?= site_url('admin/user') ?>">List User</a>
            <li class="breadcrumb-item active">Edit User</li>
        </ol>
        <div class="card-body">
            <section class="content">
                <div class="row">
                    <div class="col-cs-12">
                        <form action="<?= site_url('admin/update_user/' . $user['id']); ?>" method="post">
                            <div class="mb-3">
                                <div class="mb-3">
                                    <label for="EditNama" class="form-label">
                                        <h4>Nama</h4>
                                    </label>
                                    <input type="text" class="form-control" id="EditNama" name="nama" value="<?= $user['nama']; ?>">
                                </div>
                                <label for="EditUsername" class="form-label">
                                    <h4>Username</h4>
                                </label>
                                <input type="text" class="form-control" id="EditUsername" name="username" value="<?= $user['username']; ?>">
                            </div>
                            <div class="mb-3">
                                <label for="EditPassword" class="form-label">
                                    <h4>Password</h4>
                                </label>
                                <input type="text" class="form-control" id="Edit" name="password" value="<?= $user['password']; ?>">
                            </div>
                            <div class="mb-3">
                                <label for="EditStatus" class="form-label">
                                    <h4>Status</h4>
                                </label>
                                <input type="text" class="form-control" id="EditStatus" name="status" value="<?= $user['status']; ?>">
                            </div>
                            <button type="submit" class="btn btn-primary btn-lg float-end">Submit</button>
                        </form>
                    </div>
</main>