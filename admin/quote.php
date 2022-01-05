<?php
require_once 'header.php';
require_once 'navbar.php';
require_once 'left-navbar.php';
$sql="select * from quote";
    $result =  $conn->query($sql);
    if($result->num_rows)
    {
        while($row = $result->fetch_assoc())
        {
            $quote[] = $row;
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
            <h1>Quote
            </h1>
        </section>

        <!-- Main content -->
        <br>
        <section class="content">
        <div class="box">
              <div class="box-body">
                <table id="example2" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                             
                             <th style="  text-align: center;">Name</th>
                             <th style="  text-align: center;">Email</th>
                             <th style="  text-align: center;">Subject</th>
                             <th style="  text-align: center;">Message</th>
                        </tr>
                    </thead>
                     <tbody> 
 
                    
                     <?php 
                            if (isset($quote)) 
                            {
                                foreach ($quote as $q) 
                                {     
                                    ?> 
                                     <tr> 
                                         
                                         
                                         <td style="  text-align: center; " id=""><?=$q['name'];?></td> 
                                         <td style="  text-align: center; " id=""><?=$q['email'];?></td>
                                         <td style="  text-align: center; " id=""><?=$q['subject'];?></td> 
                                         <td style="  text-align: center; " id=""><?=$q['msg'];?></td> 
                                    </tr>
                                 
                            <?php
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