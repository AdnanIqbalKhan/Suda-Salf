function create_navbar_cat(data) {
    var out = '<ul class="dropdown-menu multi-column columns-3">\
            <div class="row">';
    $.each(data, function (cat_key, category) {
        out += '<div class="col-sm-4">\
                <ul class="multi-column-dropdown">\
                    <li class="dropdown-submenu">\
                        <a style="font-size:1.5em" href="category.php?id=' + category[0] + '">' + cat_key + ' <i class="fas fa-angle-right"></i>\
                        <br><img width="100%" src="img/cat/' + category[1] + '">\
                        </a>\
                        <ul class="dropdown-menu">';
        $.each(category[2], function (sub_key, sub_category) {
            out += '<li class="dropdown-submenu">\
                                        <a href="subcategory.php?id=' + sub_category[0] + '">' + sub_key + '<i class="fas fa-angle-right"></i></a>\
                                        <ul class="dropdown-menu">';
            $.each(sub_category[1], function (prod_key, prod) {
                out += '<li>\
                        <a href="single.php?id=' + prod + '">' + prod_key + '</a>\
                    </li>';
            });
            out += '</ul>\
                    </li>';
        });
        out += '</ul>\
                    </li>\
                </ul>\
            </div>';
    });
    return out;
}

$(document).ready(function () {

    $.getJSON("/phpScripts/nav_bar_data.php", function (data) {
        $('#cat_drop_base').append(create_navbar_cat(data));
    });
    $(".dropdown-toggle").dropdown();

    $('body').on('click', ".dropdown-menu li a", function (event) {//open new page
        event.preventDefault();
        event.stopPropagation();
        window.location = $(this).attr("href");
        return false;
    });

    $('body').on('click', ".dropdown-menu li a i", function (event) { //open dropdown
        event.preventDefault();
        return false;
    });
});