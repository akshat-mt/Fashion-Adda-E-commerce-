<?php
require_once "header.php";
require_once "navbar.php";
$sql = "select * from product where (status=2 or status=1)";
if ($res = $conn->query($sql)) {
    if ($res->num_rows) {
        while ($row = $res->fetch_assoc()) {
            $id = $row['id'];
            $Cart[$row['id']] = $row;
            $sql = "select img from product_img where p_id='$id' limit 1";
            if ($result = $conn->query($sql)) {
                if ($result->num_rows) {
                    $Cart[$row['id']]['img'] = $result->fetch_assoc()['img'];
                }
            }
        }
    }
}
?>

<!-- main header end -->
<!-- breadcrumb start -->
<div class="cv-breadcrumb">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="cv-breadcrumb-box">
                    <h1>Cart</h1>
                    <ul>
                        <li><a href="index">Home</a></li>
                        <li>Cart</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb end -->
<!-- Cart start -->
<div class="cv-Cart" style="margin: bottom 100px;">
    <div class="container">

            <div class="cv-Cart-box">
                <div style="margin-top: 20px;" class="cv-Cart-title">
                    <h2 class="cv-sidebar-title">Showing Cart Results</h2>
                    <!-- <p><span>Total : </span>8</p> -->
                </div>
                <div class="cv-product-all wow fadeIn" data-wow-delay="0.5s">
                    <div class="row">
                    <div class="col-md-4" id="cartbody">

                        <!--  -->
                    </div>
                    </div>
                </div>
            </div>

    </div>
</div>
<!-- related product end -->
<?php
require_once "footer.php";
require_once "js_links.php";
?>

<script>
$(function() {
    retriveCart()
})
</script>