<?php $this->load->view('include/header'); ?>
<?php $this->load->view('include/menu'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/main.css">

<h1>Dashboard</h1>

<div class="ui stackable grid">
	<div class="eight wide column">
		<div class = "ui segment">
			<h3>Recent Users</h3>

		  	<table class="ui celled table" id="userlist">
		        <thead>
		            <tr>
		                <th>Name</th>
		                <th>Email</th>
		                <th>Created Date</th>
		            </tr>  
		        </thead>

		        <tbody>
		            <?php foreach ($users as $key => $user){?>
		            <tr>
		                <td><?php echo $user['name']?></td>
		                <td><?php echo $user['email']?></td>
		                <td></td>
		            </tr>
		            <?php }?>
		        </tbody>
		    </table>

		</div>
	</div>

	<div class="eight wide column">
	</div>
</div>


