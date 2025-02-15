<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Contact Us</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css'); ?>">
</head>
<body>
    <h1>Contact Us</h1>
    <form action="<?php echo base_url('pages/contact'); ?>" method="post">
        <label for="name">Your Name:</label>
        <input type="text" id="name" name="name">
        <br>
        <label for="email">Your Email:</label>
        <input type="email" id="email" name="email">
        <br>
        <label for="message">Your Message:</label>
        <textarea id="message" name="message"></textarea>
        <br>
        <button type="submit">Send</button>
    </form>
</body>
</html>
