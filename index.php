<?php
require_once "header.php";
$sql = "select * from product where status=2";
if ($res = $conn->query($sql)) {
    if ($res->num_rows) {
        while ($row = $res->fetch_assoc()) {
            $id = $row['id'];
            $featured[$row['id']] = $row;
            $sql = "select img from product_img where p_id='$id' limit 1";
            if ($result = $conn->query($sql)) {
                if ($result->num_rows) {
                    $featured[$row['id']]['img'] = $result->fetch_assoc()['img'];
                }
            }   
        }
    }
}

$sql = "select * from product where new=1";
if ($res = $conn->query($sql)) {
    if ($res->num_rows) {
        while ($row = $res->fetch_assoc()) {
            $id = $row['id'];
            $new[$row['id']] = $row;
            $sql = "select img from product_img where p_id='$id' limit 1";
            if ($result = $conn->query($sql)) {
                if ($result->num_rows) {
                    $new[$row['id']]['img'] = $result->fetch_assoc()['img'];
                }
            }
        }
    }
}
?>

<!-- main header start -->
<?php
require 'navbar.php';
?>
<!-- main header end -->
<!-- banner start -->
<div class="cv-banner">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <div class="cv-banner-two-text">

                    <h1 style="margin-bottom:20px;">Latest best quality clothing and shoes</h1>
                    <p>We believe and work in direction to provide the best quality product to our customers and customer satisfaction has always been
                        our top priority and also one of our strong suit.</p>
                        <p>"Fashion is part of the daily air and it changes all the time, with all the events.
                         You can even see the approaching of a revolution in clothes. 
                         You can see and feel everything in clothes."  —Diana Vreeland</p>
                    </p>
                    <a style="width: 100%;" class="cv-btn" href="shop">Shop now</a>
                </div>
            </div>
            <div class="col-md-5">
                <div class="cv-banner-img">
                    <img src="assets/images/model.jpg" alt="images" class="img-fluid" style="border-radius: 10%;"/>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- banner end -->
<!-- feature start -->

