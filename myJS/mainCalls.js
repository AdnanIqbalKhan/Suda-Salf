addEventListener("load", function () {
    // setTimeout(hideURLbar, 0);
    // hideURLbar();
}, false);

function hideURLbar() {
    window.scrollTo(0, 1);
}

jQuery(document).ready(function ($) {
    $(".scroll").click(function (event) {
        event.preventDefault();
        $('html,body').animate({
            scrollTop: $(this.hash).offset().top
        }, 1000);
    });

});

window.jQuery || document.write('<script src="js/vendor/jquery-1.11.1.min.js"><\/script>');




// Car functions

$(document).ready(function () {
    /*
    	var defaults = {
    	containerID: 'toTop', // fading element id
    	containerHoverID: 'toTopHover', // fading element hover id
    	scrollSpeed: 1200,
    	easingType: 'linear' 
    	};
    */
    $().UItoTop({
        easingType: 'easeOutQuart'
    });

    $("body").tooltip({
        selector: '[data-toggle="tooltip"]'
    });
    $('[data-toggle="popover"]').popover({
        html: true,
        container: 'body'
    });
});

$(function () {

    var goToCartIcon = function ($addTocartBtn) {
        var $cartIcon = $(".my-cart-icon");
        var $image = $('<img width="50px" height="50px" src="' + $addTocartBtn.data("image") + '"/>').css({
            "position": "absolute",
            "z-index": "999"
        });
        $addTocartBtn.prepend($image);
        var position = $cartIcon[0].getBoundingClientRect();

        var myPos = $image[0].getBoundingClientRect();
        console.log($cartIcon[0].getBoundingClientRect());
        console.log($image[0].getBoundingClientRect());
        $image.animate({
            top: (position.top - myPos.top),
            left: (position.left - myPos.left)
        }, 1500, "linear", function () {
            console.log($image[0].getBoundingClientRect());
            $image.remove();
        });
    }

    $('.my-cart-btn').myCart({
        classCartIcon: 'my-cart-icon',
        classCartBadge: 'my-cart-badge',
        affixCartIcon: true,
        checkoutCart: function (products) {
            // $.each(products, function () {
            //     console.log(this);
            // });
            window.location.href = 'checkout.php';

        },
        clickOnAddToCart: function ($addTocart) {
            goToCartIcon($addTocart);
        },
        getDiscountPrice: function (products) {
            var total = 0;
            $.each(products, function () {
                total += this.quantity * this.price;
            });
            return total * 1;
        }
    });

});



$(document).ready(function () {
    //Horizontal Tab
    $('#parentHorizontalTab').easyResponsiveTabs({
        type: 'default', //Types: default, vertical, accordion
        width: 'auto', //auto or any width like 600px
        fit: true, // 100% fit in a container
        tabidentify: 'hor_1', // The tab groups identifier
        activate: function (event) { // Callback function if tab is switched
            var $tab = $(this);
            var $info = $('#nested-tabInfo');
            var $name = $('span', $info);
            $name.text($tab.text());
            $info.show();
        }
    });

    // Child Tab
    $('#ChildVerticalTab_1').easyResponsiveTabs({
        type: 'vertical',
        width: 'auto',
        fit: true,
        tabidentify: 'ver_1', // The tab groups identifier
        activetab_bg: '#fff', // background color for active tabs in this group
        inactive_bg: '#F5F5F5', // background color for inactive tabs in this group
        active_border_color: '#c1c1c1', // border color for active tabs heads in this group
        active_content_border_color: '#5AB1D0' // border color for active tabs contect in this group so that it matches the tab head border
    });

    //Vertical Tab
    $('#parentVerticalTab').easyResponsiveTabs({
        type: 'vertical', //Types: default, vertical, accordion
        width: 'auto', //auto or any width like 600px
        fit: true, // 100% fit in a container
        closed: 'accordion', // Start closed if in accordion view
        tabidentify: 'hor_1', // The tab groups identifier
        activate: function (event) { // Callback function if tab is switched
            var $tab = $(this);
            var $info = $('#nested-tabInfo2');
            var $name = $('span', $info);
            $name.text($tab.text());
            $info.show();
        }
    });



    $('#horizontalTab').easyResponsiveTabs({
        type: 'default', //Types: default, vertical, accordion           
        width: 'auto', //auto or any width like 600px
        fit: true // 100% fit in a container
    });

   
});