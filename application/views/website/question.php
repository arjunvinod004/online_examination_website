<div class="question-page">
    <div>
        <div>
            <div class="logo">
                <img src="<?php echo base_url(); ?>assets/website/images/logo.png" width="260px" height="130px">
            </div>


            <div>
                <h2>Time Left: <span id="timer"></span></h2>
            </div>




            <!-- <a href="<?php echo base_url('website/Questionnaire/generate_login_qr'); ?>" target="_blank"
                rel="noopener noreferrer">Generate QR</a> -->


            <h2>Question <?php echo $question_no; ?>: <?php echo $question->question_name; ?></h2>

            <form method="POST" action="<?php echo base_url('website/Questionnaire/next'); ?>">
                <!-- <?php foreach ($options as $option): ?> -->
                <input type="radio" name="option" value="<?php echo $option->option1; ?>" required>
                <?php echo $option->option1; ?><br>
                <input type="radio" name="option" value="<?php echo $option->option2; ?>" required>
                <?php echo $option->option2; ?><br>
                <input type="radio" name="option" value="<?php echo $option->option3; ?>" required>
                <?php echo $option->option3; ?><br>
                <input type="radio" name="option" value="<?php echo $option->option4; ?>" required>
                <?php echo $option->option4; ?><br>

                <br>

                <p>Ans : <?php echo $option->answer; ?></p>

                <!-- <?php endforeach; ?> -->

                <input type="hidden" name="question_id" value="<?php echo $question->id; ?>">
                <input type="hidden" name="question_no" value="<?php echo $question_no; ?>">

                <button type="submit">Next</button>
            </form>





            <div class="powered_by">
                <p style="">Powered By EMIGO </p>
                <p>Dubai | India </p>

            </div>
        </div>
    </div>