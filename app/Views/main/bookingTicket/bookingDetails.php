<?= $this->extend('templates/main_template/index') ?>
<?= $this->section('content') ?>
<div class="container mt-5">
    <h1 class="mb-4">Booking Details</h1>

    <p class="lead">Booking ID: <?= $bookingId ?></p>

    <a href="<?= site_url('booking/' . $bookingId . '/delete') ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this booking?')">Delete Booking</a>
</div>


<?= $this->endSection() ?>