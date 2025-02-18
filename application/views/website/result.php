<div class="result-page">
    <div>
        <div>
            <div class="logo">
                <img src="<?php echo base_url(); ?>assets/website/images/logo.png" width="260px" height="130px">
            </div>


            <?php if (validation_errors()): ?>
            <div class="login-page_errors">
                <?php echo validation_errors(); ?>
            </div>
            <?php endif; ?>




           

            <div class="result-page_success">
                <h2>Your Total Score: <?php echo $total_marks; ?> / 20</h2>
            </div>



            <div class="powered_by">
                <p style="">Powered By EMIGO </p>
                <p>Dubai | India </p>

            </div>
        </div>
    </div>



    <!-- <a href="<?php echo base_url('website/Questionnaire'); ?>">Restart Quiz</a>
    <a href="<?php echo base_url('website/Questionnaire/clear_session'); ?>">Clear Session</a> -->