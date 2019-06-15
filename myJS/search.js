class search_filter {
    constructor() {
        this.activelength = 0;
        this.price = {
            'low': 10,
            'high': 1000
        };
        this.location = ["Cafe309", "Concordia1", "Concordia2", "Concordia3", "JangoCafe"];
        this.offer = ["0", "1"];
    }
    set_data(data, query) {
        this.data = data;
        this.query = query;
        this.activelength = data.length;
    }
    set_price(lprice, hprice) {
        this.price = {
            'low': lprice,
            'high': hprice
        };
    }
    set_location(location) {
        this.location = location;
    }

    set_offer(offer) {
        this.offer = offer;
    }

    filter_data() {
        var count = this.activelength;
        var loc = this.location;
        var price = this.price;
        var offer = this.offer;
        $.each(this.data, function (i, item) {
            if ((item['price'] < price['low'] || item['price'] > price['high']) ||
                ($.inArray(item['Location'], loc) == -1) ||
                ($.inArray(item['offer'].toString(), offer) == -1)) {
                if (item['show']) {
                    count = count - 1;
                }
                item['show'] = false;
            } else {
                if (!item['show']) {
                    count = count + 1;
                }
                item['show'] = true;
            }
        });
        this.activelength = count;
    }

    sort_data(sort_by, order) {
        this.data.sort(function (a, b) {

            if (sort_by == "timestamp") {
                if (order == "ASC")
                    return new Date(a[sort_by].toString()) < new Date(b[sort_by].toString())
                if (order == "DSC")
                    return new Date(a[sort_by].toString()) > new Date(b[sort_by].toString())
            }
            if (order == "ASC")
                return a[sort_by].toString().localeCompare(b[sort_by].toString());


            if (order == "DSC")
                return (-1) * a[sort_by].toString().localeCompare(b[sort_by].toString());
        });
    }
}

var search_data = new search_filter();

$(document).ready(function () {
    function search_function(parm) {
        $('#search').blur();
        reset_filter_sort();
        var q = $('#search').val();
        if (q.length == 0) {
            return;
        }
        var dataString = {
            "search": q
        };
        $.ajax({
            url: '../phpScripts/search.php',
            data: dataString,
            method: 'post',
            success: function (data) {
                data = jQuery.parseJSON(data);
                search_data.set_data(data, q);
                add_data(data, q);
            }
        });
    }

    $("#search").keypress(function (e) {
        if (e.which == 13) {
            e.preventDefault();
            search_function();
        }
    });

    $("#search_submit").click(function (event) {

        /* stop form from submitting normally */
        event.preventDefault();
        search_function();
    });

    var check1 = false;
    $("#search").autocomplete({
        source: "phpScripts/search_sugession.php",
        select: function (event, ui) {
            check1 = true;

        },
        close: function (event, ui) {

            if (check1) {
                search_function();
                check1 = false;
            }
        }
    }).data("ui-autocomplete")._renderItem = function (ul, item) {
        var exp = new RegExp(this.term, "gi");
        var ans = item.label.replace(exp, '<span class="suggestion_inner">' + this.term + '</span>');
        return $("<li>")
            .append('<span class="suggestion_outer">' + ans + '</span>')
            .appendTo(ul);
    };

});


$(function () {
    $("#slider-range").slider({
        range: true,
        min: 10,
        max: 1000,
        values: [10, 1000],
        slide: function (event, ui) {
            $("#amount").val("Rs" + ui.values[0] + " - Rs" + ui.values[1]);
            search_data.set_price(ui.values[0], ui.values[1]);
            search_data.filter_data();
            add_data(search_data.data, search_data.query);
        }
    });
    $("#amount").val("Rs" + $("#slider-range").slider("values", 0) + " - Rs" + $("#slider-range").slider("values", 1));

    $('#order').multiselect({
        buttonWidth: '100%'
    });
    $('#sortby').multiselect({
        buttonWidth: '100%'
    });
    $('#location_filter').multiselect({
        onChange: filter_location,
        buttonWidth: '100%'
    });

    $('#offer_filter').multiselect({
        onChange: filter_offer,
        buttonWidth: '100%'
    });

});

function filter_location() {
    search_data.set_location($('#location_filter').val());
    search_data.filter_data();
    add_data(search_data.data, search_data.query);
}

function filter_offer() {
    search_data.set_offer($('#offer_filter').val());
    search_data.filter_data();
    add_data(search_data.data, search_data.query);
}

function sort_search() {
    search_data.sort_data($("#sortby").val(), $("#order").val());
    add_data(search_data.data, search_data.query);
}


function reset_filter_sort() {
    $('#offer_filter option').prop('selected', true);
    $('#location_filter option').prop('selected', true);
    $('#sortby option[value="timestamp"]').prop('selected', true);
    $('#order option[value="DSC"]').prop('selected', true);
    $("#slider-range").slider('values', 0, 10);
    $("#slider-range").slider('values', 1, 1000);
}
