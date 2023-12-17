<?php
function getProductsForPage($pageNumber, $itemsPerPage) {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "e-commerce";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Calculate the offset based on the page number and items per page
        $offset = ($pageNumber - 1) * $itemsPerPage;

        $query = "SELECT * FROM products ORDER BY id DESC LIMIT :limit OFFSET :offset";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':limit', $itemsPerPage, PDO::PARAM_INT);
        $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
        $stmt->execute();
        $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        
        return $products;
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
        return null; 
    } finally {
        $conn = null; 
    }
}

function getProductsForPageByCategory($pageNumber, $itemsPerPage, $categoryID) {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "e-commerce";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Calculate the offset based on the page number and items per page
        $offset = ($pageNumber - 1) * $itemsPerPage;

        $query = "SELECT * FROM products WHERE category_id = :categoryID ORDER BY id DESC LIMIT :limit OFFSET :offset";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':categoryID', $categoryID, PDO::PARAM_INT);
        $stmt->bindParam(':limit', $itemsPerPage, PDO::PARAM_INT);
        $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
        $stmt->execute();
        $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        
        return $products;
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
        return null; 
    } finally {
        $conn = null; 
    }
}

function getMaxPages($categoryID) {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "e-commerce";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		if($categoryID==0){
			$query = "SELECT COUNT(*) as count FROM products;";
			$stmt = $conn->prepare($query);
			$stmt->execute();
			$result = $stmt->fetch(PDO::FETCH_ASSOC);
			$stmt->closeCursor();
			// Assign the count to $_POST['pages']
			$_GET['product_count'] = $result['count'];
		}
		else{
			$query = "SELECT COUNT(*) as count FROM products WHERE category_id = :categoryID;";
			// echo $query;
			$stmt = $conn->prepare($query);
			$stmt->bindParam(':categoryID', $categoryID, PDO::PARAM_INT);
			$stmt->execute();
			$result = $stmt->fetch(PDO::FETCH_ASSOC);
			$stmt->closeCursor();
			// Assign the count to $_POST['pages']
			$_GET['product_count'] = $result['count'];
		}

    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
        return null; 
    } finally {
        $conn = null; 
    }
}

function getAllCategories() {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "e-commerce";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $query = "SELECT * FROM categories";
        $stmt = $conn->prepare($query);
        $stmt->execute();
        $categories = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();

        return $categories;
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
        return null;
    } finally {
        $conn = null;
    }
}




// get page number
if (isset($_GET['page'])){
	$page = $_GET['page'];
} else{
	$page = $_GET['page'] = 1;
}
// get number of items to show
if (isset($_GET['showcount'])){
	$showCount = $_GET['showcount'];
} else{
	$showCount = 12;
}
// get id, call corresponding function 
if (isset($_GET['id'])) {
	if($_GET['id']!=0){
		$categoryID = $_GET['id'];
		$products = getProductsForPageByCategory($page, $showCount, $categoryID);
		getMaxPages($categoryID);
	}
	else{
		$products = getProductsForPage($page, $showCount);
		getMaxPages(0);
	}
} else {
	$products = getProductsForPage($page, $showCount);
	getMaxPages(0);
}

$_POST['max_pages'] = ceil(floatval($_GET['product_count']) / $showCount);

// this function generates the select how many items to show drop down list
function generateSelect($default = 12) {
    // Get the showcount value from the query parameters
    $showcount = isset($_GET['showcount']) ? intval($_GET['showcount']) : $default;

    // Generate the select element with options
    echo '<select id="showOptions" name="showCount" onchange="updateDisplayCategory()">';
    echo '<option value="12" ' . ($showcount === 12 ? 'selected' : '') . '>Show 12</option>';
    echo '<option value="24" ' . ($showcount === 24 ? 'selected' : '') . '>Show 24</option>';
    echo '<option value="48" ' . ($showcount === 48 ? 'selected' : '') . '>Show 48</option>';
    echo '</select>';
}
?>


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

	<!--CSS============================================= -->
	<link rel="stylesheet" href="css/linearicons.css">
	<link rel="stylesheet" href="css/owl.carousel.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/themify-icons.css">
	<link rel="stylesheet" href="css/nice-select.css">
	<link rel="stylesheet" href="css/nouislider.min.css">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/main.css">
</head>

