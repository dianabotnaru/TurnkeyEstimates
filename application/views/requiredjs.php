<script
  src="https://code.jquery.com/jquery-3.2.1.min.js"
  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
  crossorigin="anonymous"></script>
<script
  src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"
  integrity="sha256-T0Vest3yCU7pafRw9r+settMBX6JkKN06dqBnpQ8d30="
  crossorigin="anonymous"></script>

<script src="<?php echo base_url(); ?>assets/js/semantic.js"></script>
<script src="https://cdn.rawgit.com/mdehoog/Semantic-UI-Calendar/76959c6f7d33a527b49be76789e984a0a407350b/dist/calendar.min.js"></script>

<script src="<?php echo base_url(); ?>assets/js/date.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/dataTables.semanticui.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/loadingJs.js"></script>
<script>

$("input:text").click(function() {
  $(this).parent().find("input:file").click();
});

$('input:file')
  .on('change', function(e) {
    var name = e.target.files[0].name;
    $('input:text', $(e.target).parent()).val(name);
  });

  $("#cancel").on('click', function(){
      $(".modal ").modal({
          closable: true
      });
  });

  $(".cancel").on('click', function(){
      /*$(".modal ").modal({
          closable: true
      });*/
      $(".modal").modal('hide');
  });
</script>