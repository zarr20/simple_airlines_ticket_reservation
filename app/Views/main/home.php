<?= $this->extend('templates/main_template/index') ?>
<?= $this->section('content') ?>

<?php
$departureOptions = [];
$arrivalOptions = [];
?>

<?php
foreach ($data['departures'] as $item) {
    $departureOptions[] = $item->departure;
}
foreach ($data['arrivals'] as $item) {
    $arrivalOptions[] = $item->arrival;
}
?>

<div class="container">

    <h2 class="mt-4 mb-4">
        Find Airline Tickets
    </h2>

    <div>
        <form action="<?= base_url('flight') ?>" class="form" method="get">
            <div class="d-flex flex-column gap-3">
                <div class="form-group">
                    <label for="departure">Departure:</label>
                    <select name="departure" id="departure" class="form-control">
                        <?php foreach ($departureOptions as $departure) : ?>
                            <option value="<?= $departure ?>"><?= $departure ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="arrival">Arrival:</label>
                    <select name="arrival" id="arrival" class="form-control">
                        <?php foreach ($arrivalOptions as $arrival) : ?>
                            <option value="<?= $arrival ?>"><?= $arrival ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="departure_time">Departure Time:</label>
                    <input type="datetime-local" name="departure_time" class="form-control" id="departureTimeInput" />
                </div>

                <button type="submit" class="btn btn-primary">Search Flights</button>
            </div>
        </form>
    </div>

</div>

<script>
    const currentDate = new Date().toISOString().slice(0, 16);
    document.getElementById('departureTimeInput').value = currentDate;
</script>

<?= $this->endSection() ?>