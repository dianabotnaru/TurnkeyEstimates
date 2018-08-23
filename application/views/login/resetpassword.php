<!DOCTYPE html>
<html>
<head>
<title>Pure Chiro Notes</title>
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

    img {
        margin-bottom: 30px;
    }

</style>
</head>
<body>
<div class="ui middle aligned center aligned grid">
  <div class="column">
    <img src="<?php echo base_url();?>assets/images/logo.png" class="image">
    <form class="ui large form" name="login_frm" id="login_frm" method="post" action="<?php echo base_url(); ?>Forgotpassword/resetPassword/<?php echo $this->userId; ?> ">
      <div class="ui segment">

        <div class="field">
          <div class="ui left icon input">
            <i class="lock icon"></i>
            <input type="password" name="password" value="" placeholder="Password">
          </div>
          <?php echo form_error('password'); ?>
        </div>

        <div class="field">
          <div class="ui left icon input">
            <i class="lock icon"></i>
            <input type="password" name="confirmpassword" value="" placeholder="Confirm password">
          </div>
          <?php echo form_error('confirmpassword'); ?>
        </div>

        <input type="submit" name="login_btn" id="submit_btn" value="Reset Password" class="ui fluid large submit button">
      </div>     

    </form>
  </div>
</div>

<?php $this->load->view('requiredjs'); ?>

<script type="text/javascript">

    function commonSubmit(formID){ 
        $.LoadingOverlay("show");
        return true;  
    }
    
    var status = '<?php echo $status; ?>';
    if(status == 'true'){
      alert('<?php echo $message; ?>');
      window.location.href = "<?php echo base_url(); ?>login";
    }

</script>
