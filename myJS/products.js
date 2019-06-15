class Product_View {
    setproduct(product) {
        this.product = product;
    }

    create_gen_card(col) {
        var product = this.product;
        var rat = parseFloat(product.rating) * 5;
        var out = '<div class="col-md-' + col + ' m-wthree">\
                <div class="col-m" >\
                <a title="Click to show details" href="" data-toggle="modal" data-target="#productModal' + product.id + '" class="offer-img">\
                <img src="img/products/' + product.image + '" class="img-responsive" alt="">';

        if (product.offer) {
            out += '<div class="offer"><p><span>Offer</span></p></div>';
        }
        out += '</a>\
            <div class="mid-1">\
            <div class="women">\
            <h6 title="Added on" data-content="' + $.formatDateTime('DD MM dd, yy g:ii:ss a', new Date(product.timestamp)) + 
            '" data-toggle="popover" data-placement="bottom"><a class="single_page_link" href="single.php?id=' + product.id + '">' + product.name + '</a>(' + product.unit + ')</h6>\
            </div>\
            <div class="mid-2">\
            <a  class="googleMapPopUp" rel="nofollow" href="https://maps.google.com/maps?q=' + product.Cordinates + '"\
            target="_blank" title="Click to show location">\
            <p><i class="fas fa-map-marker-alt"></i> ' + product.Location + '</p></a>\
            <div class="block">\
            <div class="starbox small ghosting" title="' + rat + '" data-start-value="' + product.rating + '"> </div>\
            </div><div class="clearfix"></div></div>\
            <div class="mid-2"><p >';

        if (product.offer) {
            out += ' <label>Rs ' + accounting.format(product.oldprice, 2) + '</label>';
        }

        out += '<em class="item_price">Rs ' + accounting.format(product.price, 2) + '</em></p></div>\
            </div><div class="add">\
            <button class="btn btn-danger my-cart-btn my-cart-b" data-id="' + product.id + '" data-name="' +
            product.name + '" data-summary="' + product.summary + '" data-price="' + accounting.format(product.price, 2) + '"\
            data-quantity="1" data-image="img/products/' + product.image + '">Add to Cart</button>\
            </div></div></div></div>';

        return out;
    }

    create_card() {
        return this.create_gen_card(3);
    }

    create_top() {
        return this.create_gen_card(4);
    }

    create_modal() {
        var product = this.product;

        var out = '<div class="modal fade dyn_modal" id="productModal' + product.id + '" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">\
                <div class="modal-dialog" role="document">\
                <div class="modal-content modal-info">\
                <div class="modal-header">\
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>\
                </div><div class="modal-body modal-spa">\
                <div class="col-md-5 span-2">\
                <div class="item">\
                <img src="img/products/' + product.image + '" class="img-responsive" alt="">\
                </div></div><div class="col-md-7 span-1 ">\
                <h3><a class="single_page_link" href="single.php?id=' + product.id + '">' + product.name + '</a>(' + product.unit + ')</h3>\
                <a class="googleMapPopUp" rel="nofollow" href="https://maps.google.com/maps?q=' + product.Cordinates + '"\
                target="_blank" title="' + product.Location + ' Location">\
                <p class="in-para"><i class="fas fa-map-marker-alt"></i>  Available at ' + product.Location + '</p></a>\
                <div class="price_single">';
        if (product.offer) {
            out += '<span class="reducedfrom "><del>Rs ' + accounting.format(product.oldprice, 2) + '</del>&nbsp;';
        }
        out += 'Rs ' + accounting.format(product.price, 2) + '</span>\
            <div class="clearfix"></div>\
            </div>\
            <h4 class="quick">Quick Overview:</h4>\
            <p class="quick_desc"> ' + product.description + '</p>\
            <div class="add">\
            <button class="btn btn-danger my-cart-btn my-cart-b" data-id="' + product.id + '" data-name="' +
            product.name + '" data-summary="' + product.summary + '" data-price="' + accounting.format(product.price, 2) + '"\
            data-quantity="1" data-image="img/products/' + product.image + '">Add to Cart</button>\
            </div>\
            </div>\
            <div class="clearfix"> </div>\
            </div></div></div></div>';

        return out;
    }
}

class SubCategory_View {
    setsubcat(subcat) {
        this.subcat = subcat;
    }

    create_card(col) {
        return '<div class="col-md-' + col + ' kic-top1">\
					<a href="subcategory.php?id=' + this.subcat.id + '">\
						<img src="img/sub_cat/' + this.subcat.image + '" class="img-responsive" alt="">\
					</a>\
					<h6>' + this.subcat.title + '</h6>\
					<p>' + this.subcat.description + '</p>\
				</div>';
    }

    create_top() {
        return this.create_card(4);
    }

    create_all() {
        return this.create_card(3);
    }
}




function reinit() {
    // starbox init
    jQuery('.starbox').each(function () {
        var starbox = jQuery(this);
        starbox.starbox({
            average: starbox.attr('data-start-value'),
            changeable: starbox.hasClass('unchangeable') ? false : starbox.hasClass(
                'clickonce') ? 'once' : true,
            ghosting: starbox.hasClass('ghosting'),
            autoUpdateAverage: starbox.hasClass('autoupdate'),
            buttons: starbox.hasClass('smooth') ? false : starbox.attr('data-button-count') || 5,
            stars: starbox.attr('data-star-count') || 5
        }).bind('starbox-value-changed', function (event, value) {
            if (starbox.hasClass('random')) {
                var val = Math.random();
                starbox.next().text(' ' + val);
                return val;
            }
        })
    });

    //google map init
    $('.googleMapPopUp').each(function () {
        var thisPopup = $(this);
        thisPopup.colorbox({
            iframe: true,
            innerWidth: 500,
            innerHeight: 400,
            opacity: 0.7,
            href: thisPopup.attr('href') + '&ie=UTF8&t=h&output=embed'
        });
    });
}

function add_data(data, q) {
    $(".content-top").show();
    $('#search_count').empty();
    $("#search_results").empty();
    $("#productModalsContainer>.dyn_modal").remove();
    $("#search_title").html('Search Results for <strong>' + q + '</strong>');

    if (jQuery.isEmptyObject(search_data.data)) {
        $("#search_results").append('<div class="alert alert-warning alert-dismissable">\
                <button aria-hidden="true" class="close" type="button"> &times; </button>\
                No results found </div>');
    } else {
        $('#search_count').html('<div class="alert alert-info">\
        ' + search_data.activelength + ' products found </div>');

        var proc = new Product_View();
        $.each(search_data.data, function (i, item) {
            if (item['show']) {
                proc.setproduct(item);
                $("#search_results").append(proc.create_card());
                $("#productModalsContainer").append(proc.create_modal());
            }
        });
        $("#search_results").append('<div class="clearfix"></div>');
    }
    reinit();
}

$(document).ready(function () {
    reinit();
    $(".content-top").hide();


    $(document).on('click', '#search_results .alert .close', function () {
        $(".content-top").hide();
    });

    $('body').popover({
        selector: '[data-toggle=popover]',
        trigger: 'hover'
    });
});