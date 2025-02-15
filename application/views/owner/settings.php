<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <div class="container">







        <div class="row">
            <!-- row -->

            <div class="col-md-12 mb-3">
                <a data-bs-toggle="modal" data-bs-target="#report" data-store-id="1" data-name="SALES" class="sales">
                    <div class="card-body bg-b-orange" style="margin-bottom: 10px;">
                        <div class="row align-items-center">
                            <div class="col-9">
                                <span class="text-white d-block text-uppercase text-truncate fw-semibold font-size-18"
                                    id="dateTimeButton"></span>
                            </div>
                            <div class="col-3 icon">
                                <i class="fa fa-calendar"></i>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-md-12 mb-3">
                <a data-bs-toggle="modal" data-bs-target="#report" data-store-id="1" data-name="USER" class="user">
                    <div class="card-body bg-b-secondary" style="margin-bottom: 10px;">
                        <div class="row align-items-center">
                            <div class="col-9">
                                <span
                                    class="text-white d-block text-uppercase text-truncate fw-semibold font-size-18">STORE
                                    OPENING TIME :
                                    <?= isset($openingTime) ? htmlspecialchars($openingTime) : ''; ?>
                                </span>
                            </div>
                            <div class="col-3 icon">
                                <i class="fa fa-clock"></i>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-md-12 mb-3">
                <a data-bs-toggle="modal" data-bs-target="#report" data-store-id="1" data-name="DELIVERY"
                    class="delivery">
                    <div class="card-body bg-b-success" style="margin-bottom: 10px;">
                        <div class="row align-items-center">
                            <div class="col-9">
                                <span
                                    class="text-white d-block text-uppercase text-truncate fw-semibold font-size-18">STORE
                                    CLOSING TIME :
                                    <?= isset($closingTime) ? htmlspecialchars($closingTime) : ''; ?>
                                </span>
                            </div>
                            <div class="col-3 icon">
                                <i class="fa fa-clock"></i>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-md-12 mb-3 text-center">
                <button class="btn btn-primary mx-3 text-white" data-bs-toggle="modal"
                    data-bs-target="#editopeningandclosing">EDIT TIME</button>
                <button class="btn btn-primary mx-3" data-bs-toggle="modal" data-bs-target="#holiday">EDIT
                    HOLIDAYS</button>
                <button class="btn btn-primary mx-3 adduser" data-bs-toggle="modal" data-bs-target="#listuser">ADD/LIST
                    USER</button>
            </div>

        </div>


    </div>




    <div class="modal fade" id="holiday" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel"> <span id="table_name"></span>Holidays</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="row bg-soft-light mb-3 border1 pt-2">

                        <form class="row g-3" id="addholidays" method="post" enctype="multipart/form-data">
                            <div class="col-md-3">
                                <div class="mb-2 ">
                                    <label class="form-label mx-2" for="default-input">Date</label>
                                    <input type="date" value="<?=date('Y-m-d');?>" required class="form-control"
                                        id="holidays_date" name="holiday_date">
                                    <span class="error errormsg mt-2 mx-2" id="holidaydate_error"></span>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="mb-2 ">
                                    <label class="form-label mx-2" for="default-input">Holiday Name</label>
                                    <input type="text" class="form-control" required placeholder="Holiday Name"
                                        id="holidays_name" name="holiday_name">
                                    <span class="error errormsg mt-2 mx-2" id="holidayname_error"></span>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="mb-2 focus">
                                    <label class="form-label" for="default-input">Description</label>
                                    <input class="form-control" value="" placeholder="Description" type="text"
                                        id="holidays_description" name="holiday_description">

                                </div>
                            </div>



                            <div class="col-md-3">
                                <div class="mb-4">
                                    <label class="form-label" for="default-input">&nbsp;</label><br>
                                    <button class="btn btn-success w-md" type="button" id="add_holiday">ADD</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div id="">
                        <table class="table table-bordered" id="holidayTable">
                            <thead>
                                <tr>
                                    <th>Sl No</th>
                                    <th>Name</th>
                                    <th>Date</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Rows will be dynamically added here -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>



    </div>


    </div>
    <!-- openingandclosing -->
    <div class="modal fade" id="editopeningandclosing" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">

                    <h1 class="modal-title fs-5" id="exampleModalLabel"> <span id="table_name"></span>CHANGE OPENING
                        TIME AND CLOSING TIME</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <?php if ($this->session->flashdata('success_message')): ?>
                    <div class="alert alert-success">
                        <?php echo $this->session->flashdata('success_message'); ?>
                    </div>
                    <?php endif; ?>
                    <div class="row bg-soft-light mb-3 border1 pt-2">
                        <form class="row g-3" id="edittimes" method="post" enctype="multipart/form-data">


                            <div class="col-md-3">
                                <div class="mb-2 ">
                                    <label class="form-label mx-2" for="default-input">Opening Time</label>
                                    <input type="time"
                                        value="<?= isset($openingTime) ? htmlspecialchars($openingTime) : ''; ?>"
                                        class="form-control" required placeholder="Holiday Name" name="opening_time">
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="mb-2 focus">
                                    <label class="form-label" for="default-input">Closing Time</label>
                                    <input class="form-control"
                                        value="<?= isset($closingTime) ? htmlspecialchars($closingTime) : ''; ?>"
                                        placeholder="Description" type="time" name="closing_time">

                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="mb-4">
                                    <label class="form-label" for="default-input">&nbsp;</label><br>
                                    <button class="btn btn-success w-md" type="button" id="edit_time">CHANGE</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Add user -->
    <div class="modal fade" id="listuser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">

                    <h1 class="modal-title fs-5" id="exampleModalLabel"> <span id="table_name"></span>List users</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="message d-none" role="alert"></div>
                    <div class="container">
                        <div class="row">

                        </div>
                    </div>
                    <div class="row">
                        <iframe id="iframe_body" height="700px" width="100%"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Add user -->

