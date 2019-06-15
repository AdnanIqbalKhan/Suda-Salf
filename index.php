<?php
include_once('phpScripts/login_header.php');
?>


<?php
include_once('phpScripts/db_config.php');

$sql = "SELECT * FROM location";
$result = $conn->query($sql);

$location_data = array();
while ($row = $result->fetch_assoc()) {
	array_push($location_data,$row["Location"]);
}
?>
	<!DOCTYPE html>
	<html>

	<head>
		<?php include("templates/head.html");?>

		<script type="text/javascript" src="myJS/search.js"></script>
	</head>

	<body>
		<?php include("templates/header.html");?>

		<div data-vide-bg="video/video">
			<div class="container">
				<div class="banner-info">
					<h3>Greetings!</h3>
					<h3>خوش آمدید</h3>
					<div class="input-group search-form ui-widget">
						<input type="text" class="form-control" autocomplete="off" placeholder="Search..." name="search" id="search">
						<input type="submit" class="form-control input-group-addon" value=" ">
					</div>
				</div>
			</div>
		</div>

		<!--content-->
		<div class="content-top ">
			<div class="container">
				<div class="spec ">
					<h3 id="search_title"></h3>
					<div class="ser-t">
						<b></b>
						<span>
							<i></i>
						</span>
						<b class="line"></b>
					</div>
				</div>
				<div class="con-w3l" id="search_count"></div>
				<div class="alert alert-warning con-w3l" id="search_filter">
					<h2>Filter search results</h2>
					<table width="100%" style="table-layout: fixed;">
						<tr>
							<td style="padding-left:0.5em">
								<div class="m_th">
									<label for="amount">Price range:</label>
									<input type="text" id="amount" readonly style="border:0; color:#FAB005; font-weight:bold;">
								</div>
								<div class="m_td">
									<div id="slider-range"></div>
								</div>
							</td>
							<td>
								<div class="m_th">Filter Location
								</div>
								<div class="m_td">
									<select id="location_filter" multiple="multiple">
										<?php
								foreach ($location_data as $value)
									echo '<option value='.$value.' selected>'.$value.'</option>';
								?>
									</select>
								</div>
							</td>
							<td>
								<div class="m_th">Filter Offers
								</div>
								<div class="m_td">
									<select id="offer_filter" multiple="multiple">
										<option value='1' selected>On Sale</option>
										<option value='0' selected>Not On Sale</option>
									</select>
								</div>
							</td>
							<td>
								<div class="m_th">Sort by
								</div>
								<div class="m_td">
									<select name="sortby" id="sortby" onchange="sort_search()">
										<option value="name">Name</option>
										<option value="timestamp" selected>Date</option>
										<option value="price">Price</option>
										<option value="rating">Rating</option>
										<option value="counter">Popularity</option>
									</select>
								</div>
							</td>
							<td>
								<div class="m_th">Order
								</div>
								<div class="m_td">
									<select name="order" id="order" onchange="sort_search()">
										<option value="ASC">Assending</option>
										<option value="DSC" selected>Decending</option>
									</select>
								</div>
							</td>
						</tr>
					</table>
				</div>
				<div class="con-w3l" id="search_results">
				</div>
			</div>
		</div>
		<!--content-->
		<div class="content-mid">
			<div class="container">
				<div class="col-md-4 m-w3ls">
					<div class="col-md1 ">
						<a href="newProducts.php">
							<img src="images/co1.jpg" class="img-responsive img" alt="">
							<div class="big-sa">
								<h6>New Collections</h6>
								<h3>Season
									<span>ing </span>
								</h3>
								<p>Discover the new collection</p>
							</div>
						</a>
					</div>
				</div>
				<div class="col-md-4 m-w3ls1">
					<div class="col-md ">
						<a href="saleProducts.php">
							<img src="images/co.jpg" class="img-responsive img" alt="">
							<div class="big-sale">
								<div class="big-sale1">
									<h3>Big
										<span>Sale</span>
									</h3>
									<p>Find the best offers</p>
								</div>
							</div>
						</a>
					</div>
				</div>
				<div class="col-md-4 m-w3ls">
					<div class="col-md2 ">
						<a href="category.php?id=1">
							<img src="images/co2.jpg" class="img-responsive img1" alt="">
							<div class="big-sale2">
								<h3>Cooking
									<span>Oil</span>
								</h3>
								<p>It is a long established fact that a reader </p>
							</div>
						</a>
					</div>
					<div class="col-md3 ">
						<a href="category.php?id=2">
							<img src="images/co3.jpg" class="img-responsive img1" alt="">
							<div class="big-sale3">
								<h3>Vegeta
									<span>bles</span>
								</h3>
								<p>It is a long established fact that a reader </p>
							</div>
						</a>
					</div>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
		<!--content-->

		<?php include("templates/carousel.html");?>
		<!--content-->

		<div class="product">
			<div class="container ">
				<div class="spec ">
					<h3>Featured Products</h3>
					<div class="ser-t">
						<b></b>
						<span>
							<i></i>
						</span>
						<b class="line"></b>
					</div>
				</div>
				<div class="tab-head " id="feature_tabs">
					<nav class="nav-sidebar">
						<ul class="nav tabs ">
							<li class="active">
								<a href="#tab1" data-toggle="tab" id="Htad1">Staples</a>
							</li>
							<li class="">
								<a href="#tab2" data-toggle="tab" id="Htad2">Snacks</a>
							</li>
							<li class="">
								<a href="#tab3" data-toggle="tab" id="Htad3">Fruits & Vegetables</a>
							</li>
							<li class="">
								<a href="#tab4" data-toggle="tab" id="Htad4">Breakfast & Cereal</a>
							</li>
						</ul>
					</nav>
					<div class=" tab-content tab-content-t ">
						<div class="tab-pane active text-style" id="tab1">
							<div class=" con-w3l">
								<!-- <div class="col-md-3 m-wthree">
									<div class="col-m">
										<a href="#" data-toggle="modal" data-target="#myModal1" class="offer-img">
											<img src="images/of.png" class="img-responsive" alt="">
											<div class="offer">
												<p>
													<span>Offer</span>
												</p>
											</div>
										</a>
										<div class="mid-1">

											<div class="women">
												<h6>
													<a href="single.php">Moong</a>(1 kg)</h6>

											</div>
											<div class="mid-2">

												<p>
													<label>$2.00</label>
													<em class="item_price">$1.50</em>
												</p>

												<div class="block">
													<div class="starbox small ghosting"> </div>
												</div>
												<div class="clearfix"></div>
											</div>
											<div class="add">
												<button class="btn btn-danger my-cart-btn my-cart-b " data-id="1" data-name="Moong" data-summary="summary 1" data-price="1.50"
												    data-quantity="1" data-image="images/of.png">Add to Cart</button>
											</div>

										</div>
									</div>
								</div>
								<div class="col-md-3 m-wthree">
									<div class="col-m">
										<a href="#" data-toggle="modal" data-target="#myModal2" class="offer-img">
											<img src="images/of1.png" class="img-responsive" alt="">
											<div class="offer">
												<p>
													<span>Offer</span>
												</p>
											</div>
										</a>
										<div class="mid-1">
											<div class="women">
												<h6>
													<a href="single.php">Sunflower Oil</a>(5 kg)</h6>
											</div>
											<div class="mid-2">
												<p>
													<label>$10.00</label>
													<em class="item_price">$9.00</em>
												</p>
												<div class="block">
													<div class="starbox small ghosting"> </div>
												</div>
												<div class="clearfix"></div>
											</div>
											<div class="add">
												<button class="btn btn-danger my-cart-btn my-cart-b" data-id="2" data-name="Sunflower Oil" data-summary="summary 2" data-price="9.00"
												    data-quantity="1" data-image="images/of1.png">Add to Cart</button>
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-3 m-wthree">
									<div class="col-m">
										<a href="#" data-toggle="modal" data-target="#myModal3" class="offer-img">
											<img src="images/of2.png" class="img-responsive" alt="">
											<div class="offer">
												<p>
													<span>Offer</span>
												</p>
											</div>
										</a>
										<div class="mid-1">
											<div class="women">
												<h6>
													<a href="single.php">Kabuli Chana</a>(1 kg)</h6>
											</div>
											<div class="mid-2">
												<p>
													<label>$3.00</label>
													<em class="item_price">$2.00</em>
												</p>
												<div class="block">
													<div class="starbox small ghosting"> </div>
												</div>
												<div class="clearfix"></div>
											</div>
											<div class="add">
												<button class="btn btn-danger my-cart-btn my-cart-b" data-id="3" data-name="Kabuli Chana" data-summary="summary 3" data-price="2.00"
												    data-quantity="1" data-image="images/of2.png">Add to Cart</button>
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-3 m-wthree">
									<div class="col-m">
										<a href="#" data-toggle="modal" data-target="#myModal4" class="offer-img">
											<img src="images/of3.png" class="img-responsive" alt="">
											<div class="offer">
												<p>
													<span>Offer</span>
												</p>
											</div>
										</a>
										<div class="mid-1">
											<div class="women">
												<h6>
													<a href="single.php">Soya Chunks</a>(1 kg)</h6>
											</div>
											<div class="mid-2">
												<p>
													<label>$4.00</label>
													<em class="item_price">$3.50</em>
												</p>
												<div class="block">
													<div class="starbox small ghosting"> </div>
												</div>
												<div class="clearfix"></div>
											</div>
											<div class="add">
												<button class="btn btn-danger my-cart-btn my-cart-b" data-id="4" data-name="Soya Chunks" data-summary="summary 4" data-price="3.50"
												    data-quantity="1" data-image="images/of3.png">Add to Cart</button>
											</div>
										</div>
									</div>
								</div>
								<div class="clearfix"></div> -->
							</div>
						</div>
						<div class="tab-pane  text-style" id="tab2">
							<div class=" con-w3l">
								<!-- <div class="col-md-3 m-wthree">
									<div class="col-m">
										<a href="#" data-toggle="modal" data-target="#myModal5" class="offer-img">
											<img src="images/of4.png" class="img-responsive" alt="">
											<div class="offer">
												<p>
													<span>Offer</span>
												</p>
											</div>
										</a>
										<div class="mid-1">
											<div class="women">
												<h6>
													<a href="single.php">Lays</a>(100 g)</h6>
											</div>
											<div class="mid-2">
												<p>
													<label>$1.00</label>
													<em class="item_price">$0.70</em>
												</p>
												<div class="block">
													<div class="starbox small ghosting"> </div>
												</div>
												<div class="clearfix"></div>
											</div>
											<div class="add">
												<button class="btn btn-danger my-cart-btn my-cart-b" data-id="5" data-name="Lays" data-summary="summary 5" data-price="0.70"
												    data-quantity="1" data-image="images/of4.png">Add to Cart</button>
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-3 m-wthree">
									<div class="col-m">
										<a href="#" data-toggle="modal" data-target="#myModal6" class="offer-img">
											<img src="images/of5.png" class="img-responsive" alt="">
											<div class="offer">
												<p>
													<span>Offer</span>
												</p>
											</div>
										</a>
										<div class="mid-1">
											<div class="women">
												<h6>
													<a href="single.php">Kurkure</a>(100 g)</h6>
											</div>
											<div class="mid-2">
												<p>
													<label>$1.00</label>
													<em class="item_price">$0.70</em>
												</p>
												<div class="block">
													<div class="starbox small ghosting"> </div>
												</div>
												<div class="clearfix"></div>
											</div>
											<div class="add">
												<button class="btn btn-danger my-cart-btn my-cart-b" data-id="6" data-name="Kurkure" data-summary="summary 6" data-price="0.70"
												    data-quantity="1" data-image="images/of5.png">Add to Cart</button>
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-3 m-wthree">
									<div class="col-m">
										<a href="#" data-toggle="modal" data-target="#myModal7" class="offer-img">
											<img src="images/of6.png" class="img-responsive" alt="">
											<div class="offer">
												<p>
													<span>Offer</span>
												</p>
											</div>
										</a>
										<div class="mid-1">
											<div class="women">
												<h6>
													<a href="single.php">Popcorn</a>(250 g)</h6>
											</div>
											<div class="mid-2">
												<p>
													<label>$2.00</label>
													<em class="item_price">$1.00</em>
												</p>
												<div class="block">
													<div class="starbox small ghosting"> </div>
												</div>
												<div class="clearfix"></div>
											</div>
											<div class="add">
												<button class="btn btn-danger my-cart-btn my-cart-b" data-id="7" data-name="Popcorn" data-summary="summary 7" data-price="1.00"
												    data-quantity="1" data-image="images/of6.png">Add to Cart</button>
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-3 m-wthree">
									<div class="col-m">
										<a href="#" data-toggle="modal" data-target="#myModal8" class="offer-img">
											<img src="images/of7.png" class="img-responsive" alt="">
											<div class="offer">
												<p>
													<span>Offer</span>
												</p>
											</div>
										</a>
										<div class="mid-1">
											<div class="women">
												<h6>
													<a href="single.php">Nuts</a>(250 g)</h6>
											</div>
											<div class="mid-2">
												<p>
													<label>$4.00</label>
													<em class="item_price">$3.50</em>
												</p>
												<div class="block">
													<div class="starbox small ghosting"> </div>
												</div>
												<div class="clearfix"></div>
											</div>
											<div class="add">
												<button class="btn btn-danger my-cart-btn my-cart-b" data-id="8" data-name="Nuts" data-summary="summary 8" data-price="3.50"
												    data-quantity="1" data-image="images/of7.png">Add to Cart</button>
											</div>
										</div>
									</div>
								</div>
								<div class="clearfix"></div> -->
							</div>
						</div>
						<div class="tab-pane  text-style" id="tab3">
							<div class=" con-w3l">
								<!-- <div class="col-md-3 m-wthree">
									<div class="col-m">
										<a href="#" data-toggle="modal" data-target="#myModal9" class="offer-img">
											<img src="images/of8.png" class="img-responsive" alt="">
											<div class="offer">
												<p>
													<span>Offer</span>
												</p>
											</div>
										</a>
										<div class="mid-1">
											<div class="women">
												<h6>
													<a href="single.php">Banana</a>(6 pcs)</h6>
											</div>
											<div class="mid-2">
												<p>
													<label>$2.00</label>
													<em class="item_price">$1.50</em>
												</p>
												<div class="block">
													<div class="starbox small ghosting"> </div>
												</div>
												<div class="clearfix"></div>
											</div>
											<div class="add">
												<button class="btn btn-danger my-cart-btn my-cart-b" data-id="9" data-name="Banana" data-summary="summary 9" data-price="1.50"
												    data-quantity="1" data-image="images/of8.png">Add to Cart</button>
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-3 m-wthree">
									<div class="col-m">
										<a href="#" data-toggle="modal" data-target="#myModal10" class="offer-img">
											<img src="images/of9.png" class="img-responsive" alt="">
											<div class="offer">
												<p>
													<span>Offer</span>
												</p>
											</div>
										</a>
										<div class="mid-1">
											<div class="women">
												<h6>
													<a href="single.php">Onion</a>(1 kg)</h6>
											</div>
											<div class="mid-2">
												<p>
													<label>$1.00</label>
													<em class="item_price">$0.70</em>
												</p>
												<div class="block">
													<div class="starbox small ghosting"> </div>
												</div>
												<div class="clearfix"></div>
											</div>
											<div class="add">
												<button class="btn btn-danger my-cart-btn my-cart-b" data-id="10" data-name="Onion" data-summary="summary 10" data-price="0.70"
												    data-quantity="1" data-image="images/of9.png">Add to Cart</button>
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-3 m-wthree">
									<div class="col-m">
										<a href="#" data-toggle="modal" data-target="#myModal11" class="offer-img">
											<img src="images/of10.png" class="img-responsive" alt="">
											<div class="offer">
												<p>
													<span>Offer</span>
												</p>
											</div>
										</a>
										<div class="mid-1">
											<div class="women">
												<h6>
													<a href="single.php"> Bitter Gourd</a>(1 kg)</h6>
											</div>
											<div class="mid-2">
												<p>
													<label>$2.00</label>
													<em class="item_price">$1.00</em>
												</p>
												<div class="block">
													<div class="starbox small ghosting"> </div>
												</div>
												<div class="clearfix"></div>
											</div>
											<div class="add">
												<button class="btn btn-danger my-cart-btn my-cart-b" data-id="11" data-name="Bitter Gourd" data-summary="summary 11" data-price="1.00"
												    data-quantity="1" data-image="images/of10.png">Add to Cart</button>
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-3 m-wthree">
									<div class="col-m">
										<a href="#" data-toggle="modal" data-target="#myModal12" class="offer-img">
											<img src="images/of11.png" class="img-responsive" alt="">
											<div class="offer">
												<p>
													<span>Offer</span>
												</p>
											</div>
										</a>
										<div class="mid-1">
											<div class="women">
												<h6>
													<a href="single.php">Apples</a>(1 kg)</h6>
											</div>
											<div class="mid-2">
												<p>
													<label>$4.00</label>
													<em class="item_price">$3.50</em>
												</p>
												<div class="block">
													<div class="starbox small ghosting"> </div>
												</div>
												<div class="clearfix"></div>
											</div>
											<div class="add">
												<button class="btn btn-danger my-cart-btn my-cart-b" data-id="12" data-name="Apples" data-summary="summary 12" data-price="3.50"
												    data-quantity="1" data-image="images/of11.png">Add to Cart</button>
											</div>
										</div>
									</div>
								</div>
								<div class="clearfix"></div> -->
							</div>
						</div>
						<div class="tab-pane text-style" id="tab4">
							<div class=" con-w3l">
								<div class="col-md-3 m-wthree">
									<div class="col-m">
										<a href="#" data-toggle="modal" data-target="#myModal13" class="offer-img">
											<img src="images/of12.png" class="img-responsive" alt="">
											<div class="offer">
												<p>
													<span>Offer</span>
												</p>
											</div>
										</a>
										<div class="mid-1">
											<div class="women">
												<h6>
													<a href="single.php">Honey</a>(500 g)</h6>
											</div>
											<div class="mid-2">
												<p>
													<label>$7.00</label>
													<em class="item_price">$6.00</em>
												</p>
												<div class="block">
													<div class="starbox small ghosting"> </div>
												</div>
												<div class="clearfix"></div>
											</div>
											<div class="add">
												<button class="btn btn-danger my-cart-btn my-cart-b" data-id="13" data-name="Honey" data-summary="summary 13" data-price="6.00"
												    data-quantity="1" data-image="images/of12.png">Add to Cart</button>
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-3 m-wthree">
									<div class="col-m ">
										<a href="#" data-toggle="modal" data-target="#myModal14" class="offer-img">
											<img src="images/of13.png" class="img-responsive" alt="">
											<div class="offer">
												<p>
													<span>Offer</span>
												</p>
											</div>
										</a>
										<div class="mid-1">
											<div class="women">
												<h6>
													<a href="single.php">Chocos</a>(250 g)</h6>
											</div>
											<div class="mid-2">
												<p>
													<label>$5.00</label>
													<em class="item_price">$4.50</em>
												</p>
												<div class="block">
													<div class="starbox small ghosting"> </div>
												</div>
												<div class="clearfix"></div>
											</div>
											<div class="add">
												<button class="btn btn-danger my-cart-btn my-cart-b" data-id="14" data-name="Chocos" data-summary="summary 14" data-price="4.50"
												    data-quantity="1" data-image="images/of13.png">Add to Cart</button>
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-3 m-wthree">
									<div class="col-m ">
										<a href="#" data-toggle="modal" data-target="#myModal15" class="offer-img">
											<img src="images/of14.png" class="img-responsive" alt="">
											<div class="offer">
												<p>
													<span>Offer</span>
												</p>
											</div>
										</a>
										<div class="mid-1">
											<div class="women">
												<h6>
													<a href="single.php">Oats</a>(1 kg)</h6>
											</div>
											<div class="mid-2">
												<p>
													<label>$4.00</label>
													<em class="item_price">$3.50</em>
												</p>
												<div class="block">
													<div class="starbox small ghosting"> </div>
												</div>
												<div class="clearfix"></div>
											</div>
											<div class="add">
												<button class="btn btn-danger my-cart-btn my-cart-b" data-id="15" data-name="Oats" data-summary="summary 15" data-price="3.50"
												    data-quantity="1" data-image="images/of14.png">Add to Cart</button>
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-3 m-wthree">
									<div class="col-m">
										<a href="#" data-toggle="modal" data-target="#myModal16" class="offer-img">
											<img src="images/of15.png" class="img-responsive" alt="">
											<div class="offer">
												<p>
													<span>Offer</span>
												</p>
											</div>
										</a>
										<div class="mid-1">
											<div class="women">
												<h6>
													<a href="single.php">Bread</a>(500 g)</h6>
											</div>
											<div class="mid-2">
												<p>
													<label>$1.00</label>
													<em class="item_price">$0.80</em>
												</p>
												<div class="block">
													<div class="starbox small ghosting"> </div>
												</div>
												<div class="clearfix"></div>
											</div>
											<div class="add">
												<button class="btn btn-danger my-cart-btn my-cart-b" data-id="16" data-name="Bread" data-summary="summary 16" data-price="0.80"
												    data-quantity="1" data-image="images/of15.png">Add to Cart</button>
											</div>
										</div>
									</div>
								</div>
								<div class="clearfix"></div>
							</div>
						</div>
					</div>
				</div>

			</div>
		</div>
		</div>



		<div id="productModalsContainer">
			<!-- product -->
			<div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				<div class="modal-dialog" role="document">
					<div class="modal-content modal-info">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body modal-spa">
							<div class="col-md-5 span-2">
								<div class="item">
									<img src="images/of.png" class="img-responsive" alt="">
								</div>
							</div>
							<div class="col-md-7 span-1 ">
								<h3>Moong(1 kg)</h3>
								<a class="googleMapPopUp" rel="nofollow" href="https://maps.google.com/maps?q=Concordia+2+(C2)/@33.6429909,72.9882172,79m"
								    target="_blank" title="Concordia 2 location">
									<p class="in-para">
										<i class="fas fa-map-marker-alt"></i> Available at Concordia 2</p>
								</a>
								<div class="price_single">
									<span class="reducedfrom ">
										<del>$2.00</del>$1.50</span>

									<div class="clearfix"></div>
								</div>
								<h4 class="quick">Quick Overview:</h4>
								<p class="quick_desc"> Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim
									assum. Typi non habent claritatem insitam; es</p>
								<div class="add-to">
									<button class="btn btn-danger my-cart-btn my-cart-btn1 " data-id="1" data-name="Moong" data-summary="summary 1" data-price="1.50"
									    data-quantity="1" data-image="images/of.png">Add to Cart</button>
								</div>
							</div>
							<div class="clearfix"> </div>
						</div>
					</div>
				</div>
			</div>
			<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				<div class="modal-dialog" role="document">
					<div class="modal-content modal-info">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body modal-spa">
							<div class="col-md-5 span-2">
								<div class="item">
									<img src="images/of1.png" class="img-responsive" alt="">
								</div>
							</div>
							<div class="col-md-7 span-1 ">
								<h3>Sunflower Oil(5 kg)</h3>
								<p class="in-para"> There are many variations of passages of Lorem Ipsum.</p>
								<div class="price_single">
									<span class="reducedfrom ">
										<del>$10.00</del>$9.00</span>

									<div class="clearfix"></div>
								</div>
								<h4 class="quick">Quick Overview:</h4>
								<p class="quick_desc"> Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim
									assum. Typi non habent claritatem insitam; es</p>
								<div class="add-to">
									<button class="btn btn-danger my-cart-btn my-cart-btn1 " data-id="2" data-name="Sunflower Oil" data-summary="summary 2" data-price="9.00"
									    data-quantity="1" data-image="images/of1.png">Add to Cart</button>
								</div>
							</div>
							<div class="clearfix"> </div>
						</div>
					</div>
				</div>
			</div>
			<!-- product -->
			<div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				<div class="modal-dialog" role="document">
					<div class="modal-content modal-info">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body modal-spa">
							<div class="col-md-5 span-2">
								<div class="item">
									<img src="images/of2.png" class="img-responsive" alt="">
								</div>
							</div>
							<div class="col-md-7 span-1 ">
								<h3>Kabuli Chana(1 kg)</h3>
								<p class="in-para"> There are many variations of passages of Lorem Ipsum.</p>
								<div class="price_single">
									<span class="reducedfrom ">
										<del>$3.00</del>$2.00</span>

									<div class="clearfix"></div>
								</div>
								<h4 class="quick">Quick Overview:</h4>
								<p class="quick_desc"> Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim
									assum. Typi non habent claritatem insitam; es</p>
								<div class="add-to">
									<button class="btn btn-danger my-cart-btn my-cart-btn1 " data-id="3" data-name="Kabuli Chana" data-summary="summary 3" data-price="2.00"
									    data-quantity="1" data-image="images/of2.png">Add to Cart</button>
								</div>
							</div>
							<div class="clearfix"> </div>
						</div>
					</div>
				</div>
			</div>
			<!-- product -->
			<div class="modal fade" id="myModal4" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				<div class="modal-dialog" role="document">
					<div class="modal-content modal-info">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body modal-spa">
							<div class="col-md-5 span-2">
								<div class="item">
									<img src="images/of3.png" class="img-responsive" alt="">
								</div>
							</div>
							<div class="col-md-7 span-1 ">
								<h3>Soya Chunks(1 kg)</h3>
								<p class="in-para"> There are many variations of passages of Lorem Ipsum.</p>
								<div class="price_single">
									<span class="reducedfrom ">
										<del>$4.00</del>$3.50</span>

									<div class="clearfix"></div>
								</div>
								<h4 class="quick">Quick Overview:</h4>
								<p class="quick_desc"> Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim
									assum. Typi non habent claritatem insitam; es</p>
								<div class="add-to">
									<button class="btn btn-danger my-cart-btn my-cart-btn1 " data-id="4" data-name="Soya Chunks" data-summary="summary 4" data-price="3.50"
									    data-quantity="1" data-image="images/of3.png">Add to Cart</button>
								</div>
							</div>
							<div class="clearfix"> </div>
						</div>
					</div>
				</div>
			</div>
			<!-- product -->
			<div class="modal fade" id="myModal5" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				<div class="modal-dialog" role="document">
					<div class="modal-content modal-info">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body modal-spa">
							<div class="col-md-5 span-2">
								<div class="item">
									<img src="images/of4.png" class="img-responsive" alt="">
								</div>
							</div>
							<div class="col-md-7 span-1 ">
								<h3>Lays(100 g)</h3>
								<p class="in-para"> There are many variations of passages of Lorem Ipsum.</p>
								<div class="price_single">
									<span class="reducedfrom ">
										<del>$1.00</del>$0.70</span>

									<div class="clearfix"></div>
								</div>
								<h4 class="quick">Quick Overview:</h4>
								<p class="quick_desc"> Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim
									assum. Typi non habent claritatem insitam; es</p>
								<div class="add-to">
									<button class="btn btn-danger my-cart-btn my-cart-btn1 " data-id="5" data-name="Lays" data-summary="summary 5" data-price="0.70"
									    data-quantity="1" data-image="images/of4.png">Add to Cart</button>
								</div>
							</div>
							<div class="clearfix"> </div>
						</div>
					</div>
				</div>
			</div>
			<!-- product -->
			<div class="modal fade" id="myModal6" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				<div class="modal-dialog" role="document">
					<div class="modal-content modal-info">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body modal-spa">
							<div class="col-md-5 span-2">
								<div class="item">
									<img src="images/of5.png" class="img-responsive" alt="">
								</div>
							</div>
							<div class="col-md-7 span-1 ">
								<h3>Kurkure(100 g)</h3>
								<p class="in-para"> There are many variations of passages of Lorem Ipsum.</p>
								<div class="price_single">
									<span class="reducedfrom ">
										<del>$1.00</del>$0.70</span>

									<div class="clearfix"></div>
								</div>
								<h4 class="quick">Quick Overview:</h4>
								<p class="quick_desc"> Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim
									assum. Typi non habent claritatem insitam; es</p>
								<div class="add-to">
									<button class="btn btn-danger my-cart-btn my-cart-btn1 " data-id="6" data-name="Kurkure" data-summary="summary 6" data-price="0.70"
									    data-quantity="1" data-image="images/of5.png">Add to Cart</button>
								</div>
							</div>
							<div class="clearfix"> </div>
						</div>
					</div>
				</div>
			</div>
			<!-- product -->
			<div class="modal fade" id="myModal7" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				<div class="modal-dialog" role="document">
					<div class="modal-content modal-info">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body modal-spa">
							<div class="col-md-5 span-2">
								<div class="item">
									<img src="images/of6.png" class="img-responsive" alt="">
								</div>
							</div>
							<div class="col-md-7 span-1 ">
								<h3>Popcorn(250 g)</h3>
								<p class="in-para"> There are many variations of passages of Lorem Ipsum.</p>
								<div class="price_single">
									<span class="reducedfrom ">
										<del>$2.00</del>$1.00</span>

									<div class="clearfix"></div>
								</div>
								<h4 class="quick">Quick Overview:</h4>
								<p class="quick_desc"> Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim
									assum. Typi non habent claritatem insitam; es</p>
								<div class="add-to">
									<button class="btn btn-danger my-cart-btn my-cart-btn1 " data-id="7" data-name="Popcorn" data-summary="summary 7" data-price="1.00"
									    data-quantity="1" data-image="images/of6.png">Add to Cart</button>
								</div>
							</div>
							<div class="clearfix"> </div>
						</div>
					</div>
				</div>
			</div>
			<!-- product -->
			<div class="modal fade" id="myModal8" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				<div class="modal-dialog" role="document">
					<div class="modal-content modal-info">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body modal-spa">
							<div class="col-md-5 span-2">
								<div class="item">
									<img src="images/of7.png" class="img-responsive" alt="">
								</div>
							</div>
							<div class="col-md-7 span-1 ">
								<h3>Nuts(250 g)</h3>
								<p class="in-para"> There are many variations of passages of Lorem Ipsum.</p>
								<div class="price_single">
									<span class="reducedfrom ">
										<del>$4.00</del>$3.50</span>

									<div class="clearfix"></div>
								</div>
								<h4 class="quick">Quick Overview:</h4>
								<p class="quick_desc"> Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim
									assum. Typi non habent claritatem insitam; es</p>
								<div class="add-to">
									<button class="btn btn-danger my-cart-btn my-cart-btn1 " data-id="8" data-name="Nuts" data-summary="summary 8" data-price="3.50"
									    data-quantity="1" data-image="images/of7.png">Add to Cart</button>
								</div>
							</div>
							<div class="clearfix"> </div>
						</div>
					</div>
				</div>
			</div>
			<!-- product -->
			<div class="modal fade" id="myModal9" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				<div class="modal-dialog" role="document">
					<div class="modal-content modal-info">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body modal-spa">
							<div class="col-md-5 span-2">
								<div class="item">
									<img src="images/of8.png" class="img-responsive" alt="">
								</div>
							</div>
							<div class="col-md-7 span-1 ">
								<h3>Banana(6 pcs)</h3>
								<p class="in-para"> There are many variations of passages of Lorem Ipsum.</p>
								<div class="price_single">
									<span class="reducedfrom ">
										<del>$2.00</del>$1.50</span>

									<div class="clearfix"></div>
								</div>
								<h4 class="quick">Quick Overview:</h4>
								<p class="quick_desc"> Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim
									assum. Typi non habent claritatem insitam; es</p>
								<div class="add-to">
									<button class="btn btn-danger my-cart-btn my-cart-btn1 " data-id="9" data-name="Banana" data-summary="summary 9" data-price="1.50"
									    data-quantity="1" data-image="images/of8.png">Add to Cart</button>
								</div>
							</div>
							<div class="clearfix"> </div>
						</div>
					</div>
				</div>
			</div>
			<!-- product -->
			<div class="modal fade" id="myModal10" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				<div class="modal-dialog" role="document">
					<div class="modal-content modal-info">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body modal-spa">
							<div class="col-md-5 span-2">
								<div class="item">
									<img src="images/of9.png" class="img-responsive" alt="">
								</div>
							</div>
							<div class="col-md-7 span-1 ">
								<h3>Onion(1 kg)</h3>
								<p class="in-para"> There are many variations of passages of Lorem Ipsum.</p>
								<div class="price_single">
									<span class="reducedfrom ">
										<del>$1.00</del>$0.70</span>

									<div class="clearfix"></div>
								</div>
								<h4 class="quick">Quick Overview:</h4>
								<p class="quick_desc"> Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim
									assum. Typi non habent claritatem insitam; es</p>
								<div class="add-to">
									<button class="btn btn-danger my-cart-btn my-cart-btn1 " data-id="10" data-name="Onion" data-summary="summary 10" data-price="0.70"
									    data-quantity="1" data-image="images/of9.png">Add to Cart</button>
								</div>
							</div>
							<div class="clearfix"> </div>
						</div>
					</div>
				</div>
			</div>
			<!-- product -->
			<div class="modal fade" id="myModal11" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				<div class="modal-dialog" role="document">
					<div class="modal-content modal-info">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body modal-spa">
							<div class="col-md-5 span-2">
								<div class="item">
									<img src="images/of10.png" class="img-responsive" alt="">
								</div>
							</div>
							<div class="col-md-7 span-1 ">
								<h3>Bitter Gourd(1 kg)</h3>
								<p class="in-para"> There are many variations of passages of Lorem Ipsum.</p>
								<div class="price_single">
									<span class="reducedfrom ">
										<del>$2.00</del>$1.00</span>

									<div class="clearfix"></div>
								</div>
								<h4 class="quick">Quick Overview:</h4>
								<p class="quick_desc"> Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim
									assum. Typi non habent claritatem insitam; es</p>
								<div class="add-to">
									<button class="btn btn-danger my-cart-btn my-cart-btn1 " data-id="11" data-name="Bitter Gourd" data-summary="summary 11"
									    data-price="1.00" data-quantity="1" data-image="images/of10.png">Add to Cart</button>
								</div>
							</div>
							<div class="clearfix"> </div>
						</div>
					</div>
				</div>
			</div>
			<!-- product -->
			<div class="modal fade" id="myModal12" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				<div class="modal-dialog" role="document">
					<div class="modal-content modal-info">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body modal-spa">
							<div class="col-md-5 span-2">
								<div class="item">
									<img src="images/of11.png" class="img-responsive" alt="">
								</div>
							</div>
							<div class="col-md-7 span-1 ">
								<h3>Apples(1 kg)</h3>
								<p class="in-para"> There are many variations of passages of Lorem Ipsum.</p>
								<div class="price_single">
									<span class="reducedfrom ">
										<del>$4.00</del>$3.50</span>

									<div class="clearfix"></div>
								</div>
								<h4 class="quick">Quick Overview:</h4>
								<p class="quick_desc"> Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim
									assum. Typi non habent claritatem insitam; es</p>
								<div class="add-to">
									<button class="btn btn-danger my-cart-btn my-cart-btn1 " data-id="12" data-name="Apples" data-summary="summary 12" data-price="3.50"
									    data-quantity="1" data-image="images/of11.png">Add to Cart</button>
								</div>
							</div>
							<div class="clearfix"> </div>
						</div>
					</div>
				</div>
			</div>
			<!-- product -->
			<div class="modal fade" id="myModal13" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				<div class="modal-dialog" role="document">
					<div class="modal-content modal-info">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body modal-spa">
							<div class="col-md-5 span-2">
								<div class="item">
									<img src="images/of12.png" class="img-responsive" alt="">
								</div>
							</div>
							<div class="col-md-7 span-1 ">
								<h3>Honey(500 g)</h3>
								<p class="in-para"> There are many variations of passages of Lorem Ipsum.</p>
								<div class="price_single">
									<span class="reducedfrom ">
										<del>$7.00</del>$6.00</span>

									<div class="clearfix"></div>
								</div>
								<h4 class="quick">Quick Overview:</h4>
								<p class="quick_desc"> Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim
									assum. Typi non habent claritatem insitam; es</p>
								<div class="add-to">
									<button class="btn btn-danger my-cart-btn my-cart-btn1 " data-id="13" data-name="Honey" data-summary="summary 13" data-price="6.00"
									    data-quantity="1" data-image="images/of12.png">Add to Cart</button>
								</div>
							</div>
							<div class="clearfix"> </div>
						</div>
					</div>
				</div>
			</div>
			<!-- product -->
			<div class="modal fade" id="myModal14" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				<div class="modal-dialog" role="document">
					<div class="modal-content modal-info">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body modal-spa">
							<div class="col-md-5 span-2">
								<div class="item">
									<img src="images/of13.png" class="img-responsive" alt="">
								</div>
							</div>
							<div class="col-md-7 span-1 ">
								<h3>Chocos(250 g)</h3>
								<p class="in-para"> There are many variations of passages of Lorem Ipsum.</p>
								<div class="price_single">
									<span class="reducedfrom ">
										<del>$5.00</del>$4.50</span>

									<div class="clearfix"></div>
								</div>
								<h4 class="quick">Quick Overview:</h4>
								<p class="quick_desc"> Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim
									assum. Typi non habent claritatem insitam; es</p>
								<div class="add-to">
									<button class="btn btn-danger my-cart-btn my-cart-btn1 " data-id="14" data-name="Chocos" data-summary="summary 14" data-price="4.50"
									    data-quantity="1" data-image="images/of13.png">Add to Cart</button>
								</div>
							</div>
							<div class="clearfix"> </div>
						</div>
					</div>
				</div>
			</div>
			<!-- product -->
			<div class="modal fade" id="myModal15" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				<div class="modal-dialog" role="document">
					<div class="modal-content modal-info">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body modal-spa">
							<div class="col-md-5 span-2">
								<div class="item">
									<img src="images/of14.png" class="img-responsive" alt="">
								</div>
							</div>
							<div class="col-md-7 span-1 ">
								<h3>Oats(1 kg)</h3>
								<p class="in-para"> There are many variations of passages of Lorem Ipsum.</p>
								<div class="price_single">
									<span class="reducedfrom ">
										<del>$4.00</del>$3.50</span>

									<div class="clearfix"></div>
								</div>
								<h4 class="quick">Quick Overview:</h4>
								<p class="quick_desc"> Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim
									assum. Typi non habent claritatem insitam; es</p>
								<div class="add-to">
									<button class="btn btn-danger my-cart-btn my-cart-btn1 " data-id="15" data-name="Oats" data-summary="summary 15" data-price="3.50"
									    data-quantity="1" data-image="images/of14.png">Add to Cart</button>
								</div>
							</div>
							<div class="clearfix"> </div>
						</div>
					</div>
				</div>
			</div>
			<!-- product -->
			<div class="modal fade" id="myModal16" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				<div class="modal-dialog" role="document">
					<div class="modal-content modal-info">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body modal-spa">
							<div class="col-md-5 span-2">
								<div class="item">
									<img src="images/of15.png" class="img-responsive" alt="">
								</div>
							</div>
							<div class="col-md-7 span-1 ">
								<h3>Bread(500 g)</h3>
								<p class="in-para"> There are many variations of passages of Lorem Ipsum.</p>
								<div class="price_single">
									<span class="reducedfrom ">
										<del>$1.00</del>$0.80</span>

									<div class="clearfix"></div>
								</div>
								<h4 class="quick">Quick Overview:</h4>
								<p class="quick_desc"> Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim
									assum. Typi non habent claritatem insitam; es</p>
								<div class="add-to">
									<button class="btn btn-danger my-cart-btn my-cart-btn1 " data-id="16" data-name="Bread" data-summary="summary 16" data-price="0.80"
									    data-quantity="1" data-image="images/of15.png">Add to Cart</button>
								</div>
							</div>
							<div class="clearfix"> </div>
						</div>
					</div>
				</div>
			</div>
			<!-- product -->
			<div class="modal fade" id="myModal17" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				<div class="modal-dialog" role="document">
					<div class="modal-content modal-info">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body modal-spa">
							<div class="col-md-5 span-2">
								<div class="item">
									<img src="images/of16.png" class="img-responsive" alt="">
								</div>
							</div>
							<div class="col-md-7 span-1 ">
								<h3>Moisturiser(500 g)</h3>
								<p class="in-para"> There are many variations of passages of Lorem Ipsum.</p>
								<div class="price_single">
									<span class="reducedfrom ">
										<del>$1.00</del>$0.80</span>

									<div class="clearfix"></div>
								</div>
								<h4 class="quick">Quick Overview:</h4>
								<p class="quick_desc"> Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim
									assum. Typi non habent claritatem insitam; es</p>
								<div class="add-to">
									<button class="btn btn-danger my-cart-btn my-cart-btn1 " data-id="17" data-name="Moisturiser" data-summary="summary 17" data-price="0.80"
									    data-quantity="1" data-image="images/of16.png">Add to Cart</button>
								</div>
							</div>
							<div class="clearfix"> </div>
						</div>
					</div>
				</div>
			</div>
			<!-- product -->
			<div class="modal fade" id="myModal18" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				<div class="modal-dialog" role="document">
					<div class="modal-content modal-info">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body modal-spa">
							<div class="col-md-5 span-2">
								<div class="item">
									<img src="images/of17.png" class="img-responsive" alt="">
								</div>
							</div>
							<div class="col-md-7 span-1 ">
								<h3>Lady Finger(250 g)</h3>
								<p class="in-para"> There are many variations of passages of Lorem Ipsum.</p>
								<div class="price_single">
									<span class="reducedfrom ">
										<del>$1.00</del>$0.80</span>

									<div class="clearfix"></div>
								</div>
								<h4 class="quick">Quick Overview:</h4>
								<p class="quick_desc"> Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim
									assum. Typi non habent claritatem insitam; es</p>
								<div class="add-to">
									<button class="btn btn-danger my-cart-btn my-cart-btn1 " data-id="18" data-name="Lady Finger" data-summary="summary 18" data-price="0.80"
									    data-quantity="1" data-image="images/of17.png">Add to Cart</button>
								</div>
							</div>
							<div class="clearfix"> </div>
						</div>
					</div>
				</div>
			</div>
			<!-- product -->
			<div class="modal fade" id="myModal19" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				<div class="modal-dialog" role="document">
					<div class="modal-content modal-info">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body modal-spa">
							<div class="col-md-5 span-2">
								<div class="item">
									<img src="images/of18.png" class="img-responsive" alt="">
								</div>
							</div>
							<div class="col-md-7 span-1 ">
								<h3>Satin Ribbon Red(1 pc)</h3>
								<p class="in-para"> There are many variations of passages of Lorem Ipsum.</p>
								<div class="price_single">
									<span class="reducedfrom ">
										<del>$1.00</del>$0.80</span>

									<div class="clearfix"></div>
								</div>
								<h4 class="quick">Quick Overview:</h4>
								<p class="quick_desc"> Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim
									assum. Typi non habent claritatem insitam; es</p>
								<div class="add-to">
									<button class="btn btn-danger my-cart-btn my-cart-btn1 " data-id="19" data-name="Satin Ribbon Red" data-summary="summary 19"
									    data-price="0.80" data-quantity="1" data-image="images/of18.png">Add to Cart</button>
								</div>
							</div>
							<div class="clearfix"> </div>
						</div>
					</div>
				</div>
			</div>
			<!-- product -->
			<div class="modal fade" id="myModal20" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				<div class="modal-dialog" role="document">
					<div class="modal-content modal-info">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body modal-spa">
							<div class="col-md-5 span-2">
								<div class="item">
									<img src="images/of19.png" class="img-responsive" alt="">
								</div>
							</div>
							<div class="col-md-7 span-1 ">
								<h3>Grapes(500 g)</h3>
								<p class="in-para"> There are many variations of passages of Lorem Ipsum.</p>
								<div class="price_single">
									<span class="reducedfrom ">
										<del>$1.00</del>$0.80</span>

									<div class="clearfix"></div>
								</div>
								<h4 class="quick">Quick Overview:</h4>
								<p class="quick_desc"> Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim
									assum. Typi non habent claritatem insitam; es</p>
								<div class="add-to">
									<button class="btn btn-danger my-cart-btn my-cart-btn1 " data-id="20" data-name="Grapes" data-summary="summary 20" data-price="0.80"
									    data-quantity="1" data-image="images/of19.png">Add to Cart</button>
								</div>
							</div>
							<div class="clearfix"> </div>
						</div>
					</div>
				</div>
			</div>
			<!-- product -->
			<div class="modal fade" id="myModal21" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				<div class="modal-dialog" role="document">
					<div class="modal-content modal-info">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body modal-spa">
							<div class="col-md-5 span-2">
								<div class="item">
									<img src="images/of20.png" class="img-responsive" alt="">
								</div>
							</div>
							<div class="col-md-7 span-1 ">
								<h3>Clips(1 pack)</h3>
								<p class="in-para"> There are many variations of passages of Lorem Ipsum.</p>
								<div class="price_single">
									<span class="reducedfrom ">
										<del>$1.00</del>$0.80</span>

									<div class="clearfix"></div>
								</div>
								<h4 class="quick">Quick Overview:</h4>
								<p class="quick_desc"> Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim
									assum. Typi non habent claritatem insitam; es</p>
								<div class="add-to">
									<button class="btn btn-danger my-cart-btn my-cart-btn1 " data-id="21" data-name="Clips" data-summary="summary 21" data-price="0.80"
									    data-quantity="1" data-image="images/of20.png">Add to Cart</button>
								</div>
							</div>
							<div class="clearfix"> </div>
						</div>
					</div>
				</div>
			</div>
			<!-- product -->
			<div class="modal fade" id="myModal22" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				<div class="modal-dialog" role="document">
					<div class="modal-content modal-info">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body modal-spa">
							<div class="col-md-5 span-2">
								<div class="item">
									<img src="images/of21.png" class="img-responsive" alt="">
								</div>
							</div>
							<div class="col-md-7 span-1 ">
								<h3>Conditioner</h3>
								<p class="in-para"> There are many variations of passages of Lorem Ipsum.</p>
								<div class="price_single">
									<span class="reducedfrom ">
										<del>$1.00</del>$0.80</span>

									<div class="clearfix"></div>
								</div>
								<h4 class="quick">Quick Overview:</h4>
								<p class="quick_desc"> Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim
									assum. Typi non habent claritatem insitam; es</p>
								<div class="add-to">
									<button class="btn btn-danger my-cart-btn my-cart-btn1 " data-id="22" data-name="Conditioner" data-summary="summary 22" data-price="0.80"
									    data-quantity="1" data-image="images/of21.png">Add to Cart</button>
								</div>
							</div>
							<div class="clearfix"> </div>
						</div>
					</div>
				</div>
			</div>
			<!-- product -->
			<div class="modal fade" id="myModal23" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				<div class="modal-dialog" role="document">
					<div class="modal-content modal-info">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body modal-spa">
							<div class="col-md-5 span-2">
								<div class="item">
									<img src="images/of22.png" class="img-responsive" alt="">
								</div>
							</div>
							<div class="col-md-7 span-1 ">
								<h3>Cleaner(250 kg)</h3>
								<p class="in-para"> There are many variations of passages of Lorem Ipsum.</p>
								<div class="price_single">
									<span class="reducedfrom ">
										<del>$1.00</del>$0.80</span>

									<div class="clearfix"></div>
								</div>
								<h4 class="quick">Quick Overview:</h4>
								<p class="quick_desc"> Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim
									assum. Typi non habent claritatem insitam; es</p>
								<div class="add-to">
									<button class="btn btn-danger my-cart-btn my-cart-btn1 " data-id="23" data-name="Cleaner" data-summary="summary 23" data-price="0.80"
									    data-quantity="1" data-image="images/of22.png">Add to Cart</button>
								</div>
							</div>
							<div class="clearfix"> </div>
						</div>
					</div>
				</div>
			</div>
			<!-- product -->
			<div class="modal fade" id="myModal24" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				<div class="modal-dialog" role="document">
					<div class="modal-content modal-info">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body modal-spa">
							<div class="col-md-5 span-2">
								<div class="item">
									<img src="images/of23.png" class="img-responsive" alt="">
								</div>
							</div>
							<div class="col-md-7 span-1 ">
								<h3>Gel(150 g)</h3>
								<p class="in-para"> There are many variations of passages of Lorem Ipsum.</p>
								<div class="price_single">
									<span class="reducedfrom ">
										<del>$1.00</del>$0.80</span>

									<div class="clearfix"></div>
								</div>
								<h4 class="quick">Quick Overview:</h4>
								<p class="quick_desc"> Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim
									assum. Typi non habent claritatem insitam; es</p>
								<div class="add-to">
									<button class="btn btn-danger my-cart-btn my-cart-b" data-id="24" data-name="Gel" data-summary="summary 24" data-price="0.80"
									    data-quantity="1" data-image="images/of23.png">Add to Cart</button>
								</div>
							</div>
							<div class="clearfix"> </div>
						</div>
					</div>
				</div>
			</div>
		</div>


		<!--footer-->
		<?php include("templates/footer.html");?>
		<!-- //footer-->
	</body>

	</html>