<body id="category">

	<!-- Start Header Area -->
	<header class="header_area sticky-header">
		<div class="main_menu">
			<nav class="navbar navbar-expand-lg navbar-light main_box">
				<div class="container">
					<!-- Brand and toggle get grouped for better mobile display -->
					<a class="navbar-brand logo_h" href="index.php"><img src="img/logo.png" alt=""></a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
					 aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse offset" id="navbarSupportedContent">
						<ul class="nav navbar-nav menu_nav ml-auto">
							<li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
							<li class="nav-item active"><a class="nav-link" href="category.php">Shop </a></li>

							<!-- <li class="nav-item submenu dropdown active">
								<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
								 aria-expanded="false">Shop</a>
								<ul class="dropdown-menu">
									<li class="nav-item"><a class="nav-link" href="single-product.html">Product Details</a></li>
									<li class="nav-item"><a class="nav-link" href="checkout.html">Product Checkout</a></li>
									<li class="nav-item"><a class="nav-link" href="cart.html">Shopping Cart</a></li>
									<li class="nav-item"><a class="nav-link" href="confirmation.html">Confirmation</a></li>
								</ul>
							</li> -->
							<!-- <li class="nav-item submenu dropdown">
								<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
								 aria-expanded="false">Blog</a>
								<ul class="dropdown-menu">
									<li class="nav-item"><a class="nav-link" href="blog.html">Blog</a></li>
									<li class="nav-item"><a class="nav-link" href="single-blog.html">Blog Details</a></li>
								</ul>
							</li>
							<li class="nav-item submenu dropdown">
								<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
								 aria-expanded="false">Pages</a>
								<ul class="dropdown-menu">
									<li class="nav-item"><a class="nav-link" href="login.html">Login</a></li>
									<li class="nav-item"><a class="nav-link" href="tracking.html">Tracking</a></li>
									<li class="nav-item"><a class="nav-link" href="elements.html">Elements</a></li>
								</ul>
							</li> -->
							<li class="nav-item"><a class="nav-link" href="contact.html">Contact</a></li>
						</ul>
						<ul class="nav navbar-nav navbar-right">
							<li class="nav-item"><a href="cart.html" class="cart"><span class="ti-bag"></span></a></li>
							<li class="nav-item">
								<button class="search"><span class="lnr lnr-magnifier" id="search"></span></button>
							</li>
						</ul>
					</div>
				</div>
			</nav>
		</div>
		<div class="search_input" id="search_input_box">
			<div class="container">
				<form class="d-flex justify-content-between">
					<input type="text" class="form-control" id="search_input" placeholder="Search Here">
					<button type="submit" class="btn"></button>
					<span class="lnr lnr-cross" id="close_search" title="Close Search"></span>
				</form>
			</div>
		</div>
	</header>
	<!-- End Header Area -->

	<!-- Start Banner Area -->
	<section class="banner-area organic-breadcrumb">
		<div class="container">
			<div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
				<div class="col-first">
					<h1>Shop Category page</h1>
					<nav class="d-flex align-items-center">
						<a href="index.php">Home<span class="lnr lnr-arrow-right"></span></a>
						<a href="#">Shop<span class="lnr lnr-arrow-right"></span></a>
						<a href="category.php">Fashon Category</a>
					</nav>
				</div>
			</div>
		</div>
	</section>
	<!-- End Banner Area -->
	<div class="container">
		<div class="row">
			<div class="col-xl-3 col-lg-4 col-md-5">
				<div class="sidebar-categories">
					<div class="head">Browse Categories</div>
					<ul class="main-categories">

						<!-- php script for categories -->
						<?php

						$allCategories = getAllCategories();

						if ($allCategories !== null) {
							foreach ($allCategories as $category) {
								$categoryId = $category['id'];
								$categoryName = $category['name'];
								
								echo '<li class="main-nav-list"><a href="#" class="category-link" data-category-id="' . $categoryId . '">' . $categoryName .'</a></li>';	
        					}
						} else {
							echo '<li class="main-nav-list">Error retrieving categories</li>';
						}
						?>

						<script>
							function displayCategory(categoryId, showCount = 12, page = 1) {
								window.location.href = 'category.php?id=' + categoryId + '&showcount=' + showCount + '&page=' + page;
							}
							// add event listener to each category to call displaycategory function (always shows page 1)
							document.addEventListener('DOMContentLoaded', function() {
								var categoryLinks = document.querySelectorAll('.category-link');
								
								categoryLinks.forEach(function(link) {
									link.addEventListener('click', function(event) {
										event.preventDefault();
										var categoryId = link.getAttribute('data-category-id');
										showCount =  document.getElementById("showOptions").value;
										displayCategory(categoryId, showCount);
									});
								});

							});

						</script>
						
						<!-- 
						
						This is what a category with brands in it would look like

						<li class="main-nav-list"><a data-toggle="collapse" href="#meatFish" aria-expanded="false" aria-controls="meatFish"><span
								 class="lnr lnr-arrow-right"></span>Meat and Fish<span class="number">(53)</span></a>
							<ul class="collapse" id="meatFish" data-toggle="collapse" aria-expanded="false" aria-controls="meatFish">
								<li class="main-nav-list child"><a href="#">Frozen Fish<span class="number">(13)</span></a></li>
								<li class="main-nav-list child"><a href="#">Dried Fish<span class="number">(09)</span></a></li>
								<li class="main-nav-list child"><a href="#">Fresh Fish<span class="number">(17)</span></a></li>
								<li class="main-nav-list child"><a href="#">Meat Alternatives<span class="number">(01)</span></a></li>
								<li class="main-nav-list child"><a href="#">Meat<span class="number">(11)</span></a></li>
							</ul>
						</li>

						-->
					</ul>
				</div>
			</div>
			<div class="col-xl-9 col-lg-8 col-md-7">
				<div class="filter-bar d-flex flex-wrap align-items-center">
					<div class="sorting mr-auto">

						<?php generateSelect();  ?>	

						<script>
							function updateDisplayCategory() {
								
								var selectedValue = document.getElementById("showOptions").value;
								var categoryId = <?php echo isset($_GET['id']) ? $_GET['id'] : 0; ?>;
								displayCategory(categoryId, selectedValue);
								
							}
						</script>

					</div>
					<div class="pagination">

						<script>
							function nextPage() {
								console.log("weather");
								var selectedValue = document.getElementById("showOptions").value;
								var categoryId = <?php echo isset($_GET['id']) ? $_GET['id'] : 0; ?>;
								var page = <?php 
									if (isset($_POST['max_pages']) && isset($_GET['page'])) {
										if ($_GET['page'] < $_POST['max_pages']) {
											echo $_GET['page'] + 1;
											// $_GET['page'] = $_GET['page']+1;
										}
										else{
											echo $_GET['page'];
										}
									}
									
								?>;
								// Call your displayCategory function with the categoryId and selectedValue
								displayCategory(categoryId, selectedValue, page);	
							}

							function prevPage() {
								console.log("weather");
								var selectedValue = document.getElementById("showOptions").value;
								var categoryId = <?php echo isset($_GET['id']) ? $_GET['id'] : 0; ?>;
								var page = <?php 
									if (isset($_POST['max_pages']) && isset($_GET['page'])) {
										if ($_GET['page'] > 1) {
											echo $_GET['page'] - 1;
											// $_GET['page'] = $_GET['page']+1;
										}
										else{
											echo $_GET['page'];
										}
									}
									
								?>;
								// Call your displayCategory function with the categoryId and selectedValue
								displayCategory(categoryId, selectedValue, page);	
							}
						</script>

						<a class="prev-arrow" onclick="prevPage()"><i class="fa fa-long-arrow-left" aria-hidden="true" id="prev_page"></i></a>
						<a class="active">
							<?php 
								echo $_GET['page'];
							?>
						</a>
						
						<a class="next-arrow" onclick="nextPage()"><i class="fa fa-long-arrow-right" aria-hidden="true" ></i></a>
						
						

					</div>
				</div>
				
				<section class="lattest-product-area pb-40 category-list">
					<div class="row">
					<?php foreach ($products as $product) {?>
						<div class="col-lg-4 col-md-6">
							<div class="single-product">
								<a href = "single-product.php?productId=<?php echo $product['id']?>"><img class="img-fluid" src= '<?php if(file_exists($product['image'])) {echo $product['image'];} else {echo "img/placeholder.png";} ?>' alt="" style="cursor:pointer;"></a>
								<div class="product-details">
									<a href = "single-product.php?productId=<?php echo $product['id']?>"><h6 style="cursor:pointer;"><?php echo $product['name']; ?></h6></a>
									<div class="price">
										<?php if ($product['is_on_sale'] == 1) { ?>
											<h6>$<?php echo $product['price_after_sale']; ?></h6>
											<h6 class="l-through">$<?php echo $product['price']; ?></h6>
										<?php } else { ?>
											<h6>$<?php echo $product['price']; ?></h6>
										<?php } ?>
									</div>
									<div class="prd-bottom">
										<a href="" class="social-info">
											<span class="ti-bag"></span>
											<p class="hover-text">add to bag</p>
										</a>
										<a href="" class="social-info">
											<span class="lnr lnr-heart"></span>
											<p class="hover-text">Wishlist</p>
										</a>
									</div>
								</div>
							</div>
						</div>
					<?php } ?>	
					</div>
				</section>
			</div>
		</div>
	</div>
	
	<!-- start footer Area -->
	<footer class="footer-area section_gap">
		<div class="container">
			<div class="row">
				<div class="col-lg-3  col-md-6 col-sm-6">
					<div class="single-footer-widget">
						<h6>About Us</h6>
						<p>
							Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore dolore
							magna aliqua.
						</p>
					</div>
				</div>
				<div class="col-lg-4  col-md-6 col-sm-6">
					<div class="single-footer-widget">
						<h6>Newsletter</h6>
						<p>Stay update with our latest</p>
						<div class="" id="mc_embed_signup">

							<form target="_blank" novalidate="true" action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01"
							 method="get" class="form-inline">

								<div class="d-flex flex-row">

									<input class="form-control" name="EMAIL" placeholder="Enter Email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Email '"
									 required="" type="email">


									<button class="click-btn btn btn-default"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></button>
									<div style="position: absolute; left: -5000px;">
										<input name="b_36c4fd991d266f23781ded980_aefe40901a" tabindex="-1" value="" type="text">
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
				<p class="footer-text m-0"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