<div class="cv-feature spacer-top">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="cv-feature-box">
                    <div class="cv-feature-img">
                        <svg viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="m59 54.141v-9.141h-5v-6h-12v-11h-7l-10.506-6.304c.237-3.338-1.585-6.518-4.583-8.012 2.376-.799 4.089-3.039 4.089-5.684 0-.369-.038-.728-.102-1.078l2.357-.506c1.08-.232 1.767-1.295 1.535-2.375l-4.584.985c-1.095-1.913-3.208-3.168-5.604-3.013-2.913.188-5.341 2.568-5.581 5.477-.245 2.97 1.676 5.528 4.353 6.281-2.503 1.56-3.942 4.468-3.538 7.498l1.164 8.731-1 12-6 19v1h7l-1-3h-.333l2.685-8.054.648 11.054h7l-1-3h-1.871l1.871-29 1.485-4.419 11.515 5.419h5v24.38c-.615.703-1 1.613-1 2.62 0 2.209 1.791 4 4 4s4-1.791 4-4c0-.732-.211-1.41-.555-2h8.109c-.343.59-.554 1.268-.554 2 0 2.209 1.791 4 4 4s4-1.791 4-4c0-1.862-1.278-3.413-3-3.859zm-16 4.859c-.552 0-1-.448-1-1s.448-1 1-1 1 .448 1 1-.448 1-1 1zm5-16h-4v-2h4zm10 16c-.552 0-1-.448-1-1s.448-1 1-1 1 .448 1 1-.448 1-1 1z" />
                        </svg>
                    </div>
                    <div class="cv-feature-text">
                        <h3>Free Shipping</h3>
                        <p>When order is over 1000</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="cv-feature-box">
                    <div class="cv-feature-img">
                        <svg viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg">
                            <g>
                                <path d="m0 141.356h422v30h-422z" />
                                <path d="m422 102.356c0-24.813-20.187-45-45-45h-332c-24.813 0-45 20.187-45 45v9h422z" />
                                <path
                                    d="m421 242.643c.334 0 .666.01 1 .013v-41.299h-422v123c0 24.813 20.187 45 45 45h255.138c-.089-1.894-.139-3.798-.139-5.713.001-66.721 54.281-121.001 121.001-121.001zm-346-11.286h37.5c8.284 0 15 6.716 15 15s-6.716 15-15 15h-37.5c-8.284 0-15-6.716-15-15s6.716-15 15-15zm85 77.999h-85c-8.284 0-15-6.716-15-15s6.716-15 15-15h85c8.284 0 15 6.716 15 15s-6.716 15-15 15z" />
                                <path
                                    d="m421 272.643c-50.178 0-91 40.823-91 91 0 50.178 40.823 91 91 91s91-40.823 91-91-40.823-91-91-91zm43.607 83.277-36 36c-2.929 2.929-6.768 4.394-10.606 4.394s-7.678-1.464-10.606-4.394l-18.5-18.5c-5.858-5.858-5.858-15.355 0-21.213 5.857-5.858 15.355-5.858 21.213 0l7.894 7.894 25.394-25.394c5.857-5.858 15.355-5.858 21.213 0 5.855 5.858 5.855 15.355-.002 21.213z" />
                            </g>
                        </svg>
                    </div>
                    <div class="cv-feature-text">
                        <h3>Payment method</h3>
                        <p>100% safe and secure</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="cv-feature-box">
                    <div class="cv-feature-img">
                        <svg viewBox="0 0 192 192" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="m96 16a80.2 80.2 0 0 1 64 32h-8v16h24a8 8 0 0 0 7.59-5.47l8-24-15.18-5.06-3.175 9.53a95.994 95.994 0 0 0 -173.235 57h16a80.091 80.091 0 0 1 80-80z" />
                            <path
                                d="m176 96a80 80 0 0 1 -144 48h8v-16h-24a8 8 0 0 0 -7.59 5.47l-8 24 15.18 5.06 3.175-9.53a95.994 95.994 0 0 0 173.235-57z" />
                            <path
                                d="m40 96a56 56 0 1 0 56-56 56.063 56.063 0 0 0 -56 56zm80-32v16h-28a4 4 0 0 0 0 8h8a20 20 0 0 1 4 39.6v8.4h-16v-8h-16v-16h28a4 4 0 0 0 0-8h-8a20 20 0 0 1 -4-39.6v-8.4h16v8z" />
                        </svg>
                    </div>
                    <div class="cv-feature-text">
                        <h3>15 days return</h3>
                        <p>Easy return policies</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="cv-feature-box">
                    <div class="cv-feature-img">
                        <svg viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="m512 346.5c0-63.535156-36.449219-120.238281-91.039062-147.820312-1.695313 121.820312-100.460938 220.585937-222.28125 222.28125 27.582031 54.589843 84.285156 91.039062 147.820312 91.039062 29.789062 0 58.757812-7.933594 84.210938-23.007812l80.566406 22.285156-22.285156-80.566406c15.074218-25.453126 23.007812-54.421876 23.007812-84.210938zm0 0" />
                            <path
                                d="m391 195.5c0-107.800781-87.699219-195.5-195.5-195.5s-195.5 87.699219-195.5 195.5c0 35.132812 9.351562 69.339844 27.109375 99.371094l-26.390625 95.40625 95.410156-26.386719c30.03125 17.757813 64.238282 27.109375 99.371094 27.109375 107.800781 0 195.5-87.699219 195.5-195.5zm-225.5-45.5h-30c0-33.085938 26.914062-60 60-60s60 26.914062 60 60c0 16.792969-7.109375 32.933594-19.511719 44.277344l-25.488281 23.328125v23.394531h-30v-36.605469l35.234375-32.25c6.296875-5.761719 9.765625-13.625 9.765625-22.144531 0-16.542969-13.457031-30-30-30s-30 13.457031-30 30zm15 121h30v30h-30zm0 0" />
                        </svg>
                    </div>
                    <div class="cv-feature-text">
                        <h3>Geniune Product</h3>
                        <p>Verified by our experts.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




<div class="cv-protection-kit cv-product-two spacer-top-less">
                <div class="container">
                    <div class="cv-heading">
                        <h1>New Products</h1>
                    </div>
                    <div class="row">
                        <?php
            if (isset($new)) {
                foreach ($new as $f) {
            ?>
                        <div class="col-lg-3 col-sm-6">
                            <div class="cv-product-box">
                                <div class="cv-product-img">
                                    <img style="height:200px;width:100%;" alt="image"
                                        class="img-fluid" src="<?= $f['img'] ?>" />
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

            <div class="cv-protection-kit cv-product-two spacer-top-less">
                <div class="container">
                    <div class="cv-heading">
                        <h1>Featured Products</h1>
                    </div>
                    <div class="row">
                        <?php
            if (isset($featured)) {
                foreach ($featured as $f) {
            ?>
                        <div class="col-lg-3 col-sm-6">
                            <div class="cv-product-box">
                                <div class="cv-product-img">
                                    <img style="height:200px;width:100%;" alt="image"
                                        class="img-fluid" src="<?= $f['img'] ?>" />
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
                                        <a href="tel:7355957618" class="cv-price-cart">

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

            <a style="width: 100%;" class="cv-btn" href="shop">Go to Shop </a>
                    </div>
                </div>
            </div>
            <!-- </div>
    </div>
</div> -->
            <!-- main wrapper end -->
            <?php
require_once 'footer.php';
require_once "js_links.php";
?>