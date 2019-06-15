$(document).ready(function () {
  var Dialog_Open = false;
  $(document.body).on('click', '#Order_btn', function () {
    if (!Dialog_Open) {
      Dialog_Open = true;

      var newDiv = $(document.createElement('div'));
      newDiv.attr('id', 'order_dialog');
      newDiv.attr('title', 'Invoice');
      newDiv.attr('id', 'invoice_dialog');
      // newDiv.css('width', '206mm');
      // newDiv.css('height', '287mm');

      products = P.ProductManager.getAllProducts();



      var out = '<div id="invoice_body">\
            <div class="invoice_clearfix invoice_header">\
              <div id="logo">\
                <img src="img/logo.png">\
              </div>\
              <h1 class="invoice_h1">INVOICE</h1>\
              <div id="company" class="invoice_clearfix">\
                <div>Suda Salf</div>\
                <div>NUST<br /> Islamabad</div>\
                <div>(+92) 12345678</div>\
                <div>\
                  orders@sudasalf.com\
                </div>\
              </div>\
              <div id="project">\
                <div>\
                  <span>CUSTOMER</span> Customer Name</div>\
                <div>\
                  <span>EMAIL</span>\
                  Customer Email\
                </div>\
                <div>\
                  <span>TIME</span>' + $.formatDateTime('g:ii:ss a', new Date($.now())) + '</div>\
                <div>\
                  <span>DATE</span>' + $.formatDateTime('DD MM dd, yy', new Date($.now())) + '</div>\
              </div>\
            </div>\
            <div>\
              <table>\
                <thead>\
                  <tr>\
                    <th class="service">PRODUCT</th>\
                    <th class="desc">DESCRIPTION</th>\
                    <th>PRICE</th>\
                    <th>QTY</th>\
                    <th>TOTAL</th>\
                  </tr>\
                </thead>\
                <tbody>';
      GrandTotal = 0;

      $.each(products, function () {
        var total = parseFloat(this.quantity * this.price);
        GrandTotal += total;
        out += '<tr>\
                    <td class="service">\
                        <img width="100px" height="100px" src="' +
          this.image + '" class="img-responsive" alt=""></td>\
                        <td class="desc">' + this.name + '</td>\
                        <td class="unit">Rs ' + accounting.format(this.price, 2) + '</td>\
                        <td class="qty">' + this.quantity + '</td>\
                        <td class="total">Rs' + accounting.format(total, 2) + '</td></tr>';
      });
      var tax = GrandTotal * 0.17;
      out += '<tr>\
                    <td colspan="4">SUBTOTAL</td>\
                    <td class="total">Rs ' + accounting.format(GrandTotal, 2) + '</td>\
                  </tr>\
                  <tr>\
                    <td colspan="4">TAX 17%</td>\
                    <td class="total">Rs ' + accounting.format(tax, 2) + '</td>\
                  </tr>\
                  <tr>\
                    <td colspan="4" class="grand total">GRAND TOTAL</td>\
                    <td class="grand total">Rs ' + accounting.format((GrandTotal + tax), 2) + '</td>\
                  </tr>\
                </tbody>\
              </table>\
            </div>\
            <div class="invoice_footer">\
              Invoice was created on a computer and is valid without the signature and seal.\
            </div>\
          </div>';
      $(newDiv).html(out);


      P.ProductManager.clearProduct();
      redraw_table();
      $(newDiv).dialog({
        height: $(window).height() * 0.96,
        width: 'auto',
        close: function (event, ui) {
          Dialog_Open = false;
          $(this).dialog('destroy').remove();
        },
        buttons: {
          "Save as PDF": function () {
            $(newDiv).LoadingOverlay("show");
            html2canvas(document.querySelector("#invoice_body")).then(canvas => {

              var imgData = canvas.toDataURL('image/png');

              var h = Math.max(Math.ceil($("#invoice_body").height() / 3.75), 300);
              var doc = new jsPDF('p', 'mm', [h, 210]); //210mm wide and 297mm high
              doc.addImage(imgData, 'PNG', 2, 2);

              $(newDiv).LoadingOverlay("hide", true);
              doc.save('invoice.pdf');


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
});

$(window).resize(function () {


  $("#invoice_dialog").dialog("option", "height", $(window).height() * 0.95);
  if ($(window).width() < 900) {
    $("#invoice_dialog").dialog("option", "width", $(window).width() * 0.9);
  } else {
    $("#invoice_dialog").dialog("option", "width", 'auto');
  }
});