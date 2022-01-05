<?php
    require_once 'header.php';
    require_once 'navbar.php';
    require_once 'left-navbar.php';
    if(isset($_POST["about"]))
    {
        $email=$_POST['email'];
        $phn=$_POST['phn'];
        $ad=$_POST['address'];
        $loc=$_POST['location'];
        $msg=$_POST['message'];
        $img=upload_image($_FILES);
        if($img!="err")
        {
        $sql="update web_config set email='$email',phn='$phn',address='$ad',location='$loc',logo='$website_link/admin/uploads/$img',message='$msg'"; 
        }
        else
        {
            $sql="update web_config set email='$email',phn='$phn',address='$ad',location='$loc',message='$msg'";
        } 
        if($conn->query($sql))
                {
                    $resMember=true;   
                }
                else
                {
                    $errorMember=$conn->error;
                }
    }
    $sql="select * from web_config where id=1";
    if($res = $conn->query($sql))
    {
        if($res->num_rows)
        {
             $about=$res->fetch_assoc();
        }

    }
    

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About</title>
    <style>
    .box-body
    {
	overflow: auto!important;
    }
</style>
</head>
<body>
<div class="content-wrapper">
    <section class="content-header">
        <h1>About
        </h1>
    </section><br>
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
                            <?php
                                if(isset($about)) 
                                {     
                                    ?>
                                <div class="col-sm-6"><br>
                                    <label >Email :</label>
                                    <input type="email" class="form-control" id="" name="email" value="<?=$about['email']?>">
    
                                </div>
                                 <div class="col-sm-6"><br>
                                    <label >Contact Number :</label>
                                    <input type="text" class="form-control" id="" name="phn" value="<?=$about['phn']?>">
                        
                                </div>
                                <div class="col-sm-6"><br>
                                    <label >Address :</label>
                                    <input type="text" class="form-control" id="" name="address" value="<?=$about['address']?>">
                        
                                </div>
                                <div class="col-sm-6"><br>
                                    <label >Location :</label>
                                    <input type="text" class="form-control" id="" name="location"value="<?=$about['location']?>">
                        
                                </div><br>
                                <div class="col-sm-12"><br>
                                <label>Message from Admin :</label><br>
                                <textarea  style="width: 100%;height:120px;resize:none"name="message"><?=$about['message']?></textarea>
                                </div>
                                <div class="col-sm-12"><br>
                                <label>Add Logo :</label><br>
                                <input type="file" class="btn btn-success" name="images"></input>
                                </div><br><br>
                                
                                <div class="row" style="margin-bottom:20px"><br> 
                                
                                
                                
                                    <div class="col-md-4" id="file<?=$counter?>">
                                        <div class="col-md-8" style="margin-top:15px">
                                            <a href="<?=$about['logo']?>" target="_blank"><img src="<?=$about['logo']?>" width="100px" height="100px"/></a>
                                        </div>
                                    </div>   
                                </div>
                                <div class="col-sm-12"><br>
                                <center><button type="submit" class="btn btn-lg btn-primary" name="about">DONE</button></center>
                                </div><br>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                    </form>
             </div>
        </div><br><br>
    </div><br><br>
   

</body>
<?php
    require_once 'js-links.php';
?>
</html>
<script>


setTimeout(function()
{
    $(".alert").hide();
},3000);

    
</script>