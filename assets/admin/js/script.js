// 1. validation add user
// 2. validation for add question
// 3. delete button clicked data-id to popup

$(document).ready(function () {

    var base_url = 'http://localhost/online_examination_website/';

    // 1. validation add user
    $('#UserForm').on('submit', function (e) {
        // alert('hii')
        e.preventDefault();  // Prevent the default form submission
        // Clear previous error messages
        $('.errormsg').text('');
        let isValid = true;

        if ($('#name').val().trim() === '') {
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
        if ($('#address').val().trim() === '') {
            isValid = false;
            $('#erroraddress').text('Please enter a address.');
        };


        if ($('#remarks').val().trim() === '') {
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
                    // alert('hii');  
                    var result = JSON.parse(response);
                 if (result.status === 'success') {
                 location.href = result.redirect_url; // Use the redirect URL from the backend
                } 
                else {
                alert(result.message); // Show error message if something went wrong
                }
                },
                error: function (xhr, status, error) {
                    // Handle error
                    alert('An error occurred while submitting the form.');
                }
            });
        }
    });
    //end

    // 2. validation for add question

    $('#QuestionForm').on('submit', function (e) {
        e.preventDefault();  // Prevent the default form submission
        // Clear previous error messages
        $('.errormsg').text('');
        let isValid = true;
        if ($('#question_name').val().trim() === '') {
            isValid = false;
            $('#error-question_name').text('Please enter a question.');
        };
        if ($('#option1').val().trim() === '') {
            isValid = false;
            $('#erroroption1').text('Please enter a option1.');
        };
        if ($('#option2').val().trim() === '') {
            isValid = false;
            $('#erroroption2').text('Please enter a option2.');
        };
        if ($('#option3').val().trim() === '') {
            isValid = false;
            $('#erroroption3').text('Please enter a option3.');
        };
        if ($('#option4').val().trim() === '') {
            isValid = false;
            $('#erroroption4').text('Please enter a option4.');
        };

        if ($('#answer').val().trim() === '') {
            isValid = false;
            $('#erroranswer').text('Please enter a answer.');
        };
        // if ($('#mark').val().trim() === '') {
        //     isValid = false;
        //     $('#errormark').text('Please enter a mark.');
        // };
        if ($('#remarks').val().trim() === '') {
            isValid = false;
            $('#errorremarks').text('Please enter a remarks.');
        };

        if (isValid) {
            //alert('hii')
            $.ajax({
                url: base_url + 'admin/Question/add',  // Replace with your controller method
                type: 'POST',
                data: $('#QuestionForm').serialize(),
                success: function (response) {
                 var result = JSON.parse(response);
                  if (result.status === 'success') {
                   location.href = result.redirect_url; // Use the redirect URL from the backend
                }
                 else {
            alert(result.message); // Show error message if something went wrong
                }
                },
                error: function (xhr, status, error) {
                    // Handle error
                    alert('An error occurred while submitting the form.');
                }
            });
        }
      // end
    });

 // 3. delete button clicked data-id to popup
    $(".tblDelBtn").click(function () {
        // alert('click');
        $('#delete_id').val($(this).data('id'));
});

// 4. delete 

$("#yes_del_category").on('click',function(){
  var id =  $('#delete_id').val();
//   alert(id);
  $.ajax({
    url: base_url + 'admin/Question/delete',  // Replace with your controller method
    type: 'POST',
    data: { 'id' : id },
    success: function (response) {
        location.reload();
    },
    error: function (xhr, status, error) {
        // Handle error
        alert('An error occurred while submitting the form.');
    }
 });
})
});