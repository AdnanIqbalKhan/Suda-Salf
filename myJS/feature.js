var header_t = ["#Htad1", "#Htad2", "#Htad3", "#Htad4"];
var model_t = ["#tab1", "#tab2", "#tab3", "#tab4"];

$(document).ready(function () {
    var pord_factory = new Product_View();

    function create_feature_tabs(data) {
        var i = 0;
        $.each(data, function (key, products) {
            $(header_t[i]).text(key);
            out_body = '<div class=" con-w3l">';
            $.each(products, function (key1, product) {
                pord_factory.setproduct(product);
                out_body += pord_factory.create_card();
            });
            out_body += '<div class="clearfix"></div></div>';
            $(model_t[i]).html(out_body);
            i = i + 1;
        });
    }
    $.getJSON("/phpScripts/feature.php", function (data) {
        create_feature_tabs(data);
    });
});