<?php
    require_once 'header.php';
    require_once 'navbar.php';
    require_once 'left-navbar.php';
 
    $id=$_SESSION['id'];
    
        if(isset($_POST['add']) && isset($_POST['ename']) && isset($_POST['edis']) && isset($_POST['eprice']))
        {
            // $id=$_GET['token'];
            $name=$_POST['ename'];
            $dis=$_POST['edis'];
            $price=$_POST['eprice'];
            $code=$_POST['ecode'];
            $category=$_POST['category'];
            $sql="insert into  product(name,price,dis,status,code,category) values ('$name','$price','$dis',1,$code,'$category')";
            if($conn->query($sql))
                {
                    $insert_id = $conn->insert_id;
                    if(upload_images2($_FILES,$conn,"product_img","p_id","img",$insert_id,"projectFile",$website_link."/admin/uploads"))
                    {
                        $resMember = "all_true";
                    }else
                    {
                        $resMember = "files_left";
                    }
                     
                }
               else
            {
                $errorMember=true;
            }
        }
        
             
            if(isset($_POST['edit']))
            {
                $id=$_GET['token'];
                $name=$_POST['ename'];
                $dis=$_POST['edis'];
                $price=$_POST['eprice'];
                $code=$_POST['ecode'];
                $sql="update product set name='$name',price='$price',dis='$dis',code='$code' where id='$id'";
                if($conn->query($sql))
                {
                    
                    if(upload_images2($_FILES,$conn,"product_img","p_id","img",$id,"projectFile",$website_link."/admin/uploads"))
                    {
                        $resMember = "all_true";
                    }else
                    {
                        $resMember = "files_left";
                    }
                }
                else
                {
                    $errorMember=true;
                }
            }
                
            
        
            if(isset($_GET['token']))
            {
                $id=$_GET['token'];
                $sql="select * from product where id='$id'";
                $result =  $conn->query($sql);
                if($result->num_rows)
                {
                    $row = $result->fetch_assoc();
                    
                    $productList = $row;
                    
    
                }

                $sql = "SELECT * from product_img where p_id=$id";
                if($result = $conn->query($sql))
                {
                    if($result->num_rows)
                    {
                        while($row = $result->fetch_assoc())
                        {
                            $product_img[]=$row;
                        }
                         
                    }
                     
                }else
                {
                    echo $conn->error;
                }
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
            Clothes and shoes
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
                <div class="row">
                    <div class="col-sm-6"><br>
                         <label >Cloth type :</label>
                        <input type="text" class="form-control" id="" name="ename" value="<?=$productList['name']?>">
    
                    </div>
                     <div class="col-sm-6"><br>
                        <label >Price :</label>
                        <input type="text" class="form-control" id="" name="eprice" value="<?=$productList['price']?>">
                        
                    </div>
                    <div class="col-sm-6"><br>
                        <label >Product Code :</label>
                        <input type="text" class="form-control" id="" name="ecode" value="<?=$productList['code']?>">
                        
                    </div>
                    <div class="col-sm-6"><br>
                        <label >Category :</label>
                        <input type="number" class="form-control" id="" name="category" value="<?=$productList['category']?>">
                        
                    </div>
                </div><br>
                <div class="row">
                    <div class="col-sm-12"><br>
                         <label >Description :</label>
                        <textarea type="text" class="form-control" id="" name="edis"><?=$productList['dis']?></textarea>

                    </div>
                </div><br><br>
                
                            <div class="form-group">
                                <label>Add Product Images :</label><br>
                                <button type="button" class="btn btn-success" onclick="addFilesField()"><i class="fa fa-plus"></i></button>
                            </div> 
                
                <div class="row" style="margin-bottom:20px"> 
                        
                        <?php
                            if(isset($product_img)) 
                            {
                                $counter=0;
                                foreach($product_img as $file)
                                { 
                                      
                                    ?>
                                    <div class="col-md-2" id="file<?=$counter?>">
                                        <div class="col-md-8">
                                            <a href="<?=$file['img']?>" target="_blank"><img src="<?=$file['img']?>" width="100px" height="100px"/></a>
                                        </div>
                                        <div class="col-md-1">
                                            <button type="button" class="btn btn-danger" onclick="deleteFile(<?=$file['id']?>,'file<?=$counter?>')"><i class="fa fa-trash"></i></button>
                                        </div>
                                    </div>
                                    <?php
                                    
                                }
                            }
                        
                        ?>
                              
                    
                </div>
                <div class="row">
                        <div class="col-md-4" id="filesDiv"> 
                                 
                                
                        </div>
                </div>

                <br><br>
                    <?php
                        if(isset($productList))
                        {
                            ?>
                                 <center><button type="submit" class="btn btn-lg btn-primary" name="edit">SAVE</button></center>
                            <?php
                        }else
                        {
                            ?>
                            <center><button type="submit" class="btn btn-lg btn-primary" name="add">Add</button></center>
                            <?php
                        }
                    ?>
                 
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



    var counter=1;
    function addFilesField()
    {
        
        var inhtml  = `<div class="row" style="margin-top:20px" >    
                            <div class="col-md-10">
                                <input   type="file" id='projectfile${counter}' name="projectFile[]" class="form-control"/>
                            </div> 
                            <div class="col-md-2">
                                <button type="button" class="btn btn-danger" onclick="removeField('projectfile${counter}')"><i class="fa fa-trash"></i></button>
                            </div> 
                        </div>`;
        $("#filesDiv").append(inhtml);
        counter++;

    }

    function removeField(id)
    {
            $("#"+id).parent().parent().remove();
            
    }  
    function deleteFile(id,divId)
    {
        $.ajax({
            url:"files_ajax.php",
            type:"POST",
            data:{
                deleteFile:id
            },
            success:function(data)
            {
            
                if(data.trim()=="ok")
                {
                    $("#"+divId).remove();  
                }else
                {
                    console.log(data);
                }
            },
            error:function()
            {

            }
        
        })
    } 
</script>
 
