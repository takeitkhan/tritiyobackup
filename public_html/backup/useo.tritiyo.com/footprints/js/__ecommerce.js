/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

//var $ = jQuery.noConflict();
jQuery(document).ready(function ($) {
    $.noConflict();
    /*Product Filter Functionality
     * 
     * 
     * 
     * var product_filter = {
     order_field: "id",
     order_type: "desc",
     max_price: 0,
     min_price: 0,
     search_key: "<?php echo $this->input->get('search_key'); ?>" ,
     cat_id: <?php echo $term['id']; ?>,
     page_no: 1
     }
     * 
     * 
     * 
     * */
    /* Please view product_list.php and search for #product_filter */
    $('#collapseCategory a').click(function (event) {
        event.preventDefault();
        $('#collapseCategory a').each(function () {
            $(this).removeClass('active')
        });
        $(this).addClass('active');
        product_filter.cat_id = $(this).data('cat_id');
        update_product_list(product_filter);
    });
    $('.price_filter').click(function ()
    {
        var price_filter = $(this).find('input[name=price_filter]');
        product_filter.max_price = price_filter.data('max_price');
        product_filter.min_price = price_filter.data('min_price');
        update_product_list(product_filter);
    });
    $('#filter_by_price').click(function (event) {
        event.preventDefault();
        product_filter.max_price = $('#max_price_filter').val();
        product_filter.min_price = $('#min_price_filter').val();
        update_product_list(product_filter);
    });
    $('#productorderby').change(function (event) {
        var selector = '[value=' + $(this).val() + ']';
        product_filter.order_field = $('#productorderby ' + selector).data('field');
        product_filter.order_type = $('#productorderby ' + selector).data('type');
        update_product_list(product_filter);
    });
    $(document).on('click', '.add-to-compare', function () {
        $.ajax({
            url: baseurl + 'add_to_compare?product_id=' + $(this).data('productid'),
            success: function (data) {
                if (data.compare_products.length) {
                    $('a.compare_link').removeClass('hide');
                }
                $('.msgbox').html(showSuccess(data.msg)).show().delay(3000).fadeOut(1000);
            },
            error: function () {
                showError('Sorry. Try reload this page and try again.');
            }
        });
    });
    $(document).on('click', '.add_to_cart', function (event) {
        event.preventDefault();
        var data = {
            'id': $(this).data('id'),
            'qty': $('.qty[name=qty]').val()
        }
        $.ajax({
            url: baseurl + 'add_to_cart',
            method: 'get',
            data: data,
            success: function (data) {
                $('.msgbox').html(showSuccess(data.msg)).show().delay(3000).fadeOut(1000);
                upadate_mini_cart(data.cart);
            },
            error: function () {
                showError('Sorry. Try reload this page and try again.');
            }
        });
    });
    $(document).on('click', '.remove_from_cart', function (event) {
        event.preventDefault();
        console.log($(this).data('reload'));
        $.ajax({
            url: baseurl + 'remove_from_cart',
            method: 'get',
            data: {id: $(this).data('id')},
            success: function (data) {
                $('.msgbox').html(showSuccess(data.msg)).show().delay(3000).fadeOut(1000);
                upadate_mini_cart(data.cart);
            },
            error: function () {
                showError('Sorry. Try reload this page and try again.');
            }
        });
    });
    $(document).on('click', '.remove_from_compare', function (event) {
        event.preventDefault();
        $.ajax({
            url: baseurl + 'remove_from_compare',
            method: 'get',
            data: {id: $(this).data('id')},
            success: function (data) {
                $('.msgbox').html(showSuccess(data.msg)).show().delay(3000).fadeOut(1000);
                window.location.reload();
            },
            error: function () {
                showError('Sorry. Try reload this page and try again.');
            }
        });
    });

    /*Add Update Showroom Listener*/
    $('.showrooms_search_btn').click(update_showrooms);
    $('.district_id').change(update_showrooms);

});
var update_showrooms = function ()
{
    processing.show();
    jQuery.ajax({
        url: 'get_showrooms',
        data: jQuery('.showroomfilter').serialize(),
        success: function (data) {

            jQuery('.showroomlist').empty();
            if (data.length <= 0) {
                jQuery('.showroomlist').html('<h2>Nothing found</h2>');
            } else {
                jQuery.each(data, function (index) {
                    showroom = data[index];
                    showroom_html = '<div class="list1 fix">\
                                        <ul>\
                                            <li>' + (index + 1) + '. ' + showroom.ShowroomName + '</li>\
                                            <li>' + showroom.ShowroomAddress + '</li>\
                                            <li>Phone: ' + showroom.Phone + '</li>\
                                        </ul>\
                                    </div>'
                    jQuery('.showroomlist').append(showroom_html);
                });
            }
            processing.hide();
        }
    });

}

