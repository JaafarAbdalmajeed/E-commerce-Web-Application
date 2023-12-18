<?php include('includes/connect.php'); ?>
<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
    <!-- Mobile Specific Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon-->
    <link rel="shortcut icon" href="img/fav.png">
    <!-- Author Meta -->
    <meta name="author" content="CodePixar">
    <!-- Meta Description -->
    <meta name="description" content="">
    <!-- Meta Keyword -->
    <meta name="keywords" content="">
    <!-- meta character set -->
    <meta charset="UTF-8">
    <!-- Site Title -->
    <title>Karma Shop</title>

    <!--
            CSS
            ============================================= -->
    <link rel="stylesheet" href="css/linearicons.css">
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="css/themify-icons.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/nice-select.css">
    <link rel="stylesheet" href="css/nouislider.min.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/main.css">
</head>

<body>

    <?php include 'header.php'?>

    <!-- Start Banner Area -->
    <section class="banner-area organic-breadcrumb">
        <div class="container">
            <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
                <div class="col-first">
                    <h1>Checkout</h1>
                    <nav class="d-flex align-items-center">
                        <a href="index.php">Home<span class="lnr lnr-arrow-right"></span></a>
                        <a href="single-product.html">Checkout</a>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- End Banner Area -->

    <!--================Checkout Area =================-->
    <section class="checkout_area section_gap">
        <div class="container">
            <?php 
            // echo $_SESSION['customer_id'];
            if(!isset($_SESSION['customer_id'])){
            ?>
            <div class="returning_customer">
                <div class="check_title">
                    <h2>Returning Customer? <a href="#">Click here to login</a></h2>
                </div>
                <p>If you have shopped with us before, please enter your details in the boxes below. If you are a new
                    customer, please proceed to the Billing & Shipping section.</p>



                <form class="row contact_form" action="checkoutlog.php" method="post" novalidate="novalidate">
                    <div class="col-md-6 form-group p_star">
                        <input type="text" class="form-control" id="name" name="email" placeholder="Email">
                        <!--<span class="placeholder" data-placeholder=" Email"></span>-->
                    </div>
                    <div class="col-md-6 form-group p_star">
                        <input type="password" class="form-control" id="password" name="password"
                            placeholder="Password">
                        <!-- <span class="placeholder"  data-placeholder="Password"></span>-->
                    </div>
                    <div class="col-md-12 form-group">
                        <?php if(isset($_GET['error'])){?>
                        <p> <?php echo $_GET['error'];?></p>
                        <?php }
                            ?>
                        <button type="submit" value="submit" class="primary-btn" name="submit">login</button>
                        <div class="creat_account">
                            <input type="checkbox" id="f-option" name="selector">
                            <label for="f-option">Remember me</label>
                        </div>
                        <a class="lost_pass" href="#">Lost your password?</a>
                    </div>
                </form>
            </div>
            <?php } ?>
            <!-- <div class="cupon_area">
                <div class="check_title">
                    <h2>Have a coupon? <a href="#">Click here to enter your code</a></h2>
                </div>
                <input type="text" placeholder="Enter coupon code">
                <a class="tp_btn" href="#">Apply Coupon</a>
            </div> -->
            <div class="billing_details">
                <div class="row">
                    <div class="col-lg-8">
                        <h3>Billing Details</h3>
                        <form class="row contact_form" action="checkoutsign.php" method="post" novalidate="novalidate">
                            <div class="col-md-12 form-group p_star">
                                <input type="text" class="form-control" id="first" name="name" placeholder="Full name"
                                    value="<?php if(isset($_SESSION['customer_id'])) { echo $database->getColumn('customers','name',$_SESSION['customer_id']);}else{echo "";}?>">
                                <!-- <span class="placeholder" data-placeholder="First name"></span>-->
                            </div>
                            <!-- <div class="col-md-6 form-group p_star">
                                <input type="text" class="form-control" id="last" name="lname" placeholder="Last name"> -->
                            <!--  <span class="placeholder" data-placeholder="Last name"></span>-->
                            <!-- </div> -->
                            <div class="col-md-12 form-group">
                                <input type="text" class="form-control" id="company" name="email"
                                    placeholder="Email Address"
                                    value="<?php if(isset($_SESSION['customer_id'])) { echo $database->getColumn('customers','email',$_SESSION['customer_id']);}else{echo "";}?>">
                            </div>
                            <div class="col-md-6 form-group p_star">
                                <input type="text" class="form-control" id="number" name="phone"
                                    placeholder="Phone number"
                                    value="<?php if(isset($_SESSION['customer_id'])) { echo $database->getColumn('customers','phone',$_SESSION['customer_id']);}else{echo "";}?>">
                                <!-- <span class="placeholder" data-placeholder="Phone number"></span>-->
                            </div>
                            <div class="col-md-12 form-group p_star">
                                <input type="text" class="form-control" id="add1" name="address"
                                    value="<?php if(isset($_SESSION['customer_id'])) { echo $database->getColumn('customers','address',$_SESSION['customer_id']);}else{echo "";}?>">
                                <span class="placeholder" data-placeholder="Address line 01"></span>
                            </div>
                            <?php 
            // echo $_SESSION['customer_id'];
            if(!isset($_SESSION['customer_id'])){
            ?>
                            <div class="col-md-6 form-group p_star">
                                <input type="text" class="form-control" id="email" name="password"
                                    placeholder="Password">
                                <!--<span class="placeholder" data-placeholder="Password"></span>-->
                            </div>
                            <!-- <div class="col-md-12 form-group p_star">
                                <select class="country_select">
                                    <option value="1">Country</option>
                                    <option value="2">Country</option>
                                    <option value="4">Country</option>
                                </select>
                            </div>
                           
                            <div class="col-md-12 form-group p_star">
                                <input type="text" class="form-control" id="add2" name="add2">
                                <span class="placeholder" data-placeholder="Address line 02"></span>
                            </div>
                            <div class="col-md-12 form-group p_star">
                                <input type="text" class="form-control" id="city" name="city">
                                <span class="placeholder" data-placeholder="Town/City"></span>
                            </div>-->

                            <!-- <div class="col-md-12 form-group p_star">
                                <select class="country_select"name="address" >
                                    <option value="Amman" >Amman</option>
                                    <option value="Aqaba" >Aqaba</option>
                                    <option value="Ajlon" >Jordan</option>
                                </select>
                            </div> -->
                            <div class="col-md-12 form-group">
                                <input type="text" class="form-control" id="zip" name="confirm_password"
                                    placeholder="conferm password">
                            </div>
                            <?php } ?>
                            <div class="col-md-12 form-group">
                                <div class="creat_account">
                                    <?php if(isset($_GET['error'])){?>
                                    <p> <?php echo $_GET['error'];?></p>
                                    <?php }
                            ?>
                                    <?php 
            // echo $_SESSION['customer_id'];
            if(!isset($_SESSION['customer_id'])){
            ?>
                                    <button type="submit" value="submit" class="primary-btn" name="create">create an
                                        account</button>
                                    <?php }  else{ ?>
                                    <button type="submit" value="submit" class="primary-btn" name="order">Create an
                                        Order</button>
                                    <?php } ?>


                                </div>
                            </div>
                            <!-- <div class="col-md-12 form-group">
                                <div class="creat_account">
                                    <h3>Shipping Details</h3>
                                    <input type="checkbox" id="f-option3" name="selector">
                                    <label for="f-option3">Ship to a different address?</label>
                                </div>
                                <textarea class="form-control" name="message" id="message" rows="1" placeholder="Order Notes"></textarea>
                            </div> -->
                        </form>
                    </div>

                    <div class="col-lg-4">
                        <div class="order_box">
                            <h2>Your Order</h2>
                            <ul class="list">
                                <li><a href="#">Product <span>Total</span></a></li>

                                <?php 
                                $sub_total=0;
                                $rowProduct = $database->get_SpecificList('cart', 'customer_id', $_SESSION['customer_id']);
                                foreach ($rowProduct as $value) {
                                    $productId = $value->productId;
                                    $productName = $database->getColumn('products', 'name', $productId);
                                    $productQty = $value->qty;
                                    $productPrice = $database->getColumn('products', 'price', $productId);
                                    $sub_total+=$database->getColumn('products','price',$value->productId) * $value->qty; 

                                    // Perform any calculations or display logic here
                                ?>
                                <li><a><?php echo $productName; ?> <span class="middle">x
                                            <?php echo $productQty; ?></span> <span
                                            class="last"><?php echo $productPrice; ?></span></a></li>
                                <?php
                                }
                                ?>
                            </ul>
                            <ul class="list list_2">
                                <li><a href="#">Subtotal <span><?php echo $sub_total ?></span></a></li>
                                <li><a href="#">Shipping <span>2.00</span></a></li>
                                <li><a href="#">Total <span><?php echo $sub_total+2 ?></span></a></li>
                            </ul>
                            <!-- <div class="payment_item">
                                <div class="radion_btn">
                                    <input type="radio" id="f-option5" name="selector">
                                    <label for="f-option5">Check payments</label>
                                    <div class="check"></div>
                                </div>
                                <p>Please send a check to Store Name, Store Street, Store Town, Store State / County,
                                    Store Postcode.</p>
                            </div>
                            <div class="payment_item active">
                                <div class="radion_btn">
                                    <input type="radio" id="f-option6" name="selector">
                                    <label for="f-option6">Paypal </label>
                                    <img src="img/product/card.jpg" alt="">
                                    <div class="check"></div>
                                </div>
                                <p>Pay via PayPal; you can pay with your credit card if you don’t have a PayPal
                                    account.</p>
                            </div>
                            <div class="creat_account">
                                <input type="checkbox" id="f-option4" name="selector">
                                <label for="f-option4">I’ve read and accept the </label>
                                <a href="#">terms & conditions*</a>
                            </div>
                            <a class="primary-btn" href="#">Proceed to Paypal</a> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--================End Checkout Area =================-->

    <!-- start footer Area -->
    <footer class="footer-area section_gap">
        <div class="container">
            <div class="row">
                <div class="col-lg-3  col-md-6 col-sm-6">
                    <div class="single-footer-widget">
                        <h6>About Us</h6>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt
                            ut labore dolore
                            magna aliqua.
                        </p>
                    </div>
                </div>
                <div class="col-lg-4  col-md-6 col-sm-6">
                    <div class="single-footer-widget">
                        <h6>Newsletter</h6>
                        <p>Stay update with our latest</p>
                        <div class="" id="mc_embed_signup">

                            <form target="_blank" novalidate="true"
                                action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01"
                                method="get" class="form-inline">

                                <div class="d-flex flex-row">

                                    <input class="form-control" name="EMAIL" placeholder="Enter Email"
                                        onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Email '"
                                        required="" type="email">


                                    <button class="click-btn btn btn-default"><i class="fa fa-long-arrow-right"
                                            aria-hidden="true"></i></button>
                                    <div style="position: absolute; left: -5000px;">
                                        <input name="b_36c4fd991d266f23781ded980_aefe40901a" tabindex="-1" value=""
                                            type="text">
                                    </div>

                                    <!-- <div class="col-lg-4 col-md-4">
													<button class="bb-btn btn"><span class="lnr lnr-arrow-right"></span></button>
												</div>  -->
                                </div>
                                <div class="info"></div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3  col-md-6 col-sm-6">
                    <div class="single-footer-widget mail-chimp">
                        <h6 class="mb-20">Instragram Feed</h6>
                        <ul class="instafeed d-flex flex-wrap">
                            <li><img src="img/i1.jpg" alt=""></li>
                            <li><img src="img/i2.jpg" alt=""></li>
                            <li><img src="img/i3.jpg" alt=""></li>
                            <li><img src="img/i4.jpg" alt=""></li>
                            <li><img src="img/i5.jpg" alt=""></li>
                            <li><img src="img/i6.jpg" alt=""></li>
                            <li><img src="img/i7.jpg" alt=""></li>
                            <li><img src="img/i8.jpg" alt=""></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 col-sm-6">
                    <div class="single-footer-widget">
                        <h6>Follow Us</h6>
                        <p>Let us be social</p>
                        <div class="footer-social d-flex align-items-center">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-dribbble"></i></a>
                            <a href="#"><i class="fa fa-behance"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom d-flex justify-content-center align-items-center flex-wrap">
                <p class="footer-text m-0">
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    Copyright &copy;<script>
                        document.write(new Date().getFullYear());
                    </script> All rights reserved | This template is made with <i class="fa fa-heart-o"
                        aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                </p>
            </div>
        </div>
    </footer>
    <!-- End footer Area -->


    <script src="js/vendor/jquery-2.2.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"
        integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous">
    </script>
    <script src="js/vendor/bootstrap.min.js"></script>
    <script src="js/jquery.ajaxchimp.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/jquery.sticky.js"></script>
    <script src="js/nouislider.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <!--gmaps Js-->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
    <script src="js/gmaps.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>