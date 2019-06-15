UserTypes = ['Customer', 'Admin', 'Shopkeeper'];
UserStatus = ['Active', 'Pending', 'Banned', 'Inactive'];


function load_table() {
    $.ajax({
        url: '/admin/php/load_user_data.php',
        dataType: 'json',
        method: 'post',
        success: function (data) {
            if ($.fn.dataTable.isDataTable('#example')) {
                var table = $('#example').DataTable();
                table.destroy();
            }
            $('#example').dataTable({
                data: data,
                createdRow: function (row, data, dataIndex) {
                    $(row).attr('data-user-image', data.userimage);
                },
                columns: [{
                        'data': 'email'
                    },
                    {
                        'data': 'name'
                    },
                    {
                        'data': 'type'
                    },
                    {
                        'data': 'status',
                        'render': function (status) {
                            var className = '';
                            switch (status) {
                                case "Active":
                                    className = "label-success";
                                    break;
                                case "Pending":
                                    className = "label-warning";
                                    break;
                                case "Banned":
                                    className = "label-danger";
                                    break;
                                case "Inactive":
                                    className = "label-default";
                                    break;
                                default:
                                    className = "label-info";
                            }
                            return '<span class="label ' + className +
                                '">' + status + '<span>';
                        }
                    },
                    {
                        'data': 'action',
                        'render': function (action) {
                            return '<ul class="actions">\
                                            <li class="view" title="view"><i class="fas fa-eye"></i></li>\
                                            <li class="edit" title="edit"><i class="fas fa-pencil-alt"></i></li>\
                                            <li class="delete" title="delete"><i class="fas fa-trash-alt"></i></li>\
                                        </ul>';
                        }
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

    var Dialog_Open = false;
    $(document.body).on('click', '.view', function () {
        if (!Dialog_Open) {
            Dialog_Open = true;
            var newDiv = $(document.createElement('div'));
            newDiv.attr('id', 'view_record_dialog');
            newDiv.attr('title', 'View Record');
            var row = $(this).closest('tr');

            $(newDiv).html('<div id="img_container"> <img src="/img/profileImage/' + row.attr('data-user-image') + '" width="100%"/></div>\
                        <table class="table table-striped table-bordered" style="width:100%">\
                        <tr>\
                            <th>Email</th>\
                            <td>' + row.find('td:eq(0)').text() + '</td>\
                        </tr>\
                        <tr>\
                            <th>Name</th>\
                            <td>' + row.find('td:eq(1)').text() + '</td>\
                        </tr>\
                        <tr>\
                            <th>Type</th>\
                            <td>' + row.find('td:eq(2)').text() + '</td>\
                        </tr>\
                        <tr>\
                            <th>Status</th>\
                            <td>' + row.find('td:eq(3)').html() + '</td>\
                        </tr>\
                    </table>');
            $(newDiv).dialog({
                close: function (event, ui) {
                    Dialog_Open = false;
                    $(this).dialog('destroy').remove();
                }
            });

            $('.ui-dialog :button').blur();
        } else {
            alert("Close opened dialog first");
        }
    });

    $(document.body).on('click', '.edit', function () {
        if (!Dialog_Open) {
            Dialog_Open = true;
            var newDiv = $(document.createElement('div'));
            newDiv.attr('id', 'edit_record_dialog');
            newDiv.attr('title', 'Edit Record');
            var row = $(this).closest('tr');

            var row_data = '<div id="img_container"> <img src="/img/profileImage/' + row.attr('data-user-image') + '" width="100%"/></div>\
                        <table class="table table-striped table-bordered" style="width:100%">\
                        <tr>\
                            <th>Email</th>\
                            <td>' + row.find('td:eq(0)').text() + '</td>\
                        </tr>\
                        <tr>\
                            <th>Name</th>\
                            <td>' + row.find('td:eq(1)').text() + '</td>\
                        </tr>\
                        <tr>\
                            <th>Type</th>\
                            <td>\
                            <select name="type">';
            $.each(UserTypes, function (i, item) {
                var k = i + 1;
                if (row.find('td:eq(2)').text() == item) {
                    row_data += '<option value="' + k + '" selected >' + item + '</option>';
                } else {
                    row_data += '<option value="' + k + '">' + item + '</option>';
                }
            });
            row_data += ' </select></td>\
                        </tr>\
                        <tr>\
                            <th>Status</th>\
                            <td><select name="type">';
            $.each(UserStatus, function (i, item) {
                var k = i + 1;
                if (row.find('td:eq(3)').text() == item) {
                    row_data += '<option value="' + k + '" selected >' + item + '</option>';
                } else {
                    row_data += '<option value="' + k + '">' + item + '</option>';
                }
            });
            row_data += ' </select></td>\
                        </tr>\
                    </table>';

            $(newDiv).html(row_data);
            $(newDiv).dialog({
                close: function (event, ui) {
                    Dialog_Open = false;
                    $(this).dialog('destroy').remove();
                },
                buttons: {
                    "Save": function () {
                        var table = $("#edit_record_dialog").find('table');
                        dataString = {
                            "usertype": table.find('tr:eq(2)').find('td').find('select option:selected:selected').val(),
                            "userstatus": table.find('tr:eq(3)').find('td').find('select option:selected:selected').val(),
                            "userid": table.find('tr:eq(0)').find('td').text(),
                            "action": "Update"
                        };

                        $.ajax({
                            url: '/admin/php/update_user.php',
                            data: dataString,
                            method: 'post',
                            success: function (data) {
                                load_table();
                                $("#edit_record_dialog").dialog("close");
                            }
                        });
                    },
                    "Cancel": function () {
                        $(this).dialog("close");
                    }
                }
            });

            $('.ui-dialog :button').blur();
        } else {
            alert("Close opened dialog first");
        }
    });


    $(document.body).on('click', '.delete', function () {
        if (!Dialog_Open) {
            Dialog_Open = true;
            var newDiv = $(document.createElement('div'));
            newDiv.attr('id', 'delete_record_dialog');
            newDiv.attr('title', 'Delete Record');
            var row = $(this).closest('tr');

            var row_data = 'Are you sure to delete user <strong>' + row.find('td:eq(1)').text() + '</strong> having email <strong id="email">';

            row_data += row.find('td:eq(0)').text() + '</strong> ?';
            $(newDiv).html(row_data);
            $(newDiv).dialog({
                close: function (event, ui) {
                    Dialog_Open = false;
                    $(this).dialog('destroy').remove();
                },
                buttons: {
                    "Delete": function () {
                        dataString = {
                            "userid": $(this).closest('.ui-dialog-content').find('#email').text(),
                            "action": "Delete"
                        };

                        $.ajax({
                            url: '../phpScripts/admin/update_user.php',
                            data: dataString,
                            method: 'post',
                            success: function (data) {
                                load_table();
                                $("#delete_record_dialog").dialog("close");
                            }
                        });
                    },
                    "Cancel": function () {
                        $(this).dialog("close");
                    }
                }
            });

            $('.ui-dialog :button').blur();
        } else {
            alert("Close opened dialog first");
        }
    });


    $('#download_file').click(function () {

        var win = window.open('/phpScripts/logfile_out.php', '_blank');
        if (win) {
            //Browser has allowed it to be opened
            // win.focus();
        } else {
            //Browser has blocked it
            alert('Please allow popups for this website');
        }
    });


});