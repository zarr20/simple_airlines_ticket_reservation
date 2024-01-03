<?= $this->extend('templates/main_template/index') ?>
<?= $this->section('content') ?>

<div class="container">
    <h2 class="mt-4 mb-4">Passenger Information</h2>

    <form action="process_data" method="post" id="passengerForm">
        <div id="passengerContainer" class="d-flex flex-column gap-3">
            <div class="passenger-info border p-3 ">

                <input type="text" name="flight_id" value="<?= $flightId ?>">

                <div class="form-group">
                    <label for="passenger_name">Passenger Name:</label>
                    <input type="text" class="form-control" name="passenger_name[]" required>
                </div>

                <div class="form-group">
                    <label for="birth_date">Birth Date:</label>
                    <input type="date" class="form-control" name="birth_date[]" required>
                </div>

                <div class="form-group">
                    <label for="address">Address:</label>
                    <textarea class="form-control" name="address[]" rows="4" required></textarea>
                </div>

                <br>

                <button type="button" class="btn btn-danger remove-passenger" onclick="removePassenger(this)">Remove Passenger</button>
            </div>
        </div>

        <br>
        <button type="button" class="btn btn-success" onclick="addPassenger()">Add Passenger</button>



        <div class="form-group mt-3">
            <button type="submit" class="btn btn-primary">Booking Now</button>
        </div>
    </form>
</div>

<!-- Include Bootstrap JS and Popper.js -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>

<script>
    function addPassenger() {
        var clone = document.querySelector('.passenger-info').cloneNode(true);
        var inputs = clone.querySelectorAll('input, textarea');
        inputs.forEach(function(input) {
            input.value = '';
        });
        document.getElementById('passengerContainer').appendChild(clone);
    }

    function removePassenger(button) {
        var passengerSets = document.querySelectorAll('.passenger-info');
        if (passengerSets.length > 1) {
            button.parentNode.remove();
        } else {
            // alert("You cannot remove the last passenger information set.");
        }
    }
</script>

<?= $this->endSection() ?>