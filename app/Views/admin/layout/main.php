<!-- File: app/Views/admin/layouts/main.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - <?= $activePage ?? 'Dashboard'; ?></title>
    <!-- CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/bootstrap/css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/fontawesome/css/all.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/datatables/dataTables.bootstrap4.min.css'); ?>">
    <?= $this->renderSection('styles'); ?>
</head>
<body>
    <?= $this->include('admin/layouts/navbar'); ?>
    <div class="container-fluid mt-4">
        <?= $this->renderSection('content'); ?>
    </div>
    <!-- Scripts -->
    <script src="<?= base_url('assets/jquery/jquery.min.js'); ?>"></script>
    <script src="<?= base_url('assets/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
    <?= $this->renderSection('scripts'); ?>
</body>
</html>
