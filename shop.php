<?php
require_once "header.php";
require_once "navbar.php";
$sql = "select * from product where (status=2 or status=1) order by rand()";
if ($res = $conn->query($sql)) {
    if ($res->num_rows) {
        while ($row = $res->fetch_assoc()) {
            $id = $row['id'];
            $shop[$row['id']] = $row;
            $sql = "select img from product_img where p_id='$id' limit 1";
            if ($result = $conn->query($sql)) {
                if ($result->num_rows) {
                    $shop[$row['id']]['img'] = $result->fetch_assoc()['img'];
                }
            }
        }
    }
}

if(isset($_POST['searchBtn'])){
    $searchItem=$_POST['full_search'];
    $sql = "select * from product where (status=2 or status=1) and name LIKE '%$searchItem%'";
    if ($res = $conn->query($sql)) {
        if ($res->num_rows) {
            $shop=[];
            while ($row = $res->fetch_assoc()) {
                $id = $row['id'];
                $shop[$row['id']] = $row;
                $sql = "select img from product_img where p_id='$id' limit 1";
                if ($result = $conn->query($sql)) {
                    if ($result->num_rows) {
                        $shop[$row['id']]['img'] = $result->fetch_assoc()['img'];
                    }
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
                    <h1>Shop</h1>
                    <ul>
                        <li><a href="index">Home</a></li>
                        <li>Shop</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb end -->
<!-- shop start -->
<div class="cv-shop">
    <div class="container">
        <form method="post" id="form">
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Search Items" aria-label="Recipient's username"
                    name="full_search" id="full_search" aria-describedby="button-addon2">
                <button class="btn btn-outline-secondary" type="submit" id="button-addon2" name="searchBtn"
                    id="searchBtn"><i class="fas fa-search"></i> Search</button>
            </div>
        </form>
        <div class="row">

            <div class="col-lg-12">

                <div class="cv-shop-box">
                    <div class="cv-shop-title">
                        <h2 class="cv-sidebar-title">Showing results</h2>
                        <!-- <p><span>Total : </span>8</p> -->
                    </div>
                    </div>
                    <div class="cv-product-all wow fadeIn" data-wow-delay="0.5s">
                        <div class="">
                            <?php
                            if (isset($shop)) {
                                foreach ($shop as $s) {
                            ?>
                            <div class="cv-product-box cv-product-item cv-hand">
                                <div class="cv-product-img">
                                    <img style="height:200px;width:auto;padding-left:20px;" src="<?=$s['img']?>"
                                        alt="image" class="img-fluid" />
                                    <div class="cv-product-button">
                                        <a href="product-single?token=<?=$s['id']?>" class="cv-btn"><svg
                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 461.312 461.312">
                                                <g>
                                                    <path d="M230.656,156.416c-40.96,0-74.24,33.28-74.24,74.24s33.28,74.24,74.24,74.24s74.24-33.28,74.24-74.24
                                                        S271.616,156.416,230.656,156.416z M225.024,208.64c-9.216,0-16.896,7.68-16.896,16.896h-24.576
                                                        c0.512-23.04,18.944-41.472,41.472-41.472V208.64z"></path>
                                                </g>
                                                <g>
                                                    <path
                                                        d="M455.936,215.296c-25.088-31.232-114.688-133.12-225.28-133.12S30.464,184.064,5.376,215.296
                                                        c-7.168,8.704-7.168,21.504,0,30.72c25.088,31.232,114.688,133.12,225.28,133.12s200.192-101.888,225.28-133.12
                                                        C463.104,237.312,463.104,224.512,455.936,215.296z M230.656,338.176c-59.392,0-107.52-48.128-107.52-107.52
                                                        s48.128-107.52,107.52-107.52s107.52,48.128,107.52,107.52S290.048,338.176,230.656,338.176z">
                                                    </path>
                                                </g>
                                            </svg> View detail</a>
                                        <a href="tel:345678945678" class="cv-btn">
                                            <i style="margin-left:0px" class="fa fa-phone" aria-hidden="true"></i>
                                            Call for Quote</a>
                                    </div>
                                </div>
                                <div class="cv-product-data">
                                    <a href="product-single?token=<?=$s['id']?>" class="cv-price-title"><?=$s['name']?></a>
                                    <p class="cv-pdoduct-price"><i class="fas fa-rupee-sign"></i> <?=$s['price']?></p>

                                </div>
                            </div>
                            <?php
                                }
                            }
                            ?>
                            <!--  -->
                        </div>
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
