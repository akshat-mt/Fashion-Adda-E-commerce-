<?php
require_once "header.php";
require_once "navbar.php";


//for single product
if (isset($_GET['token'])) {
    $p_id = $_GET['token'];
    $sql = "select * from product where (status=2 or status=1) and id = $p_id";
    if ($res = $conn->query($sql)) {
        if ($res->num_rows) {
            while ($row = $res->fetch_assoc()) {
                $product = $row;
            }

            $sql = "select img from product_img where p_id='$p_id'";
            if ($result = $conn->query($sql)) {
                if ($result->num_rows) {
                    while ($row = $result->fetch_assoc()) {
                        $product_img[] = $row;
                    }
                }
            }
        }
    }
}



//for recommended
    $category=$product['category'];
    $sql = "select * from product where (status=2 or status=1) and category =$category order by rand() limit 4 ";
    if ($res = $conn->query($sql)) {
        if ($res->num_rows) {
            while ($row = $res->fetch_assoc()) {
                $id = $row['id'];
                $recommended[$row['id']] = $row;
                $sql = "select img from product_img where p_id='$id' limit 1";
                if ($result = $conn->query($sql)) {
                    if ($result->num_rows) {
                        $recommended[$row['id']]['img'] = $result->fetch_assoc()['img'];
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
                    <h1>Product Single</h1>
                    <ul>
                        <li><a href="index">Home</a></li>
                        <li>Product Single</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb end -->
<!-- shop start -->

<div class="cv-product-single spacer-top spacer-bottom">
    <div class="container">
        <div class="row">

            <div class="col-lg-12">
                <div class="row">
                    <div class="col-sm-10 " style="margin-bottom:15px">

                        <div class="cv-pro-thumb-img">
                            <img src="<?=$product_img[0]['img']?>" alt="image" class="img-fluid">
                        </div>
                    </div>
                    <?php
                        $product['img'] = $product_img[0]['img'];
                    ?>
                    <!-- <div class="cv-pro-thumb-img">
                            <img src="" alt="image" class="img-fluid">
                        </div> -->

                </div>
                <div class="col-sm-7">
                    <div class="cv-prod-content">
                        <h2 class="cv-price-title"><?= $product['name'] ?></h2>
                        <p class="cv-pdoduct-price"><i class="fas fa-rupee-sign"></i> <?= $product['price'] ?></p>
                    </div>
                    <div class="cv-prod-count">
                        <a href="tel:34567894567890" class="cv-price-cart">
                            Call For Quote
                            <i style="margin-left:0px" class="fa fa-phone" aria-hidden="true"></i>
                        </a>
                        <button style="margin-left:20px"  id="cartBtn-<?=$product['id']?>" class="cv-price-cart" onClick='addToCart(<?=json_encode($product)?>)' >
                            Add to Cart
                            <i style="margin-left:0px" class="fas fa-cart-plus" aria-hidden="true"></i>
                        </button>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="cv-prod-text">

                          </div>
                </div>
            </div>
            <div class="cv-shop-tab" style="margin-bottom:5px">
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <a class="nav-link active" data-toggle="tab" href="#cv-pro-description" role="tab" aria-selected="true">description</a>
                </div>
                <div class="tab-content cv-tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="cv-pro-description">
                        <p><?= html_entity_decode($product['dis']) ?></p>
                    </div>
                    </div>
            </div>
        </div>
    </div>
</div>
                    
    <!-- <div class="cv-shop-title">
        <h2 class="cv-sidebar-title">Similar results</h2>
        <p><span>Total : </span>8</p> -->
    </div> 

    <div class="cv-protection-kit cv-product-two spacer-top-less">
                <div class="container">
                    <div class="cv-heading">
                        <h1>Similar Products</h1>
                    </div>
                    <div class="row">
                        <?php
            if (isset($recommended)) {
                foreach ($recommended as $f) {
            ?>
                        <div class="col-lg-3 col-sm-6">
                            <div class="cv-product-box">
                                <div class="cv-product-img">
                                    <img style="height:200px;width:auto;padding-left:20px;" alt="image" class="img-fluid" src="<?= $f['img'] ?>" />
                                    <div class="cv-product-button">
                                        <a href="product-single?token=<?= $f['id'] ?>" class="cv-btn"><svg
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
                                    </div>
                                </div>
                                <div class="cv-product-data">
                                    <a href="product-single.php?token=<?= $f['id'] ?>"
                                        class="cv-price-title"><?= $f['name'] ?></a>
                                    <div class="cv-cart-box">
                                        <a href="tel:345678945678" class="cv-price-cart">

                                            Call For Quote
                                            <i style="margin-left:2px" class="fa fa-phone" aria-hidden="true"></i>
                                        </a>
                                        <p class="cv-pdoduct-price"><i class="fas fa-rupee-sign"></i> <?= $f['price'] ?>
                                        </p>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                }
            }
            ?>
<?php
require_once 'js_links.php';
require_once "footer.php"

 
?>
</body>

</html>