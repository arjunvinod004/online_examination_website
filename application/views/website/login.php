<div class="login-page">
    <div>
        <div>
            <div class="logo">
                <img src="<?php echo base_url(); ?>assets/website/images/logo.png" width="150px" height="80px">
            </div>
            <div class="signup">
                <p>Login</p>
            </div>



            <?php if (validation_errors()): ?>
            <div class="login-page_errors">
                <?php echo validation_errors(); ?>
            </div>
            <?php endif; ?>




            <?php if ($this->session->flashdata('error')): ?>
            <div class="login-page_errors">
                <?= $this->session->flashdata('error'); ?>
            </div>
            <?php endif; ?>


            <?php echo form_open('website/user/login_user'); ?>

            <label for="email">Email:</label>
            <input type="text" class="form-control" name="email" value="<?php echo set_value('email'); ?>"
                placeholder="Email" />

            <label for="mobile_number">Mobile Number:</label>
            <input type="password" class="form-control" name="mobile_number"
                value="<?php echo set_value('mobile_number'); ?>" placeholder="Mobile number" />

            <input type="submit" value="Login" />
            <?php echo form_close(); ?>



            <div class="powered_by">
                <p style="">Powered By EMIGO </p>
                <p>Dubai | India </p>

            </div>
        </div>
    </div>