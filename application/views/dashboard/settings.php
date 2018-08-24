<?php $this->load->view('include/header'); ?>
<?php $this->load->view('include/menu'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/main.css">

<h1>Settings</h1>

<div class = "ui segment">
    <table class="ui celled table" id="userlist">
        <thead>
            <tr>
                <th>ZIP Code</th>
                <th>Rate</th>
                <th></th>                
                <th>ZIP Code</th>
                <th>Rate</th>
                <th></th>                
                <th>ZIP Code</th>
                <th>Rate</th>
                <th></th> 
            </tr>  
        </thead>

        <tbody>
            <?php for($i = 0; $i < count($zipcodes); $i=$i+3){
                $zipcode1 = $zipcodes[$i];
                if ($i < count($zipcodes)-1){
                  $zipcode2 = $zipcodes[$i+1];  
                }
                if ($i < count($zipcodes)-2){
                  $zipcode3 = $zipcodes[$i+2];  
                }

                ?>
                <tr>
                    <td><?php echo $zipcode1['zipcode']?></td>
                    <td><?php echo $zipcode1['rate']?></td>
                    <td></td>

                    <?php if ($i < count($zipcodes)-1){?>
                        <td><?php echo $zipcode2['zipcode']?></td>
                        <td><?php echo $zipcode2['rate']?></td>
                        <td></td>
                    <?php }else{?>
                        <td></td>
                        <td></td>
                        <td></td>
                    <?php }?>


                    <?php if ($i < count($zipcodes)-2){?>
                        <td><?php echo $zipcode3['zipcode']?></td>
                        <td><?php echo $zipcode3['rate']?></td>
                        <td></td>
                    <?php }else{?>
                        <td></td>
                        <td></td>
                        <td></td>
                    <?php }?>

                </tr>
            <?php }?>
        </tbody>
    </table>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.1.62/jquery.inputmask.bundle.js"></script>

<script>
    $(function() {
        $('#userlist').DataTable( {
            "lengthMenu": [[10]],
        });
    });
</script>
