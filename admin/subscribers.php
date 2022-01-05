<?php
require_once 'header.php';
require_once 'navbar.php';
require_once 'left-navbar.php';
$sql="select * from subscribe";
    $result =  $conn->query($sql);
    if($result->num_rows)
    {
        while($row = $result->fetch_assoc())
        {
            $sub[] = $row;
        }
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>quote</title>
</head>

<body>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>Subscribers
            </h1>
        </section>

        <!-- Main content -->
        <br>
        <section class="content">
        <div class="box">
              <div class="box-body">
                <table id="example2" class="table table-bordered table-hover ">
                    <thead class="thead-dark">
                        <tr>
                             
                             <th style="  text-align: center;">S.No</th>
                             <th style="  text-align: center;">Email</th>
                        </tr>
                    </thead>
                     <tbody> 
 
                    
                     <?php 
                     
                            if (isset($sub)) 
                            {
                                $i=1;
                                foreach ($sub as $s) 
                                {     
                                    ?> 
                                     <tr> 
                                         
                                         
                                         <td style="  text-align: center; " id=""><?=$i?></td> 
                                         <td style="  text-align: center; " id=""><?=$s['email'];?></td>
                                    </tr>
                                 
                            <?php
                                $i++;
                               }
                               
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
</body>
<?php
require_once 'js-links.php';
?>

</html>