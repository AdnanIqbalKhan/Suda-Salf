<?php
include_once('phpScripts/login_header.php');
?>
<!DOCTYPE html>
<html>

<head>
	<?php include("templates/head.html");?>
	<link href="myCSS/create_pdf_invoice.css" rel="stylesheet">
	<script src="myJS/create_pdf_invoice.js"></script>
</head>

<body>
	<?php include("templates/header.html");?>

	<!--banner-->
	<div class="banner-top">
		<div class="container">
			<h3>Check Out</h3>
			<h4>
				<a href="index.php">Home</a>
				<label>/</label>checkout</h4>
			<div class="clearfix"> </div>
		</div>
	</div>

	<!-- contact -->
	<div class="check-out">
		<div class="container">
			<div class="spec ">
				<h3>Check Out</h3>
				<div class="ser-t">
					<b></b>
					<span>
						<i></i>
					</span>
					<b class="line"></b>
				</div>
			</div>
			<table class="table" id="checkout_table">
			</table>
		</div>
	</div>
	<script>
		var P = new myCartFunctions();

		var products;
		var GrandTotal = 0;
		function redraw_table() {
			$("#checkout_table").empty();
			products = P.ProductManager.getAllProducts();
			$("#checkout_table").append(products.length ?
				'<tr><th class="t-head head-it">Products</th><th class="t-head">Unit Price</th><th class="t-head">Quantity</th><th class="t-head">Total</th></tr>' :
				''
			);

			$.each(products, function () {
				var total = parseFloat(this.quantity * this.price);
				GrandTotal += total;
				$("#checkout_table").append(
					'<tr data-id="' + this.id +
					'">\
				<td class="ring-in t-data">\
				<a href="single.php" class="at-in">\
				<img width="100px" height="100px" src="' +
					this.image + '" class="img-responsive" alt="">\
				</a>\
				<div class="sed">\
				<h5>' +
					this.name +
					'</h5>\
				</div>\
				<div class="clearfix"> </div>\
				<div class="myclose">\
				<i class="fa fa-times" aria-hidden="true"></i>\
				</div>\
				</td>\
				<td class="t-data">Rs ' +
					this.price +
					'</td>\
				<td class="t-data">\
				<div class="quantity">\
				<div class="quantity-select">\
				<div class="entry value-minus">&nbsp;</div>\
				<div class="entry value">\
				<span class="span-1">' +
					this.quantity +
					'</span>\
				</div>\
				<div class="entry value-plus active">&nbsp;</div>\
				</div></div></td>\
				<td class="t-data">Rs <span class="check_total">' +
					accounting.format(total, 2) + '</span></td></tr>'
				);
			});

			$("#checkout_table").append(products.length ?
				'<tr>' +
				'<td class="t-head"><strong>Grand Total</strong></td>' +
				'<td class="t-data"><button class="btn btn-default my-order-btn" id="Order_btn">Place Order</button></td>' +
				'<td></td>' +
				'<td class="t-data" ><h5><strong>Rs <span id="check_GrandTotal">' + accounting.format(GrandTotal,2) +
				'</span></strong></h5></td>' +
				'</tr>' :
				'<tr class="alert alert-danger" role="alert"><td style="text-align:center;"><h3>Your cart is empty</h3></td></tr>'
			);
		}

		redraw_table();
		$(document).ready(function (c) {
			$('.myclose').on('click', function (c) {
				$(this).closest('tr').fadeOut('slow', function (c) {

					var old_total = parseFloat($(this).closest('tr').find('.check_total').text());
					var old_Gtotal = parseFloat($('#check_GrandTotal').text());

					$('#check_GrandTotal').text(accounting.format((old_Gtotal - old_total),2));

					var id = $(this).closest('tr').attr('data-id');
					P.ProductManager.removeProduct(id);

					$('.badge.badge-notify.my-cart-badge').text(P.ProductManager.getTotalQuantity());

					$(this).remove();

				});
			});

			$('.value-plus').on('click', function () {
				var old_total = parseFloat($(this).closest('tr').find('.check_total').text());
				var old_Gtotal = parseFloat($('#check_GrandTotal').text());
				var divUpd = $(this).parent().find('.value').text();


				var old_quantity = divUpd;
				var unit = parseFloat(old_total / old_quantity);

				var newVal = parseFloat(divUpd) + 1;
				$(this).parent().find('.value').text(newVal);

				$(this).closest('tr').find('.check_total').text(accounting.format((unit * newVal),2));
				$('#check_GrandTotal').text(accounting.format((old_Gtotal - old_total + (unit * newVal)),2));

				var id = $(this).closest('tr').attr('data-id');
				P.ProductManager.updatePoduct(id, newVal);
			});

			$('.value-minus').on('click', function () {
				var divUpd = $(this).parent().find('.value').text();
				var newVal = parseFloat(divUpd) - 1;
				if (newVal >= 1) {
					var old_total = parseFloat($(this).closest('tr').find('.check_total').text());
					var old_Gtotal = parseFloat($('#check_GrandTotal').text());

					var old_quantity = divUpd;
					var unit = old_total / old_quantity;

					$(this).parent().find('.value').text(newVal);

					$(this).closest('tr').find('.check_total').text(accounting.format((unit * newVal),2));
					$('#check_GrandTotal').text(accounting.format((old_Gtotal - old_total + (unit * newVal)),2));

					var id = $(this).closest('tr').attr('data-id');
					P.ProductManager.updatePoduct(id, newVal);
				}
			});
		});
	</script>


	<!--footer-->
	<?php include("templates/footer.html");?>
	<!-- //footer-->
</body>

</html>