<!DOCTYPE html>
<html>
<head>
<title>Turnkey Estimates</title>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/semantic.css">
<style type="text/css">
    body {
      background-color: #edf0f5;
      font-family: 'Nunito', sans-serif;
    }
    body > .grid {
      height: 100%;
    }
    .image {
      margin-top: -100px;
    }
    .column {
      max-width: 450px;
    }
    .ui.fluid.button {
        background-color: #0bb0c9;
        color: white;
        font-family: 'Nunito', sans-serif;
    }

    .ui.forgotpassword{
        margin-top: 10px;
        margin-right: 15px;
    }

    a {
        color: #0bb0c9;
    }
    a:hover, a:visited {
        color: #0bb0c9;
    }
    img {
        margin-bottom: 30px;
    }

  </style>
  </head>
  <body>
<div class="ui middle aligned center aligned grid">
  <div class="column">
    <img src="<?php echo base_url();?>assets/images/logo.jpeg" class="image">
    <form class="ui large form" name="login_frm" id="login_frm" method="post" action="<?php echo base_url(); ?>Signup/verifySignup">
      <div class="ui segment">

        <div class="field">
          <div class="ui left icon input">
            <i class="user icon"></i>
            <input type="text" name="username" id="fullname" value="" placeholder="Full Name">
          </div>
          <?php echo form_error('username'); ?>

        </div>


        <div class="field">
          <div class="ui left icon input">
            <i class="user icon"></i>
            <input type="text" name="email" id="emailAddress" value="" placeholder="E-mail address">
          </div>
          <?php echo form_error('email'); ?>

        </div>

        <div class="field">
          <div class="ui left icon input">
            <i class="lock icon"></i>
            <input type="password" name="password" value="" placeholder="Password">
          </div>
          <?php echo form_error('password'); ?>
        </div>

        <input type="submit" name="login_btn" id="login_btn" value="Sign up" class="ui fluid large submit button">
      </div>      

    </form>

    <div class="ui segment">
      Already have an account?<a href="<?php echo base_url(); ?>">Log in</a>
    </div>
  </div>
</div>

