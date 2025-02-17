// 1. validation add user
// 2. title

$(document).ready(function () {

    var base_url = 'http://localhost/online_examination_website/';

    // 1. validation add user
    $('#UserForm').on('submit', function (e) {
        // alert('hii')
        e.preventDefault();  // Prevent the default form submission
        // Clear previous error messages
        $('.errormsg').text('');
        let isValid = true;

        if($('#name').val().trim() === '') {
            isValid = false;
            $('#errorname').text('Please enter a name.');
        };

        const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailPattern.test($('#email').val().trim())) {
            $('#erroremail').text('Please enter a valid email address.');
            isValid = false;
        }

        const phonePattern = /^\d{10}$/;
        if (!phonePattern.test($('#mobileno').val().trim())) {
            $('#errormobileno').text('Please enter a valid 10-digit phone number.');
            isValid = false;
        }
        if($('#address').val().trim() === '') {
            isValid = false;
            $('#erroraddress').text('Please enter a address.');
        };
    
      
        if($('#remarks').val().trim() === '') {
            isValid = false;
            $('#errorremarks').text('Please enter a remarks.');
        };

        if ($('#user-status').val() === 'Select Status') {
            $('#errorstatus').text('Please select a status.');
            isValid = false;
        }

        if (isValid) {
            // alert('hii')
            $.ajax({
                url: base_url + 'admin/Student/add',  // Replace with your controller method
                type: 'POST',
                data: $('#UserForm').serialize(),
                success: function (response) {
                    // location.reload();
                },
                error: function (xhr, status, error) {
                    // Handle error
                    alert('An error occurred while submitting the form.');
                }
            });
        }
    });
    //end

   // 2. title
    
});