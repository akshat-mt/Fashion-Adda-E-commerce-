<?php
    require_once 'header.php';
    require_once 'navbar.php';
    require_once 'left-navbar.php';
    if(isset($_POST['add']))
    {
        print_r($_FILES);
        print_r($_POST);

    }
?>
<style>
    .box-body{
	overflow: auto!important;

}
</style>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Medical Equipments
        </h1>
         
    </section>

    <!-- Main content -->
      <br>
    <section class="content">
        <?php
            if(isset($resMember))
            {
        ?>
                <div class="alert alert-success"><strong>Success! </strong> your request successfully updated. </div> 
        <?php
            }
            else if(isset($errorMember))
            {
        ?>
                <div class="alert alert-danger"><strong>Error! </strong><?=$errorMember?></div> 
        <?php
                
            }
        ?>
      
            <div class="box">
              <div class="box-body">
              <form method="post" enctype="multipart/form-data">
            <div class="container-fluid">
            <input name="img" type="file"/>
            <button type="submit" name="add">Add</button>
            </div>
            </form>             
                       
                </div>
                <!-- /.box-footer-->
         </div>    
      <!-- /.box -->
    </section>
    <!-- /.content -->
</div>


  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->       
  <div class="control-sidebar-bg"></div>

  

<?php
    require_once 'js-links.php';
?>
<script>
    setTimeout(function()
    {
        $(".alert").hide();
    },3000);
</script>