<div class="question-page">
    <div>
        <div>
            <div class="logo">
                <img src="<?php echo base_url(); ?>assets/website/images/logo.png" width="150px" height="80px">
            </div>

            <div class="exam_details">
                <p class="exam_details_name">Online Exam </p>
                <p class="exam_details_duration">Duration : 30 minutes</p>
                <p class="exam_details_mark">Total Mark : 50</p>
            </div>


            <div>
                <h2>Time Left: <span id="timer"></span></h2>
            </div>




            <!-- <a href="<?php echo base_url('website/Questionnaire/generate_login_qr'); ?>" target="_blank"
                rel="noopener noreferrer">Generate QR</a> -->


            <div class="question_container">
                <p class="question_container_question">Question <?php echo $question_no + 1; ?></p>
                <p class="question_container_name"><?php echo $question->question_name; ?></p>
            </div>


            <div class="answers_container">
                <form method="POST" action="<?php echo base_url('website/Questionnaire/next'); ?>">
                    <!-- <?php foreach ($options as $option): ?> -->
                    <div class="answers_container_option">
                        <input type="radio" name="option" value="<?php echo $option->option1; ?>" required>
                        <?php echo $option->option1; ?>
                    </div>
                    <div class="answers_container_option">
                        <input type="radio" name="option" value="<?php echo $option->option2; ?>" required>
                        <?php echo $option->option2; ?>
                    </div>
                    <div class="answers_container_option">
                        <input type="radio" name="option" value="<?php echo $option->option3; ?>" required>
                        <?php echo $option->option3; ?>
                    </div>
                    <div class="answers_container_option">
                        <input type="radio" name="option" value="<?php echo $option->option4; ?>" required>
                        <?php echo $option->option4; ?>
                    </div>

                    <br>

                    <p>Ans : <?php echo $option->answer; ?></p>

                    <!-- <?php endforeach; ?> -->

                    <input type="hidden" name="question_id" value="<?php echo $question->id; ?>">
                    <input type="hidden" name="question_no" value="<?php echo $question_no; ?>">

                    <button type="submit">Next</button>
                </form>

            </div>





            <div class="powered_by">
                <p style="">Powered By EMIGO </p>
                <p>Dubai | India </p>

            </div>
        </div>
    </div>