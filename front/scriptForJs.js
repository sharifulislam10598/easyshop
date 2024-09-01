
jQuery(document).ready(function () {

  var currentUrl = window.location.href;

  $('.top-menu li a').each(function() {
      var linkUrl = $(this).attr('href');
      if (currentUrl.includes(linkUrl)) {
          $(this).addClass('active');
          $(this).css({color:"#E02222"});
      }
  });




  let SITE_URL = 'http://localhost/easyshop/';

  // send cart information in db
  function onSubmitForm(event) {
    event.preventDefault();
    let formData = $(this).serialize();
    formData += `&insert_request=${encodeURIComponent('true')}`;
    formData += `&redirect_url=${encodeURIComponent(window.location.href)}`;
    $.ajax({
      type: 'POST',
      url: SITE_URL + 'controllers/classes/cart/add-to-cart.php',
      data: formData,
      success: function (response) {
        var result = JSON.parse(response)

        if(result.status === 'not_logged_in'){
          window.location.href = SITE_URL + '/front/shop-login.php';
        } else if (result.status === 'success') {
          getdata();
          get_cart_item_list();
          alert('Product_is carted.');
        
          $(event.target).find(".add-to-cart-btn").text('Add to more');
        }
      },
      error: function (error) {
        console.error('Form submission error:', error);
      }
    });
  }
  $('.add-to-cart-form').on('submit', onSubmitForm);

  // --------------------------------
  // cart item list script.............................
  getdata();
  function getdata() {
    $.ajax({
      type: 'GET',
      url: SITE_URL + 'controllers/classes/cart/carted-product-info.php',
      success: function (response) {
        const data = JSON.parse(response);
        let productCount = 0;
        let totalPrice = 0;
        let htmlContent = '';
        data.forEach(function (item) {
          htmlContent += '<li>' +
            '<img src="' + SITE_URL + item['items_img'] + '" width="37" height="34">' +
            '<span class="cart-content-count">x' + item['quantity'] + '</span>' +
            '<strong><a>' + item['items_name'] + '</a></strong>' +
            '<em>$' + item['quantity'] * item['price'] + '</em>' +
            '<a data-item-id="' + item['id'] + '" class="del-goods cart-item-delete">&nbsp;</a>' +
            '</li>';
          productCount++
          totalPrice = totalPrice + (item['quantity'] * item['price']);
        });
        $('#topCartContainer').html(htmlContent);
        $('.top-cart-product-count').html(productCount + ' items');
        $('.top-cart-total-price').html('$ ' + totalPrice);
      },
      error: function (error) {
        console.error('Error fetching data:', error);
        $('#dataContainer').htmlContent('An error occurred while fetching data.');
      }
    });
  }

  // delete carted product....................
  $('#topCartContainer').on('click', '.cart-item-delete', delete_form_cart);
  $('.carted-product').on('click', '.cart-item-delete', delete_form_cart)
  
  function delete_form_cart() {
    let id = $(this).data('item-id');
    $.ajax({
      type: 'POST',
      url: SITE_URL + 'controllers/classes/cart/delete-cart-item.php?id=' + id,
      success: function () {
        getdata();
        get_cart_item_list()
      },
      error: function (error) {
        console.error('Form submission error:', error);
      }
    });

  }
  // ----------------------------------------------------------
  // shopping cart page script............................


  function get_cart_item_list() {
    $.ajax({
      type: 'GET',
      url: SITE_URL + 'controllers/classes/cart/carted-product-info.php',
      success: function (response) {
        const data = JSON.parse(response);
        if (data == false) {
          $('.empty-data').html('<strong>Your cart is empty !</strong>').css({ 'color': 'red', 'text-align': 'center', 'font-size': '30px' })
        }
        let ProductList = '';
        displaySubTotal = 0;
        data.forEach(function (item) {
          ProductList +=
            '<tr>\
                    <td class="goods-page-image">\
                      <a href="javascript:;"><img src="' + SITE_URL + item['items_img'] + '" alt="Berry Lace Dress"></a>\
                    </td>\
                    <td class="goods-page-description">\
                      <h3><a href="javascript:;">' + item['items_name'] + '</a></h3>\
                      <p><strong>Item 1</strong> - Color : ' + item['color'] + '; Size:' + item['size'] + '</p>\
                      <em><a href="">More info is here</a></em>\
                    </td>\
                    <td class="goods-page-ref-no">\
                    ref_no javc2133\
                    </td>\
                    <td class="goods-page-quantity">\
                      <div class="product-quantity">\
                          <input data-item-id="' + item['id'] + '" type="text" value="' + item['quantity'] + '" readonly class=" form-control input-sm quantity">\
                      </div>\
                    </td>\
                    <td class="goods-page-price">\
                      <strong><span>$</span></strong><strong class="unit-price">' + item['price'] + '</strong>\
                    </td>\
                    <td class="goods-page-total">\
                      <strong><span>$</span></strong><strong class="total-price">' + item['quantity'] * item['price'] + '</strong>\
                    </td>\
                    <td class="del-goods-col">\
                      <a data-item-id="' + item['id'] + '"class="del-goods cart-item-delete">&nbsp;</a>\
                    </td>\
                  </tr>'
          displaySubTotal = displaySubTotal + (item['quantity'] * item['price']);

        })
        // displaySubTotal = Number(displaySubTotal);
        $('#cartedProduct').html(ProductList);
        $('.sub-total').html('$' + displaySubTotal)
        $('.total-cost').html('$' + displaySubTotal);
        Layout.initTouchspin();
      }
    })
  }
  get_cart_item_list();



  // cart page price calculate.............................
  $('.carted-product').on('click', '.fa-angle-up, .fa-angle-down', function (e) {
    let quantity = $(this).closest('tr').find('.quantity').val();
    let unitPrice = $(this).closest('tr').find('.unit-price').html();
    let totalPrice = $(this).closest('tr').find('.total-price');

    if ($(this).hasClass("fa-angle-up") || $(this).hasClass("fa-angle-down")) {
      let total = quantity * unitPrice;
      totalPrice.html(total);
      totalrow = $(this).closest('tbody').find('.total-price');
      displaySubTotal = 0
      totalrow.each(function () {
        displaySubTotal = displaySubTotal + parseFloat($(this).text());
      })
      
      $('.sub-total').html('$' + displaySubTotal);
      $('.total-cost').html('$' + displaySubTotal);

      // update prouct quantity..................................

      let id = $(this).closest('tr').find('.quantity').data('item-id');
      console.log(id);
      $.ajax({
        type: 'POST',
        url: SITE_URL + 'controllers/classes/cart/update-product-quantity.php',
        data: {
          id: id,
          quantity: quantity
        },
        success: function (response) {
          getdata();
        }
      })

    }
  })

  // check out page scritpl..............................................

  function delivery_details_form_submit(event) {
    event.preventDefault();
    let formData = $(this).serialize();
    $.ajax({
      type: 'POST',
      url: SITE_URL + 'controllers/classes/checkout/delivery-details-add.php',
      data: formData,
      success: function (response) {
        console.log(response);

      },
      error: function (error) {
        console.error('Form submission error:', error);
      }
    });

    console.log(formData);


  }
  $('.delivery-details-form').on('submit', delivery_details_form_submit);

  function delivery_method_form_submit(event) {
    event.preventDefault();
    let formData = $(this).serialize();
    $.ajax({
      type: 'POST',
      url: SITE_URL + 'controllers/classes/checkout/delivery-method-add.php',
      data: formData,
      success: function (response) {
        console.log(response);

      },
      error: function (error) {
        console.error('Form submission error:', error);
      }
    });
    console.log(formData);

  }
  $('.shipping-method-form').on('submit', delivery_method_form_submit);

});