function update_product_list(filter)
{
    processing.show();
    jQuery.ajax({
        url: baseurl + 'get_products_html',
        method: 'get',
        data: filter,
        success: function (data) {
            jQuery('.category_top_p').html(data.term['name']);
            jQuery('#product_list_html').html(data.product_list_html);
            jQuery('#product_pagination_html').html(data.product_pagination_html);
            processing.hide();
        },
        error: function () {
            processing.hide();
            alert('Someting error please this page.');
        }
    });
}

function upadate_mini_cart(cart) {
    total = 0;
    mini_cart_html_row = '';
    big_cart_html_row = '';
    for (i = 0; i < cart.length; i++)
    {
        item = cart[i];
        product_url = baseurl + 'product/' + item['id'];
        mini_cart_html_row += '<tr class="miniCartProduct">'
                + '<td style="width:20%" class="miniCartProductThumb">'
                + '<div><a href="' + product_url + '"> <img src="' + baseurl + (item['img'] ? item['img'] : 'uploads / default.jpg') + '" alt="procuct"></a></div>'
                + '</td>'
                + ' <td style="width:40%">'
                + '<div class="miniCartDescription">'
                + ' <h4> <a href = "' + product_url + '" > ' + item['name'] + ' </a></h4>'
                + ' <div class = "price" > <span>' + item['price'] + ' TK </span></div>'
                + ' </div>'
                + '</td>'
                + ' <td style = "width:10%" class = "miniCartQuantity" > X ' + item['qty'] + ' </td>'
                + '<td style = "width:15%" class = "miniCartSubtotal"> <span> ৳ ' + item['subtotal'] + ' </span></td>'
                + '<td style = "width:5%" class = "delete" > <a class="remove_from_cart" data-id="' + item['id'] + '"> x </a></td>'
                + ' </tr>';
        big_cart_html_row += '<tr class="CartProduct">'
                + ' <td class="CartProductThumb">'
                + ' <div><a href="' + product_url + '"><img src="' + baseurl + (item['img'] ? item['img'] : 'uploads / default.jpg') + '" alt="img"></a> </div>'
                + '</td>'
                + '<td>'
                + '<div class="CartDescription">'
                + '<h4><a href="product-details.php">' + item['name'] + '</a></h4>'
                + '    <div class="price"><span>TK. ' + item['price'] + '/=</span></div>'
                + ' </div>'
                + '</td>'
                + ' <td class="delete">'
                + '   <a title="Delete" class="remove_from_cart" data-id=' + item['id'] + ' data-reload="true">'
                + '      <i class="glyphicon glyphicon-trash fa-2x"></i>'
                + '  </a>'
                + '</td>'
                + '<td>' + item['qty'] + '</td>'
                + '<td>Free</td>'
                + '<td class="price">TK. ' + item['subtotal'] + '/=</td>'
                + '</tr>';
        total += item['subtotal'];
    }//end loop

    jQuery('.carttotal').text(total);
    jQuery('.miniCartTable table tbody').html(mini_cart_html_row);
    jQuery('table.bigCartTable tbody').html(big_cart_html_row);
}





/*
 * @Author Shahadat Hossain
 * @date 28/5/2016 7:26pm
 * @modified 16/06/2016 4:29pm
 */

processing = {
    show: function ($) {
        var w = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;
        var h = window.innerHeight || document.documentElement.clientHeight || document.body.clientHeight;
        jQuery('#processingmassage').css({
            'display': 'block',
            width: w,
            height: h,
            'padding-top': (h / 2) - 150
        })
        console.log('Start Processing');
    },
    hide: function ($) {
        setTimeout(function () {
            jQuery('#processingmassage').hide();
            console.log('End  Processing');
        }, 2000);

    }
}
