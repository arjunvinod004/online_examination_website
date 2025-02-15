<style>
    #goToTop {
    padding: 10px 15px;
    background-color: #F44336;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}
#goToTop:hover {
    background-color: #F44336;
}

</style>
<button id="goToTop" style="display: none; position: fixed; bottom: 20px; right: 20px;">Top</button>

<!-- JAVASCRIPT -->
<script src="<?php echo base_url();?>assets/admin/js/metismenu.js"></script>
<script src="<?php echo base_url();?>assets/admin/js/simplebar.min.js"></script>
<script src="<?php echo base_url();?>assets/admin/js/waves.min.js"></script>
<script src="<?php echo base_url();?>assets/admin/js/feather.min.js"></script>
<script src="<?php echo base_url();?>assets/admin/js/app.js"></script>
<!-- DataTables CSS -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
<!-- DataTables JS -->
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js">
</script>

<script>
$(document).ready(function() {
    new DataTable('#example');
    $(document).on('click', '.btn-close', function() {
        location.reload(); // Reloads the current page
    });
    
    // Show or hide the button when scrolling
    $(window).scroll(function () {
        if ($(this).scrollTop() > 100) {
            $('#goToTop').fadeIn();
        } else {
            $('#goToTop').fadeOut();
        }
    });

    // Scroll smoothly to the top when the button is clicked
    $('#goToTop').click(function () {
        $('html, body').animate({ scrollTop: 0 }, 600);
        return false;
    });
});
</script>
</body>

</html>
