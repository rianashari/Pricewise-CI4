<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>
</head>
<body>

<a href="<?= site_url('admin') ?>" >Kembali ke Beranda</a>
<a href="<?= site_url('/logout') ?>" >Logout</a>


    <h1>Change Password for <?= esc($user['username']) ?></h1>
    <?php if(session()->getFlashdata('error')):?>
        <div style="color: red;">
            <?= session()->getFlashdata('error') ?>
        </div>
    <?php endif; ?>
    <?php if(session()->getFlashdata('message')):?>
        <div style="color: green;">
            <?= session()->getFlashdata('message') ?>
        </div>
    <?php endif; ?>

    <form action="<?= site_url('admin/proses_ganti_password'); ?>" method="post">

     <input type="hidden" name="username" value="<?= esc($user['username']) ?>" >
        <div>
            <label for="current_password">Current Password:</label>
            <input type="password" name="current_password" id="current_password" required>
        </div>
        <div>
            <label for="new_password">New Password:</label>
            <input type="password" name="new_password" id="new_password" required>
        </div>
        <div>
            <label for="confirm_password">Confirm New Password:</label>
            <input type="password" name="confirm_password" id="confirm_password" required>
        </div>
        <button type="submit">Change Password</button>
    </form>
</body>
</html>
