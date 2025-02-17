<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login</title>
</head>

<body>

    <h2>Login</h2>
    <?php echo validation_errors(); ?>

    <?php if ($this->session->flashdata('error')): ?>
    <div class="alert alert-error">
        <?= $this->session->flashdata('error'); ?>
    </div>
    <?php endif; ?>


    <?php echo form_open('website/user/login_user'); ?>

    <label for="email">Email:</label>
    <input type="text" class="form-control" name="email" value="<?php echo set_value('email'); ?>" /><br>

    <label for="mobile_number">Mobile Number:</label>
    <input type="password" class="form-control" name="mobile_number"
        value="<?php echo set_value('mobile_number'); ?>" /><br>

    <input type="submit" value="Login" />
    <?php echo form_close(); ?>