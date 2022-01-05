<?php
require_once "lib/core.php";


//for contact
if(isset($_POST['full_name']) && !empty($_POST['full_name']) && isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['subject']) && !empty($_POST['subject']) && isset($_POST['message']) && !empty($_POST['message']))
{
    $name=$_POST['full_name'];
    $email=$_POST['email'];
    $sub=$_POST['subject'];
    $msg=$_POST['message'];
    $sql="insert into quote(name,email,subject,msg) values ('$name','$email','$sub','$msg')";
    if($conn->query($sql))
    {
        echo "ok";
    }
    else
    {
        echo $conn->error;
    }
}



//for cart
if(isset($_POST['full_search']) && !empty($_POST['full_search']))
{
    $name=$_POST['full_search'];
    $sql="insert into quote(name,email,subject,msg) values ('$name','$email','$sub','$msg')";
    if($conn->query($sql))
    {
        echo "ok";
    }
    else
    {
        echo $conn->error;
    }
}
?>