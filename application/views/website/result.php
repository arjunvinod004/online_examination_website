<!DOCTYPE html>
<html>

<head>
    <title>Quiz Result</title>
</head>

<body>
    <h2>Your Total Score: <?php echo $total_marks; ?></h2>
    <a href="<?php echo base_url('website/Questionnaire'); ?>">Restart Quiz</a>
    <a href="<?php echo base_url('website/Questionnaire/clear_session'); ?>">Clear Session</a>
</body>

</html>