<?php
require_once "lib/core.php";
$sql = 'select * from web_config';
if ($res = $conn->query($sql)) {
  if ($res->num_rows) {
    $contact = $res->fetch_assoc();
  }
}
?>
<!DOCTYPE html>

<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fashion ADDA - Everything you need</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/all.min.css">
    <link rel="stylesheet" href="assets/css/font.css">
    <link rel="stylesheet" href="assets/css/swiper.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="shortcut icon" href="assets/images/fav.png" type="image/x-icon">
</head>

<body>
<!-- preloader start -->
<!-- <div class="cv-ellipsis">
    <div class="cv-preloader">
        <div></div>
    </div>
</div> -->
<!-- preloader end -->
<!-- main wrapper start -->
<div class="cv-main-wrapper">