</p>
			</div>
		</div>
	</footer>
	<!-- End footer Area -->

	<!-- Modal Quick Product View -->
	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="container relative">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<div class="product-quick-view">
					<div class="row align-items-center">
						<div class="col-lg-6">
							<div class="quick-view-carousel">
								<div class="item" style="background: url(img/organic-food/q1.jpg);">

								</div>
								<div class="item" style="background: url(img/organic-food/q1.jpg);">

								</div>
								<div class="item" style="background: url(img/organic-food/q1.jpg);">

								</div>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="quick-view-content">
								<div class="top">
									<h3 class="head">Mill Oil 1000W Heater, White</h3>
									<div class="price d-flex align-items-center"><span class="lnr lnr-tag"></span> <span class="ml-10">$149.99</span></div>
									<div class="category">Category: <span>Household</span></div>
									<div class="available">Availibility: <span>In Stock</span></div>
								</div>
								<div class="middle">
									<p class="content">Mill Oil is an innovative oil filled radiator with the most modern technology. If you are
										looking for something that can make your interior look awesome, and at the same time give you the pleasant
										warm feeling during the winter.</p>
									<a href="#" class="view-full">View full Details <span class="lnr lnr-arrow-right"></span></a>
								</div>
								<div class="bottom">
									<div class="color-picker d-flex align-items-center">Color:
										<span class="single-pick"></span>
										<span class="single-pick"></span>
										<span class="single-pick"></span>
										<span class="single-pick"></span>
										<span class="single-pick"></span>
									</div>
									<div class="quantity-container d-flex align-items-center mt-15">
										Quantity:
										<input type="text" class="quantity-amount ml-15" value="1" />
										<div class="arrow-btn d-inline-flex flex-column">
											<button class="increase arrow" type="button" title="Increase Quantity"><span class="lnr lnr-chevron-up"></span></button>
											<button class="decrease arrow" type="button" title="Decrease Quantity"><span class="lnr lnr-chevron-down"></span></button>
										</div>

									</div>
									<div class="d-flex mt-20">
										<a href="#" class="view-btn color-2"><span>Add to Cart</span></a>
										<a href="#" class="like-btn"><span class="lnr lnr-layers"></span></a>
										<a href="#" class="like-btn"><span class="lnr lnr-heart"></span></a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>



	<script src="js/vendor/jquery-2.2.4.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4"
	 crossorigin="anonymous"></script>
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