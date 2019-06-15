function load_table() {
    $.ajax({
        url: '/phpScripts/load_order_history.php',
        dataType: 'json',
        method: 'post',
        success: function (data) {
            if ($.fn.dataTable.isDataTable('#example')) {
                var table = $('#example').DataTable();
                table.destroy();
            }
            $('#example').dataTable({
                data: data,
                columns: [{
                        'data': 'Orderid'
                    },
                    {
                        'data': 'Order_Amount'
                    },
                    {
                        'data': 'Order_timestamp'
                    },
                    {
                        'data': 'ShopKeeper_email'
                    },
                    {
                        'data': 'Customer_email'
                    }
                ],
                "language": {
                    "paginate": {
                        "next": "»",
                        "previous": "«"
                    }
                },
                stateSave: true
            });
        }
    });
}

var dataTable_Instance;


$(document).ready(function () {

    load_table();
});