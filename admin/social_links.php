<?php
    require_once 'header.php';
    require_once 'navbar.php';
    require_once 'left-navbar.php';
    if(isset($_POST['delete']))
        {
            $id=test_input($_POST['delete']);
           
                $sql="delete from social_links where id=$id";
                if($conn->query($sql))
                {
                    $resMember=true;   
                }
                else
                {
                    $errorMember=$conn->error;
                }

           
        }
    if(isset($_POST['add']))
    {
        $icon= $_POST['icon'];
        $preview=$_POST['preview'];
        $platform=$_POST['platform'];
        $link=$_POST['link'];
        $sql="insert into social_links(icon,preview,platform,link) values('$icon','$preview','$platform','$link')";
        if($conn->query($sql))
                    {
                        $resMember=true;   
                    }
                    else
                    {
                        $errorMember=$conn->error;
                    }
    }
    if(isset($_POST['edit']))
    {
        $id=$_POST['eid'];
        $icon= $_POST['eicon'];
        $preview=$_POST['epreview'];
        $platform=$_POST['eplatform'];
        $link=$_POST['elink'];
        $sql="update social_links set icon='$icon',platform='$platform',link='$link' where id='$id'";
        if($conn->query($sql))
                    {
                        $resMember=true;   
                    }
                    else
                    {
                        $errorMember=$conn->error;
                    }
    }
    $sql="select * from social_links";
    $res= $conn->query($sql);
    if($res->num_rows)
    {
        while($row=$res->fetch_assoc())
        {
            $platformList[]=$row;
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Social</title>
</head>
<body>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Social Links
        </h1>
        <ol class="breadcrumb">
            <li>
                <div class="pull-right">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus"></i></button>

                    
                    <a href="" data-toggle="tooltip" title="" class="btn btn-default" data-original-title="Rebuild"><i class="fa fa-refresh"></i></a>
                </div>
            </li>
        </ol>
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
                <table id="example2" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                             
                             
                             <th style="  text-align: center;">Icon</th>
                             <th style="  text-align: center;">Platform</th>
                             <th style="  text-align: center;">Link</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                     <tbody> 
 
                    
                     <?php 
                            if (isset($platformList)) 
                            {
                                $i = 1;
                                foreach ($platformList as $d) 
                                {     
                     ?> 
                                     <tr> 
                                         
                                         
                                         <td style="  text-align: center; " id="icon<?=$i?>"><?=$d['icon']?></td> 
                                         <td style="  text-align: center; " id="platform<?=$i?>"><?=$d['platform']?></td>
                                         <td style="  text-align: center; " id="link<?=$i?>"><?=$d['link']?></td> 
                                        
                                         
                                           <td>
                                             <form method="post">
                                                <button href="" name="" type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModaledit" onclick="editSetValues('<?=$d['id'] ?>',<?=$i?>)" value="">
                                                            <i class="fa fa-edit">Edit</i>
                                                </button>
                                                <button  class="btn btn-danger" type="submit" name="delete" value="<?=$d['id']?>">
                                                            <i class="fa fa-trash-o"></i> Delete
                                                </button>
                                                
                                               

                                            </form>
                                        </td>
                                    </tr>
                                 
                            <?php
                                $i++;
                                    
                                            
                                }
                            }
                            else
                            {
                                ?>
                                <p>NO VALUES INSERTED</p>
                                <?php
                            }
                         ?>
          
                        </tbody>
                                </table>
                                
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
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel"> Add Social Link :</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="post">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                         <label >Name :</label>
                        <input type="text" class="form-control" id="" name="icon" value="">
    
                    </div>
                     
                </div><br>
                <div class="row">
                    <div class="col-sm-6">
                        <label >Link :</label>
                        <input type="text" class="form-control" id="" name="link" value="">
                        
                    </div>
                    <div class="col-sm-6">
                        <label >Platform :</label>
                        <input type="text" class="form-control" id="" name="platform" value="">
                    </div>    
                
                    
                </div><br><br>
             </div>
      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" name="add">ADD</button>
      </div>
      </form>
    </div>
  </div>
</div>
<div class="modal fade" id="exampleModaledit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel">Update Social Link :</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="post">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                         <label >Icon :</label>
                        <input type="text" class="form-control" id="eicon" name="eicon" value="">
    
                    </div>
                    <div class="col-sm-6">
                         <label >Preview :</label>
                        <input type="text" class="form-control" id="" name="preview"></input>

                    </div>
                     
                </div><br>
                <div class="row">
                    <div class="col-sm-6">
                        <label >Link :</label>
                        <input type="text" class="form-control" id="elink" name="elink" value="">
                        
                    </div>
                    <div class="col-sm-6">
                        <label >Platform :</label>
                        <input type="text" class="form-control" id="eplatform" name="eplatform" value="">
                        <input type="hidden" id="eid" name="eid">
                    </div>    
                            
                    
                </div><br><br>
             </div>
      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" name="edit">EDIT</button>
      </div>
      </form>
    </div>
  </div>
</div>
  


</body>
<?php
    require_once 'js-links.php';
?>
</html>
<script>
function editSetValues(id,count)
{
    $("#eid").val(id);
    $("#eicon").val($("#icon"+count).html());
    $("#eplatform").val($("#platform"+count).html());
    $("#elink").val($("#link"+count).html());
   
}

setTimeout(function()
{
    $(".alert").hide();
},3000);

    
</script>
</html>