//functions from jquert.mycart.js

class myCartFunctions {
  constructor() {
    this.MathHelper = (function () {
      var objToReturn = {};
      var getRoundedNumber = function (number) {
        if (isNaN(number)) {
          throw new Error('Parameter is not a Number');
        }
        number = number * 1;
        var options = OptionManager.getOptions();
        return number.toFixed(options.numberOfDecimals);
      }
      objToReturn.getRoundedNumber = getRoundedNumber;
      return objToReturn;
    }());

    this.ProductManager = (function () {
      var objToReturn = {};

      /*
      PRIVATE
      */
      localStorage.products = localStorage.products ? localStorage.products : "";
      var getIndexOfProduct = function (id) {
        var productIndex = -1;
        var products = getAllProducts();
        $.each(products, function (index, value) {
          if (value.id == id) {
            productIndex = index;
            return;
          }
        });
        return productIndex;
      }
      var setAllProducts = function (products) {
        localStorage.products = JSON.stringify(products);
      }
      var addProduct = function (id, name, summary, price, quantity, image) {
        var products = getAllProducts();
        products.push({
          id: id,
          name: name,
          summary: summary,
          price: price,
          quantity: quantity,
          image: image
        });
        setAllProducts(products);
      }

      /*
      PUBLIC
      */
      var getAllProducts = function () {
        try {
          var products = JSON.parse(localStorage.products);
          return products;
        } catch (e) {
          return [];
        }
      }
      var updatePoduct = function (id, quantity) {
        var productIndex = getIndexOfProduct(id);
        if (productIndex < 0) {
          return false;
        }
        var products = getAllProducts();
        products[productIndex].quantity = typeof quantity === "undefined" ? products[productIndex].quantity * 1 + 1 : quantity;
        setAllProducts(products);
        return true;
      }
      var setProduct = function (id, name, summary, price, quantity, image) {
        if (typeof id === "undefined") {
          console.error("id required")
          return false;
        }
        if (typeof name === "undefined") {
          console.error("name required")
          return false;
        }
        if (typeof image === "undefined") {
          console.error("image required")
          return false;
        }
        if (!$.isNumeric(price)) {
          console.error("price is not a number")
          return false;
        }
        if (!$.isNumeric(quantity)) {
          console.error("quantity is not a number");
          return false;
        }
        summary = typeof summary === "undefined" ? "" : summary;

        if (!updatePoduct(id)) {
          addProduct(id, name, summary, price, quantity, image);
        }
      }
      var clearProduct = function () {
        setAllProducts([]);
      }
      var removeProduct = function (id) {
        var products = getAllProducts();
        products = $.grep(products, function (value, index) {
          return value.id != id;
        });
        setAllProducts(products);
      }
      var getTotalQuantity = function () {
        var total = 0;
        var products = getAllProducts();
        $.each(products, function (index, value) {
          total += value.quantity * 1;
        });
        return total;
      }
      var getTotalPrice = function () {
        var products = getAllProducts();
        var total = 0;
        $.each(products, function (index, value) {
          total += value.quantity * value.price;
          total = MathHelper.getRoundedNumber(total) * 1;
        });
        return total;
      }

      objToReturn.getAllProducts = getAllProducts;
      objToReturn.updatePoduct = updatePoduct;
      objToReturn.setProduct = setProduct;
      objToReturn.clearProduct = clearProduct;
      objToReturn.removeProduct = removeProduct;
      objToReturn.getTotalQuantity = getTotalQuantity;
      objToReturn.getTotalPrice = getTotalPrice;
      return objToReturn;
    }());
  }
}
