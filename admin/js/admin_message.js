
function load_table() {
    $.ajax({
        url: '/admin/php/load_messages.php',
        dataType: 'json',
        method: 'post',
        success: function (data) {
            if ($.fn.dataTable.isDataTable('#example')) {
                var table = $('#example').DataTable();
                table.destroy();
            }
            $('#example').dataTable({
                data: data,
                columns: [
                    {
                        'data': 'time'
                    },
                    {
                        'data': 'email'
                    },
                    {
                        'data': 'name'
                    },
                    {
                        'data': 'message'
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