</body>

<script>
$(document).ready(function() {
    // Function to get the current date and time
    function getCurrentDateTime() {
        const now = new Date();
        const date = now.toLocaleDateString(); // Format: MM/DD/YYYY
        const time = now.toLocaleTimeString(); // Format: HH:MM:SS AM/PM
        return `${date}, ${time}`;
    }

    // Update the button with the current date and time
    function updateDateTime() {
        $('#dateTimeButton').text(getCurrentDateTime());
    }
    // Initial update
    updateDateTime();

    // Update every second
    setInterval(updateDateTime, 1000);
});
</script>


<script>
$(document).ready(function() {

    $('.adduser').click(function() {
        $("#iframe_body").show();
        $("#productForm").hide();
        document.getElementById('iframe_body').src =
            "<?php echo base_url("owner/settings/listStoreUsers/"); ?>";
    });

    function fetchHolidays() {
        $.ajax({
            url: '<?= base_url("owner/settings/getHolidaysByStoreId") ?>',
            method: 'GET',
            dataType: 'json',
            success: function(data) {
                renderTable(data);
            },
            error: function(error) {
                console.error('Error fetching holidays:', error);
            }
        });
    }

    // Render holidays in the table
    function renderTable(data) {
        const tableBody = $('#holidayTable tbody');
        tableBody.empty(); // Clear existing rows

        data.forEach(function(holiday, index) {
            const row = `
                        <tr>
                            <td>${index + 1}</td>
                            <td>${holiday.holiday_name}</td>
                            <td>${holiday.holiday_date}</td>
                            <td><button class="btn btn-danger delete-btn" data-id="${holiday.id}">Delete</button></td>
                        </tr>
                    `;
            tableBody.append(row);
        });

        // Attach delete event to buttons
        $('.delete-btn').click(function() {
            const id = $(this).data('id');
            deleteHoliday(id);
        });
    }

    // Delete a holiday
    function deleteHoliday(id) {
        if (!confirm('Are you sure you want to delete this holiday?')) return;

        $.ajax({
            url: '<?= base_url("owner/Settings/DeleteHoliday"); ?>',
            type: "POST",
            data: {
                id: id
            },
            success: function(response) {
                const result = JSON.parse(response);
                if (result.success) {
                    alert('Holiday deleted successfully.');
                    fetchHolidays(); // Refresh the table
                } else {
                    alert(result.message || 'Failed to delete the holiday.');
                }
            },
            error: function(error) {
                console.error('Error deleting holiday:', error);
            }
        });
    }

    $('#add_holiday').click(function(e) {
        let formData = new FormData($('#addholidays')[0]);
        $.ajax({
            url: '<?= base_url("owner/settings/addHoliday") ?>',
            type: 'POST',
            data: formData,
            dataType: 'json',
            processData: false,
            contentType: false,
            success: function(response) {
                if (response.success) {
                    console.log(response); // Log response for debugging
                    $('#holidaydate_error').html('');
                    $('#holidayname_error').html('');
                    $('#holidays_date').val('');
                    $('#holidays_name').val('');
                    $('#holidays_description').val('');
                    fetchHolidays();
                } else if (response.errors.holiday_date) {
                    $('#holidaydate_error').html(response.errors
                        .holiday_date);
                }
                if (response.errors.holiday_name) {
                    $('#holidayname_error').html(response.errors
                        .holiday_name);
                }

            },

        });
    });

    //edit time
    $('#edit_time').click(function(e) {
        let formData = new FormData($('#edittimes')[0]);
        $.ajax({
            url: '<?= base_url("owner/Settings/editstoreTime") ?>',
            type: 'POST',
            data: formData,
            dataType: 'json',
            processData: false,
            contentType: false,
            success: function(response) {
                if (response.success) {
                    $('#editopeningandclosing').modal('hide');
                    location.reload();
                }
            },
        });
    });
    // Initialize
    fetchHolidays();
});
</script>






</html>