<main>
  <div class="container-fluid px-4">
    <h1 class="mt-4">User</h1>
    <ol class="breadcrumb mb-4">
      <a class="breadcrumb-item active" href="<?= site_url('admin/user') ?>">List User</a>
      <li class="breadcrumb-item active">Tambah User</li>
    </ol>
    <div class="card-body">
      <section class="content">
        <div class="row">
          <div class="col-cs-12">
            <form action="<?= site_url('admin/user_store'); ?>" method="post">
              <div class="mb-3">
                <label for="InputNama" class="form-label">
                  <h4>Nama</h4>
                </label>
                <input type="text" class="form-control" id="InputNama" name="nama">
              </div>
              <div class="mb-3">
                <label for="InputUsername" class="form-label">
                  <h4>Username</h4>
                </label>
                <input type="text" class="form-control" id="InputUsername" name="username">
              </div>
              <div class="mb-3">
                <label for="InputPassword" class="form-label">
                  <h4>Password</h4>
                </label>
                <input type="Password" class="form-control" id="InputPassword" name="password">
              </div>
              <div class="mb-3">
                <label for="InputStatus" class="form-label">
                  <h4>Status</h4>
                </label>
                <input type="text" class="form-control" id="InputStatus" name="status">
              </div>
              <button type="submit" class="btn btn-primary btn-lg float-end">Submit</button>
            </form>
          </div>
</main>