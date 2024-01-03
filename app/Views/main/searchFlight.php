<?= $this->extend('templates/main_template/index') ?>
<?= $this->section('content') ?>

<?php
var_dump($data['airline_flights']);
?>

<div class="container">

    <h2 class="mt-4 mb-4">
        Airline Tickets
    </h2>

    <div class="row mt-4">
        <?php


        foreach ($data['airline_flights'] as $airline) : ?>
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-body">

                        <h5 class="card-title"><?= $airline->airllines_name; ?></h5>
                        <div class="schedule d-flex justify-content-between mb-2">
                            <div class="d-flex flex-column">
                                <span>
                                    <?= $airline->departure; ?>
                                </span>
                                <span>
                                    <?= $airline->departure_time; ?>
                                </span>
                            </div>
                            <div class="d-flex flex-column">
                                <span>
                                    <?= $airline->arrival; ?>
                                </span>
                                <span>
                                    <?= $airline->arrival_time; ?>
                                </span>
                            </div>

                        </div>
                        <br>
                        <div class="d-flex justify-content-between align-items-center">
                            <a href="<?= base_url('booking/' . $airline->id); ?>" class="btn btn-primary">Book Now</a>
                            <span>
                                IDR 100.000
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

</div>

<?= $this->endSection() ?>