<?php $this->load->view('include/header'); ?>
<?php $this->load->view('include/menu'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/main.css">

<h1>Users</h1>

<div class = "ui segment">
    <table class="ui celled table" id="userlist">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Membership</th>                
                <th>Membership Updated Date</th>
                <th>Membership Expire Date</th>
                <th>Last Login Date</th>
            </tr>  
        </thead>

        <tbody>
            <?php foreach ($users as $key => $user){?>
            <tr>
                <td><?php echo $user['name']?></td>
                <td><?php echo $user['email']?></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <?php }?>
        </tbody>

    </table>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.1.62/jquery.inputmask.bundle.js"></script>

